<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{

    public function create()
    {

        return view('login.login');
    }


    public function show()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16'],
        ]);

        $user = User::where('email', request('email'))->first();
        if (auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ])) {
            return redirect('/');
        } else {
            return back()->withErrors(['email' => 'Email or Password is incorrect']);
        }
    }
}
