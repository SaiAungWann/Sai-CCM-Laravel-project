<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    use HasFactory;

    // brand has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //brand many to category
    public function category()
    {
        return $this->belongsToMany(Category::class, "category_product_brand", "product_brand_id", "category_id");
    }
}
