<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendOtpJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function showOtpRequestForm()
    {
        return view('auth.passwords.otp-request');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $otpExpiresAt = now()->addMinutes(15);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => $otpExpiresAt
        ]);

        // Dispatch job dengan delay (opsional)
        // SendOtpJob::dispatch($user, $otp)->delay(now()->addSeconds(2)); // Lebih cepat, misal 2 detik
        \Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

        return redirect()->route('password.reset')->with([
            'email' => $user->email,
            'success' => 'Kode OTP telah dikirim ke email Anda. Silakan cek email Anda (termasuk folder spam).'
        ]);
    }

    public function showResetForm()
    {
        return view('auth.passwords.reset')->with(['email' => session('email')]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->otp !== $request->otp || now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau sudah kadaluarsa.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return redirect()->route('login')->with('status', 'Password Anda berhasil direset. Silakan login dengan password baru.');
    }
}