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
        Schema::table('pesans', function (Blueprint $table) {
            $table->string('kelas')->nullable()->after('email');
        });

        // Ubah kolom email menjadi nullable karena siswa mungkin tidak punya email
        Schema::table('pesans', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesans', function (Blueprint $table) {
            $table->dropColumn('kelas');
            $table->string('email')->nullable(false)->change();
        });
    }
};
