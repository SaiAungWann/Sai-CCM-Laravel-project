<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = \auth()->user()->load('user_addresses');
        $user_addresses = $user->user_addresses;
        return view('userProfile.userProfile', [
            'title' => 'User Profile',
            'user' => $user,
            'user_addresses' => $user_addresses
        ]);
    }

    public function showOrders(Order $order)
    {
        $user = \auth()->user()->load('orders');
        $orders = $user->orders()->latest()->get()->load('orderItems');
        return view('userProfile.userOrder', [
            'title' => 'User Profile',
            'orders' => $orders
        ]);
    }
}
