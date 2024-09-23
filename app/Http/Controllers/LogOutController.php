<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogOutController extends Controller
{
    public function destory()
    {
        auth()->logout();
        return redirect('/login');
    }
}
