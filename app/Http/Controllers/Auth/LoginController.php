<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan file resources/views/auth/login.blade.php ada
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
