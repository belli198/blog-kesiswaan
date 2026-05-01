<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    protected $table = 'penghargaan';
    protected $fillable = [
        'nama_penghargaan', 'kategori', 'tingkat',
        'tahun', 'penyelenggara', 'deskripsi', 'foto', 'is_tampil'
    ];
    protected $casts = ['is_tampil' => 'boolean', 'tahun' => 'integer'];

    public function getFotoUrlAttribute() {
        return $this->foto ? \Illuminate\Support\Facades\Storage::url($this->foto) : null;
    }
}
