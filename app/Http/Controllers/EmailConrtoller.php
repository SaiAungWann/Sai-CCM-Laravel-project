<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\OrderConfirmedMail;
use App\Mail\OrderConfirmMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailConrtoller extends Controller
{
    public function orderConfirm()
    {
        $users = User::pluck('email', 'first_name')->take(3);

        $users->each(function ($email, $name) {
            $order = auth()->user()->orders()->latest()->first()->load('orderItems');
            $orderItems = $order->orderItems->load('product');
            Mail::to($email)->queue(new OrderConfirmedMail($name, $order, $orderItems));
        });

        return view('emails.order-confirmed', []);
    }
    public function contact_us()
    {
        return view('emails.contact-us', []);
    }
    public function contact()
    {
        \request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $data = \request()->all();
        Mail::to('aungwann21@gmail.com')->queue(new ContactUsMail($data));

        return \redirect('/')->with('message', 'Message Sent Successfully We Will Contact You Soon');
    }

    public function about_us()
    {
        return view('emails.about-us');
    }
    public function terms_and_conditions()
    {
        return view('emails.terms-and-conditions');
    }
    public function order_and_return()
    {
        return view('emails.order-and-return');
    }

    public function privacy_and_policy()
    {
        return view('emails.privacy-and-policy');
    }
}
