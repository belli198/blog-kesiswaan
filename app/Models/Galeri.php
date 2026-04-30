<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'tanggal_kegiatan',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
