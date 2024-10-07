<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Otp;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

    public function showOrderDetail(Order $order)
    {
        return view('userProfile.userOrderDetail', [
            'title' => 'User Profile',
            'order' => $order->load('orderItems', 'user')
        ]);
    }

    public function edit()
    {
        $user = \auth()->user();
        return view('userProfile.userProfileSetting', [
            'title' => 'User Profile',
            'user' => $user
        ]);
    }

    public function updateProfilePicture(User $user)
    {
        \request()->validate([
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $profile_picture = request('profile_picture');

        $users = User::where('id', $user->id)->first();
        $users->profile_picture = '/storage/' . $profile_picture->storeAs('profilePictures', \time() . '_' . $profile_picture->getClientOriginalName());;
        $users->save();


        return redirect()->back();
    }

    public function update(User $user)
    {
        \request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'telephone' => 'required',
        ]);
        $users = User::where('id', $user->id)->first();
        $users->first_name = request('first_name');
        $users->middle_name = request('middle_name');
        $users->last_name = request('last_name');

        if (\request('role') == 'admin') {
            $users->role = 'admin';
        } else {
            $users->role = 'user';
        }
        $users->save();

        $user_addresses = UserAddress::where('user_id', $user->id)->first();
        $user_addresses->telephone = request('telephone');
        $user_addresses->save();

        return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'Profile Updated Successfully');
    }

    public function updatePassword(User $user)
    {
        \request()->validate([
            'old_password' => ['required', 'min:8', 'max:16'],
            'new_password' =>  ['required', 'min:8', 'max:16'],
            'new_password_confirmation' => ['required', 'min:8', 'max:16', 'same:new_password'],
        ]);
        $users = User::where('id', $user->id)->first();

        if (!Hash::check(request('old_password'), $users->password)) {
            return redirect()->back()->with('error', 'Old Password Does Not Match');
        }

        if (request('new_password') != request('new_password_confirmation')) {
            return redirect()->back()->with('error', 'New Passwords Do Not Match');
        }

        if (request('new_password') == request('old_password')) {
            return redirect()->back()->with('error', 'New Password Cannot Be Same As Old Password');
        }
        if (request('new_password') == request('new_password_confirmation')) {
            $users->password = bcrypt(request('new_password_confirmation'));
            $users->save();
            return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'Password Updated Successfully');
        }
    }

    public function forgotPassword()
    {
        return view('userProfile.userForgotPassword', [
            'title' => 'User Profile',
        ]);
    }

    public function verifyOTP()
    {
        return view('userProfile.userVerifyOTP', [
            'title' => 'User Profile',
        ]);
    }

    public function verifyNewPassword()
    {
        request()->validate([
            'otp' => ['required'],
        ]);

        $otp = request('otp');
        $user = Otp::where('otp', $otp)->first()->load('user')->user;

        $DB_otp = Otp::where('otp', $otp)->where('user_id', $user->id)->first();

        if ($otp == $DB_otp->otp && $DB_otp->expires_at >= Carbon::now()) {

            return \redirect('/user/profile/createNewPassword')->with('message', 'Otp Verified Successfully');
        }

        return \back()->with('message', 'Otp Not Verified');
    }

    public function createNewPassword()
    {
        return view('userProfile.userCreateNewPassword', [
            'title' => 'User Profile',
        ]);
    }
    public function storeNewPassword()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'new_password' => ['required', 'min:8', 'max:16'],
            're_enter_password' => ['required', 'min:8', 'max:16', 'same:new_password'],
        ]);

        $user = User::where('email', request('email'))->first();

        if (!$user) {
            return \back()->with('message', 'Email Not Found');
        }

        if (request('new_password') != request('re_enter_password')) {
            return \back()->with('message', 'New Passwords Do Not Match');
        }
        if (request('new_password') == request('re_enter_password')) {
            $user->password = bcrypt(request('re_enter_password'));
            $user->save();
            return \redirect('/login')->with('message', 'Password Updated Successfully');
        }

        return \redirect('/')->with('message', 'Password Cannot Be Updated! Try Again');
    }

    public function destroy(User $user)
    {
        $user = \auth()->user();
        $user->delete();
        return redirect('/');
    }
}
