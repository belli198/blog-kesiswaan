<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tingkat',
        'peraih',
        'tahun',
        'gambar',
        'kategori',
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun', $year);
    }
}
