<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

class ProfilController extends Controller
{
    public function index()
    {
        $osis = Pengurus::where('kategori', 'OSIS')->orderBy('urutan')->get();
        $kesiswaan = Pengurus::where('kategori', 'Kesiswaan')->orderBy('urutan')->get();
        return view('profil.index', compact('osis', 'kesiswaan'));
    }
}
