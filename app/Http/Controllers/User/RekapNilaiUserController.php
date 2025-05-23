<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapNilaiUserController extends Controller
{
    /**
     * Menampilkan halaman rekap nilai untuk user.
     */
    public function index()
    {
        // Contoh data dummy rekap nilai (bisa diganti dengan data dari database)
        $rekapNilai = [
            ['mapel' => 'Matematika', 'nilai' => 85],
            ['mapel' => 'Bahasa Indonesia', 'nilai' => 90],
            ['mapel' => 'IPA', 'nilai' => 88],
        ];

        return view('user.rekap-nilai', compact('rekapNilai'));
    }
}
