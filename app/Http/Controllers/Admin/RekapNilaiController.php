<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekapNilai;

class RekapNilaiController extends Controller
{
    public function index()
    {
        $rekapNilais = RekapNilai::all();
        return view('Admin.rekapnilai', compact('rekapNilais'));
    }
}
