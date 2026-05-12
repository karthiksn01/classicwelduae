<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Product::with('productCategory');

        // Filters
        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }
        if ($request->has('search') && $request->search !== '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('featured') && $request->featured == 'true') {
            $query->where('is_hot_sale', true);
        }

        // Pagination
        $paginator = $query->paginate(12);

        // Map items
        $paginator->getCollection()->transform(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->productCategory?->name ?? $product->category ?? 'Uncategorized',
                'image' => $product->image,
                'description' => $product->description,
                'price' => $product->retail_price,
                'retail_price' => $product->retail_price,
                'stock' => $product->stock,
                'is_hot_sale' => $product->is_hot_sale,
                'is_sold_out' => $product->is_sold_out,
                'features' => $product->features,
                'specifications' => $product->specifications,
                'category_id' => $product->category_id
            ];
        });

        return response()->json($paginator);
    }

    public function show($id)
    {
        $product = \App\Models\Product::with('productCategory')->findOrFail($id);

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->productCategory?->name ?? $product->category ?? 'Uncategorized',
            'image' => $product->image,
            'description' => $product->description,
            'price' => $product->retail_price,
            'retail_price' => $product->retail_price,
            'stock' => $product->stock,
            'is_hot_sale' => $product->is_hot_sale,
            'is_sold_out' => $product->is_sold_out,
            'features' => $product->features,
            'specifications' => $product->specifications,
            'category_id' => $product->category_id
        ]);
    }
}
