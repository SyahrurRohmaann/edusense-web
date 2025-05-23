<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $fillable = [
        'category_id',
        'judul_soal',
        'gambar',
        'pertanyaan',
        'jawaban',
    ];

    // Relasi ke JenisSoal
    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
}
