<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaturanUserController extends Controller
{
    /**
     * Menampilkan halaman pengaturan untuk user.
     */
    public function index()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('user.pengaturan', compact('user'));
    }

    /**
     * Memperbarui data pengaturan user (opsional).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input (contoh pengaturan nama dan email)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update data
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
