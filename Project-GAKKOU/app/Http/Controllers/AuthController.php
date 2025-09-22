<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('page.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($credentials['email'] === "eka@gmail.com" && $credentials['password'] === "rendra") {
            // Simpan identitas superadmin di session
            $request->session()->put('super_admin', true);

            return redirect()->intended('adminpanel/dashboard');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();


            if ($user->is_active !== 'active') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun kamu nonaktif. Hubungi admin.'
                ])->withInput();
            }


            return redirect()->intended('adminpanel/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
