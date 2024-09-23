<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Order;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('checkout', [
            'title' => 'Checkout',
        ]);
    }
}
