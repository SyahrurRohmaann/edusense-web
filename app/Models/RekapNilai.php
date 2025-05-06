<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapNilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_anak',
        'jenis_permainan',
        'skor',
        'waktu_bermain',
    ];
}
