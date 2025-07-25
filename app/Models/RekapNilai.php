<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapNilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_anak',
        'jenis_soal',
        'skor',
        'waktu_bermain',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'jenis_soal');
    }
}
