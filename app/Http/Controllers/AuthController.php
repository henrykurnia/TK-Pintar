<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    /**
     * Tampilkan form login dengan header no-cache.
     */
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }

        return response()
            ->view('landing.login')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah',
        ])->withInput($request->only('email'));
    }

    /**
     * Logout user dan arahkan ke login dengan header anti-cache.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with([
            'logout_message' => 'Anda telah berhasil logout.',
            'alert_type' => 'success'
        ])->withHeaders([
                    'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0',
                ]);
    }
}