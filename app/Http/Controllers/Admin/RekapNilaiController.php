<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekapNilai;

class RekapNilaiController extends Controller
{
    public function index(Request $request)
    {
        $query = RekapNilai::query();

        // Jika ada parameter 'search', tambahkan kondisi pencarian
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('username', 'like', "%$search%");
                })
                    ->orWhereHas('soal', function ($soalQuery) use ($search) {
                        $soalQuery->where('judul_soal', 'like', "%$search%");
                    })
                    ->orWhere('skor', 'like', "%$search%");
            });
        }

        // Ambil semua user dan kirim ke view dengan pagination
        $rekapNilais = $query->paginate(5)->withQueryString();
        return view('Admin.rekapnilai', compact('rekapNilais'));
    }
}
