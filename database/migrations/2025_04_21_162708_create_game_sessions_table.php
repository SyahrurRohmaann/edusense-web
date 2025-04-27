<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('game_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('started_at');
            $table->timestamp('ended_at')->nullable(); // ini akan terisi saat selesai main
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('game_sessions');
    }
};
