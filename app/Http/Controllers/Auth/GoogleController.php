<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('id_google', $googleUser->id)->first();

        if (! $user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'id_google' => $googleUser->id,
                'password' => bcrypt(Str::random(16)),
            ]);
        }

        // GENERATE OTP 6 KARAKTER
        $otp = strtoupper(substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6));

        $user->update([
            'otp' => $otp
        ]);

        // KIRIM EMAIL OTP
        Mail::raw("Kode OTP login kamu adalah: $otp", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Kode OTP Login');
        });

        // JANGAN LOGIN DULU
        session(['otp_user_id' => $user->id]);

        return redirect()->route('otp.form');
    }
}
