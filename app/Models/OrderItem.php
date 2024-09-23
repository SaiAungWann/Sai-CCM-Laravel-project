<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // an orderItem belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // an orderItem belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // an orderItem belongToMany cartItems
    public function cartItems()
    {
        return $this->belongsToMany(CartItem::class, 'cart_item_order_item', 'order_item_id', 'cart_item_id');
    }
}
