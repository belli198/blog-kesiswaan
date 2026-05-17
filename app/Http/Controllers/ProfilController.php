<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

class ProfilController extends Controller
{
    public function index()
    {
        $osis = \App\Models\Pengurus::where('kategori', 'OSIS')->orderBy('urutan')->paginate(12, ['*'], 'osis_page');
        $kesiswaan = \App\Models\Pengurus::where('kategori', 'Kesiswaan')->orderBy('urutan')->paginate(12, ['*'], 'kesiswaan_page');
        $penghargaan = \App\Models\Penghargaan::where('is_tampil', true)
                        ->orderBy('tahun', 'desc')
                        ->paginate(12, ['*'], 'penghargaan_page');
        $sejarah = \App\Models\SejarahSekolah::first();
        $programSekolah = \App\Models\ProgramSekolah::where('is_aktif', true)
                        ->orderBy('urutan')
                        ->paginate(9, ['*'], 'program_page');

        return view('profil.index', compact('osis', 'kesiswaan', 'penghargaan', 'sejarah', 'programSekolah'));
    }
}
