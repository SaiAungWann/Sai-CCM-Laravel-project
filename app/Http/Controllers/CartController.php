<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        return view('cart', [
            'cart' => $cart
        ]);
    }
    public function store(Product $product)
    {

        if (!auth()->user()->cart) {
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->save();
        } else {

            $cart = auth()->user()->cart;
        }

        $cart_item = new CartItem();
        $cart_item->cart_id = $cart->id;
        $cart_item->product_id = $product->id;
        $cart_item->total_price = $product->price;
        $cart_item->save();

        // return redirect('/checkout');

        return back();
    }

    public function update(Cart $cart, CartItem $cart_item)
    {
        // \dd(\request()->all());
        \request()->validate([
            'quantity' => 'required'
        ]);

        $cart = auth()->user()->cart;
        $cart_items = $cart->load('cart_items')->cart_items->load('product');
        $quantities = request('quantity');

        foreach ($cart_items as $cart_item) {
            $cart_item->cart_id = $cart->id;
            $cart_item->product_id = $cart_item->product->id;
            $cart_item->quantity = $quantities[$cart_item->id];
            $cart_item->total_price = $cart_item->product->price * $quantities[$cart_item->id];
            $cart_item->update();
            // \dd($cart_item->quantity = $quantity);

        }
        return redirect('/checkout');
    }

    public function destroy(CartItem $cart_item)
    {
        $cart_item->delete();
        return back();
    }
    public function destroy_all(CartItem $cart_item, Cart $cart)
    {
        $cart->cart_items()->delete();
        return back();
    }
}
