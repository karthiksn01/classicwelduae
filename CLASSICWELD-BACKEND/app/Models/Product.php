<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'retail_price',
        'category',
        'category_id',
        'image',
        'stock',
        'is_hot_sale',
        'is_sold_out',
        'features',
        'specifications',
        'warranty_years'
    ];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
        'is_hot_sale' => 'boolean',
        'is_sold_out' => 'boolean',
    ];

    public function productCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
