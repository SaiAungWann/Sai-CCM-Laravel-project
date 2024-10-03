<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\StateOrRegion;
use App\Models\Township;
use App\Models\User;

class CheckoutController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user())->load('user_addresses');
        $user_addresses = $user->first()->user_addresses;
        $state_or_regions = StateOrRegion::all()->load('townships');
        $townships = Township::all()->load('stateOrRegion');
        return view('checkout', [
            'title' => 'Checkout',
            'user' => $user,
            'user_addresses' => $user_addresses,
            'state_or_regions' => $state_or_regions,
            'townships' => $townships
        ]);
    }
}
