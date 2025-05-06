<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rekap_nilais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->string('jenis_permainan');
            $table->integer('skor');
            $table->integer('waktu_bermain'); // dalam menit
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekap_nilais');
    }
};
