<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class KelolaSoalController extends Controller
{
    /**
     * Menampilkan halaman kelola soal dengan data kategori.
     */
    public function index(): \Illuminate\View\View
    {
        $categories = Category::all();
        return view('Admin.kelolasoal', compact('categories'));
    }

    /**
     * Menyimpan soal baru atau mengupdate soal yang ada.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_soal' => 'required|string|max:255',
            'id' => 'nullable|integer|exists:categories,id',
        ]);

        Category::updateOrCreate(
            ['id' => $request->id], // jika ada id, maka update
            ['name' => $request->jenis_soal]
        );

        return redirect()->route('kelolasoal.index')->with('success', 'Soal berhasil disimpan.');
    }

    /**
     * Menghapus soal berdasarkan ID.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('kelolasoal.index')->with('error', 'Soal tidak ditemukan.');
        }

        $category->delete();

        return redirect()->route('kelolasoal.index')->with('success', 'Soal berhasil dihapus.');
    }
}
