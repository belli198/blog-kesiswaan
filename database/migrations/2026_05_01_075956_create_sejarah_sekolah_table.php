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
        Schema::create('sejarah_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('Sejarah SMK Negeri 1 Adiwerna');
            $table->longText('konten');
            $table->string('foto_gedung')->nullable();
            $table->year('tahun_berdiri')->default(1969);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarah_sekolah');
    }
};
