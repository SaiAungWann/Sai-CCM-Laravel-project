<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // a cart_item belongsto a cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // a cart_item belongsto a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // a cart_item belongToMany orderItems
    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class, 'cart_item_order_item', 'cart_item_id', 'order_item_id');
    }
}
