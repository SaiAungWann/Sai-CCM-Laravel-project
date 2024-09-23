<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(CartItem $cart_item)
    {

        // \dd(\request()->all());
        \request()->validate([
            'grand_total' => 'required',
            'quantity' => 'required',
        ]);

        $quantities = \request('quantity');

        foreach ($quantities as $quantity) {
            $order_item = new OrderItem();
            $order_item->price = request('grand_total');
            $order_item->quantity = $quantity;
        };

        return \redirect('/checkout');
    }
}
