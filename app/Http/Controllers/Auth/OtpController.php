<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function showForm()
    {
        return view('auth.otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $user = User::find(session('otp_user_id'));

        if (!$user || $user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'OTP salah']);
        }

        // OTP benar → login
        Auth::login($user);

        // Hapus OTP
        $user->update(['otp' => null]);

        session()->forget('otp_user_id');

        return redirect('/home');
    }
}
