<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $table = 'karya';

    protected $fillable = [
        'judul',
        'deskripsi',
        'pembuat',
        'kelas',
        'gambar',
        'kategori',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->latest();
    }
}
