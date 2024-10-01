<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    // a product belongs to a category (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    //accesor or getter
    public function getProductnameAttribute($value)
    {
        return ucfirst($value);
    }

    //mutator or setter
    public function setProductnameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    // product belongs to brand
    public function product_brand()
    {
        return $this->belongsTo(ProductBrand::class, "product_brand_id");
    }

    // a product has many orderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($query) {
            $query->where("name", "LIKE", "%" . request('search') . "%");
        })->when($filters['category'] ?? false, function ($query) {
            $query->whereHas('category', function ($categoryQuery) {
                $categoryQuery->where('id', request('category'));
            });
        })->when($filters['product_brand'] ?? false, function ($query) {
            $query->whereHas('product_brand', function ($categoryQuery) {
                $categoryQuery->where('id', request('product_brand'));
            });
        });
    }

    // a product belongToMany productColor
    public function product_colors()
    {
        return $this->belongsToMany(ProductColor::class, "product_color_product", "product_id", "product_color_id");
    }

    // a product has many productImages
    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
