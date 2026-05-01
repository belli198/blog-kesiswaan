<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SejarahSekolah extends Model
{
    protected $table = 'sejarah_sekolah';
    protected $fillable = ['judul', 'konten', 'foto_gedung', 'tahun_berdiri'];
}
