<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilAnakController extends Controller
{
    /**
     * Menampilkan halaman profil anak dari user yang sedang login.
     */
    public function index()
    {
        $user = Auth::user();

        // Misalnya, data anak tersimpan di relasi `childProfile` pada model User
        $anak = $user->childProfile ?? null;

        return view('user.profil-anak', compact('anak'));
    }

    /**
     * Menyimpan atau memperbarui data profil anak (opsional).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_anak' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // $anak = $user->childProfile ?? $user->childProfile()->create([]);
        // $anak->nama = $request->nama_anak;
        // $anak->usia = $request->usia;
        // $anak->jenis_kelamin = $request->jenis_kelamin;
        // $anak->save();

        return redirect()->back()->with('success', 'Profil anak berhasil diperbarui.');
    }
}
