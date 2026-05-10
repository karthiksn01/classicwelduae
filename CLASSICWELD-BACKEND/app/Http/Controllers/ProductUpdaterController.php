<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductUpdaterController extends Controller
{
    // --- CATEGORY MANAGEMENT ---
    
    public function getCategories()
    {
        return response()->json(Category::all());
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug'
        ]);

        $category = Category::create($request->all());
        return response()->json(['message' => 'Category created', 'category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id
        ]);

        $category->update($request->all());
        return response()->json(['message' => 'Category updated', 'category' => $category]);
    }

    // --- PRODUCT MANAGEMENT ---

    public function indexAdmin()
    {
        \Illuminate\Support\Facades\Log::info('Admin products fetch requested');
        $products = Product::with('productCategory')->get();
        \Illuminate\Support\Facades\Log::info('Admin products fetch successful. Count: ' . $products->count());
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            // Allow category as string fallback, but prefer category_id
            'category_id' => 'nullable|exists:categories,id',
            'image_file' => 'nullable|image|max:2048'
        ]);

        $data = $request->except(['image_file', 'features', 'specifications']);
        
        // Handle JSON payloads
        if ($request->has('features')) {
            $data['features'] = is_string($request->features) ? json_decode($request->features, true) : $request->features;
        }
        if ($request->has('specifications')) {
            $data['specifications'] = is_string($request->specifications) ? json_decode($request->specifications, true) : $request->specifications;
        }

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('products', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $product = Product::create($data);
        return response()->json(['message' => 'Product created', 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $data = $request->except(['image_file', 'features', 'specifications', '_method']);
        
        if ($request->has('features')) {
            $data['features'] = is_string($request->features) ? json_decode($request->features, true) : $request->features;
        }
        if ($request->has('specifications')) {
            $data['specifications'] = is_string($request->specifications) ? json_decode($request->specifications, true) : $request->specifications;
        }

        $product->fill($data);

        if ($request->hasFile('image_file')) {
            // Delete old if exists
            if ($product->image && str_starts_with($product->image, '/storage/')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
            }
            $path = $request->file('image_file')->store('products', 'public');
            $product->image = '/storage/' . $path;
        }

        $product->save();

        return response()->json(['message' => 'Product updated', 'product' => $product]);
    }

    // Toggle Hot Sale Flag
    public function toggleHotSale($id)
    {
        $product = Product::findOrFail($id);
        $product->is_hot_sale = !$product->is_hot_sale;
        $product->save();
        return response()->json(['message' => 'Hot sale status updated', 'is_hot_sale' => $product->is_hot_sale]);
    }

    // Toggle Sold Out Flag
    public function toggleSoldOut($id)
    {
        $product = Product::findOrFail($id);
        $product->is_sold_out = !$product->is_sold_out;
        $product->save();
        return response()->json(['message' => 'Sold out status updated', 'is_sold_out' => $product->is_sold_out]);
    }

    // Soft Delete
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product moved to recycle bin']);
    }

    // --- RECYCLE BIN ---

    public function trash()
    {
        $products = Product::onlyTrashed()->with('productCategory')->get();
        return response()->json($products);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return response()->json(['message' => 'Product restored']);
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        
        // Delete image file from storage if it exists
        if ($product->image && str_starts_with($product->image, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
        }

        $product->forceDelete();
        return response()->json(['message' => 'Product permanently deleted']);
    }
}
