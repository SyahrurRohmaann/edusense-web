<?php

namespace App\Http\Controllers\Api;

use App\Models\Soal;
use App\Http\Controllers\Controller;
use App\Models\RekapNilai;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    public function index()
    {
        return Soal::with('category')->get();
    }

    public function show($id)
    {
        return Soal::with('category')->findOrFail($id);
    }

    public function byCategory($id)
    {
        $soals = Soal::where('category_id', $id)->get(['id', 'judul_soal', 'gambar', 'pertanyaan']);
        return response()->json($soals);
    }

    public function detail($id)
    {
        $soal = Soal::select('id', 'gambar', 'pertanyaan')->findOrFail($id);
        return response()->json($soal);
    }

    public function rekap(Request $request, $id)
    {
        $request->validate([
            'skor' => 'required|integer',
            'waktu_bermain' => 'required|integer',
            'nama_anak' => 'required|string'
        ]);

        $rekap = RekapNilai::create([
            'user_id' => Auth::id(),
            'nama_anak' => $request->nama_anak,
            'skor' => $request->skor,
            'waktu_bermain' => $request->waktu_bermain,
            'jenis_soal' => $id,
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $rekap
        ]);
    }
}
