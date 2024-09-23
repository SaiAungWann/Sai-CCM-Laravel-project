<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // a category has many products (has Many)
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    // a category many brands
    public function product_brands()
    {
        return $this->belongsToMany(ProductBrand::class, 'category_product_brand', 'category_id', 'product_brand_id');
    }
}
