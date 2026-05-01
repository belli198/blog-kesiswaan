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
        // Set all photo fields to null to prevent Cloudinary NotFoundException
        // since the local files were deleted due to ephemeral storage on Railway
        \DB::table('penguruses')->update(['foto' => null]);
        \DB::table('sejarah_sekolah')->update(['foto_gedung' => null]);
        \DB::table('penghargaan')->update(['foto' => null]);
        \DB::table('berita')->update(['gambar' => null]);
        \DB::table('ekstrakurikuler')->update(['gambar' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
