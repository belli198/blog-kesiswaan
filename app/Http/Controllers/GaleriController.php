<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::latest();

        if ($request->has('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $galeri = $query->paginate(12);
        $kategoris = ['Semua', 'Upacara', 'Lomba', 'Ekskul', 'Kunjungan', 'Kegiatan'];

        return view('galeri.index', compact('galeri', 'kategoris'));
    }
}
