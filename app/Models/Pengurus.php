<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = ['nama', 'jabatan', 'kategori', 'foto', 'urutan'];
}
