<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Product;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Cleanup soft deleted products older than 15 days from the Recycle Bin
Schedule::call(function () {
    $deletedProducts = Product::onlyTrashed()->where('deleted_at', '<', now()->subDays(15))->get();
    foreach($deletedProducts as $product) {
        if ($product->image && str_starts_with($product->image, '/storage/')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
        }
        $product->forceDelete();
    }
})->daily();
