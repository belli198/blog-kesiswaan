<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramSekolah extends Model
{
    protected $table = 'program_sekolah';
    protected $fillable = [
        'nama_program', 'ikon', 'deskripsi', 'urutan', 'is_aktif'
    ];
    protected $casts = ['is_aktif' => 'boolean', 'urutan' => 'integer'];
}
