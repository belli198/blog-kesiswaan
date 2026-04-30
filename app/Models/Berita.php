<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'ringkasan',
        'gambar',
        'kategori',
        'penulis',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('published_at', 'desc');
    }

    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->konten));
        $minutes = ceil($words / 200);
        return $minutes . ' menit baca';
    }
}
