<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogoutController extends Controller
{
    /**
     * Handle the logout process and clear session.
     */
    public function logout(Request $request)
    {
        Log::info('Logout process triggered');
        // Logout user
        Auth::logout();

        // Clear session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Optional: flush semua session (bener-bener bersih)
        $request->session()->flush();

        // Redirect to login page
        return redirect()->route('login')->with('status', 'Kamu berhasil logout.');
    }
}
