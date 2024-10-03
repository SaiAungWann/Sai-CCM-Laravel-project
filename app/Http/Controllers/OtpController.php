<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class OtpController extends Controller
{

    public function sendOtp(Request $request)
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first()->load('otps');
        $otp = random_int(100000, 999999);

        $DB_otp = new Otp();
        $DB_otp->user_id = auth()->user()->id;
        $DB_otp->otp = $otp;
        $DB_otp->expires_at = Carbon::now()->addMinute(1);
        $DB_otp->save();

        $newOtp = $DB_otp->otp;

        Mail::to(auth()->user())->queue(new OtpMail($user, $newOtp));

        return \back()->with('message', 'Otp Sent Successfully');
    }

    public function verifyOtp()
    {
        request()->validate([
            'otp' => ['required'],
        ]);

        $user = auth()->user()->load('otps'); //auth()->user();
        $otp = request('otp');

        $DB_otp = Otp::where('otp', request()->otp)->where('user_id', $user->id)->first();

        if ($otp == $DB_otp->otp && $DB_otp->expires_at >= Carbon::now()) {
            $DB_otp->otp = null;
            $DB_otp->expires_at = null;
            $DB_otp->save();

            $user = User::where('id', $user->id)->first();
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect('/')->with('message', 'Otp Verified Successfully');
        }

        return redirect('/')->with('message', 'Otp Not Verified');
    }

    public function confirmOtp()
    {


        return \view('emails.confirm-otp', [
            'user' => auth()->user(),
            'email' => \auth()->user()->email,
            'name' => auth()->user()->first_name . " " . auth()->user()->middle_name . " " . auth()->user()->last_name,
            'expires_at' => Carbon::now()->addMinute(1),
        ]);
    }

    public function viewOtp()
    {
        return \view('emails.verify', [
            'user' => auth()->user(),
            'email' => \auth()->user()->email,
            'name' => auth()->user()->first_name . " " . auth()->user()->middle_name . " " . auth()->user()->last_name,
            'expires_at' => Carbon::now()->addMinute(1),
        ]);
    }
}
