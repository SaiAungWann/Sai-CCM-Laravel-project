<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:16'],
        ]);

        $user = new User();

        $user->first_name = request('first_name');
        $user->middle_name = request('middle_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        auth()->login($user);

        return redirect('/');
    }
}
