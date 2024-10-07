<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminDashBoardController extends Controller
{
    public function index()
    {
        return view('admin.dashBoard');
    }

    public function adminAccount()
    {

        return view('admin.account', [
            'users' => User::all()->load('user_addresses')
        ]);
    }
    public function adminProfile(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $user_addresses = $user->load('user_addresses')->user_addresses;
        return view('admin.profile', [
            'user' => $user,
            'user_addresses' => $user_addresses,
        ]);
    }
    public function adminProfileEdit(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $user_addresses = $user->load('user_addresses')->user_addresses;
        return view('admin.profileSetting', [
            'user' => $user,
            'user_addresses' => $user_addresses,
        ]);
    }
    public function userAccount()
    {
        return view('admin.user.userAccount', [
            'users' => User::all()->load('user_addresses'),
        ]);
    }
    public function userProfile(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $user_addresses = $user->load('user_addresses')->user_addresses;
        return view('admin.user.userProfile', [
            'user' => $user,
            'user_addresses' => $user_addresses,
        ]);
    }
}
