<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

class ProfilController extends Controller
{
    public function index()
    {
        $osis = \App\Models\Pengurus::where('kategori', 'OSIS')->orderBy('urutan')->get();
        $kesiswaan = \App\Models\Pengurus::where('kategori', 'Kesiswaan')->orderBy('urutan')->get();
        $penghargaan = \App\Models\Penghargaan::where('is_tampil', true)
                        ->orderBy('tahun', 'desc')
                        ->get();
        $sejarah = \App\Models\SejarahSekolah::first();

        return view('profil.index', compact('osis', 'kesiswaan', 'penghargaan', 'sejarah'));
    }
}
