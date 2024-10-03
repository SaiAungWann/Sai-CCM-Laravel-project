<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmedMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdatedMail;

class OrderController extends Controller
{
    public function index()
    {
        $date = Carbon::now();
        $formattedDate = Carbon::parse($date)->format('H:i , d M Y');
        return view('admin.order.ordersList', [
            'orders' => Order::all(),
            'formattedDate' => $formattedDate
        ]);
    }
    public function store()
    {
        // dd(\request()->all());

        \request()->validate([
            'price' => 'required',
            'total_amount' => 'required',
            'quantity' => 'required',
            'shipping_address' => 'required',
            'telephone' => 'required',
            'my_address_is_correct' => 'accepted',
        ]);
        $products = collect([]);
        auth()->user()?->cart?->cart_items->load('product')
            ->each(function ($cartItem) use (&$products) {
                $quantities = request('quantity');
                $product = [];
                $product['id'] = $cartItem->product->id;
                //$product->price - $product->discounted_percentage / 100 * $product->price;
                $product['discounted_price'] = $cartItem->product->price - $cartItem->product->discounted_percentage / 100 * $cartItem->product->price;
                $product['quantity'] = $quantities[$cartItem->id];
                $product['total_price'] = $product['discounted_price'] * $product['quantity'];
                $products[] = $product;
            });
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_amount = request('total_amount');
        $order->shipping_address  = request('shipping_address');
        $order->phone_number = request('telephone');
        $order->save();

        //create order items
        $products->each(function ($product) use ($order) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product['id'];
            $orderItem->discounted_price =  $product['discounted_price'];
            $orderItem->total_price = $product['total_price'];
            $orderItem->quantity = $product['quantity'];
            $orderItem->save();
        });
        auth()->user()?->cart?->cart_items()->delete();

        $order = auth()->user()->orders()->latest()->first()->load('orderItems');
        $name = auth()->user()->first_name . " " . auth()->user()->middle_name . " " . auth()->user()->last_name;
        Mail::to(auth()->user())->queue(new OrderConfirmedMail($name, $order));

        return \redirect('/')->with('success', 'Order created successfully');
    }


    public function show(Order $order)
    {

        return view('admin.order.detail', [
            'order' => $order
        ]);
    }


    public function update(Order $order)
    {
        request()->validate([
            'status' => 'required',
        ]);

        $order->status = request('status');
        $order->update();

        $name = auth()->user()->first_name . " " . auth()->user()->middle_name . " " . auth()->user()->last_name;

        Mail::to(auth()->user())->queue(new OrderUpdatedMail($name, $order));

        return redirect('/admin/ordersList')->with('message', 'Order Updated Successfully');
    }
}
