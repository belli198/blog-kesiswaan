<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

class ProfilController extends Controller
{
    public function index()
    {
        $osis = \App\Models\Pengurus::where('kategori', 'OSIS')->orderBy('urutan')->take(12)->get();
        $kesiswaan = \App\Models\Pengurus::where('kategori', 'Kesiswaan')->orderBy('urutan')->take(12)->get();
        $penghargaan = \App\Models\Penghargaan::where('is_tampil', true)
                        ->orderBy('tahun', 'desc')
                        ->take(12)
                        ->get();
        $sejarah = \App\Models\SejarahSekolah::first();
        $programSekolah = \App\Models\ProgramSekolah::where('is_aktif', true)
                        ->orderBy('urutan')
                        ->take(9)
                        ->get();

        return view('profil.index', compact('osis', 'kesiswaan', 'penghargaan', 'sejarah', 'programSekolah'));
    }
}
