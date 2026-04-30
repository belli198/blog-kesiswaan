<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published();

        if ($request->has('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        if ($request->has('cari') && $request->cari) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->cari . '%')
                  ->orWhere('konten', 'like', '%' . $request->cari . '%');
            });
        }

        $berita = $query->paginate(9);
        $kategoris = ['Semua', 'OSIS', 'Ekskul', 'Akademik', 'Kegiatan', 'Umum'];

        return view('berita.index', compact('berita', 'kategoris'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $beritaTerkait = Berita::published()
            ->where('id', '!=', $id)
            ->where('kategori', $berita->kategori)
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaTerkait'));
    }
}
