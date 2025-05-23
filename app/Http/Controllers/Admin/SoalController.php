<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    /**
     * Menampilkan daftar soal.
     */
    public function index()
    {
        $soal = Soal::paginate(10);
        $categories = Category::paginate(10);
        return view('admin.soal', compact('soal', 'categories'));
    }

    /**
     * Menyimpan soal baru ke dalam database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'judul_soal' => 'required|string|max:255',
            'pertanyaan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jawaban' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $soal = new Soal();
            $soal->category_id = $request->category_id;
            $soal->judul_soal = $request->judul_soal;
            $soal->pertanyaan = $request->pertanyaan;

            if ($request->hasFile('gambar')) {
                $gambarFile = $request->file('gambar');
                $gambarNama = time() . '_' . uniqid() . '_' . $gambarFile->getClientOriginalName();
                $gambarFile->move(public_path('assets'), $gambarNama);
                $soal->gambar = $gambarNama;
            }

            if ($request->hasFile('jawaban')) {
                $jawabanFile = $request->file('jawaban');
                $jawabanNama = time() . '_' . uniqid() . '_' . $jawabanFile->getClientOriginalName();
                $jawabanFile->move(public_path('assets'), $jawabanNama);
                $soal->jawaban = $jawabanNama;
            }

            $soal->save();

            return redirect()->route('soal.index')->with('success', 'Soal berhasil ditambahkan!');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'judul_soal' => 'required|string|max:255',
            'pertanyaan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jawaban' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $soal = Soal::findOrFail($id);
            $soal->category_id = $request->category_id;
            $soal->judul_soal = $request->judul_soal;
            $soal->pertanyaan = $request->pertanyaan;

            if ($request->hasFile('gambar')) {
                if ($soal->gambar && file_exists(public_path('assets/' . $soal->gambar))) {
                    unlink(public_path('assets/' . $soal->gambar));
                }
                $gambarFile = $request->file('gambar');
                $gambarNama = time() . '_' . $gambarFile->getClientOriginalName();
                $gambarFile->move(public_path('assets'), $gambarNama);
                $soal->gambar = $gambarNama;
            }

            if ($request->hasFile('jawaban')) {
                if ($soal->jawaban && file_exists(public_path('assets/' . $soal->jawaban))) {
                    unlink(public_path('assets/' . $soal->jawaban));
                }
                $jawabanFile = $request->file('jawaban');
                $jawabanNama = time() . '_' . $jawabanFile->getClientOriginalName();
                $jawabanFile->move(public_path('assets'), $jawabanNama);
                $soal->jawaban = $jawabanNama;
            }

            $soal->save();

            return redirect()->route('soal.index')->with('success', 'Soal berhasil diubah!');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $soal = Soal::findOrFail($id);

            // Hapus gambar soal jika ada
            if ($soal->gambar && file_exists(public_path('assets/' . $soal->gambar))) {
                unlink(public_path('assets/' . $soal->gambar));
            }

            // Hapus gambar jawaban jika ada
            if ($soal->jawaban && file_exists(public_path('assets/' . $soal->jawaban))) {
                unlink(public_path('assets/' . $soal->jawaban));
            }

            $soal->delete();

            return redirect()->route('soal.index')->with('success', 'Soal berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
