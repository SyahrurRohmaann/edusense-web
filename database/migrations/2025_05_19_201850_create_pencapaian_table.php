<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencapaianTable extends Migration
{
    public function up()
    {
        Schema::create('pencapaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul', 100);
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('jenis'); // Dideklarasikan dulu
            $table->foreign('jenis')->references('id')->on('rekap_nilais')->onDelete('cascade');
            $table->date('tanggal_dicapai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pencapaian');
Schema::dropIfExists('users');

    }
}
