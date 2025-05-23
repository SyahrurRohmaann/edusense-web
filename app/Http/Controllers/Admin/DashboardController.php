<?php

// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Soal;
use App\Models\RekapNilai;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengguna = User::count();
        $totalSoal = Soal::count();
        $rataRataSkor = RekapNilai::avg('skor');

        $aktivitasTerbaru = DB::table('rekap_nilais as r')
            ->leftJoin('soal as s', 'r.jenis_soal', '=', 's.id')
            ->leftJoin('categories as c', 's.category_id', '=', 'c.id')
            ->select('r.nama_anak', 'c.name as permainan', 'r.skor', DB::raw('DATE(r.created_at) as waktu'))
            ->orderByDesc('r.created_at')
            ->limit(5)
            ->get();

        $performaMingguan = RekapNilai::selectRaw('DATE(created_at) as tanggal, AVG(skor) as rata_rata, COUNT(*) as total_aktivitas')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalSoal',
            'rataRataSkor',
            'aktivitasTerbaru',
            'performaMingguan'
        ));
    }
}



