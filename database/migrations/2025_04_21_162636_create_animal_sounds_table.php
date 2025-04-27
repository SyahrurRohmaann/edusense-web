<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animal_sounds', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->string('image_url'); // gambar hewan
            $table->string('sound_url'); // file suara
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_sounds');
    }
};
