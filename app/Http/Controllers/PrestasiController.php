<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::latest();

        if ($request->has('tingkat') && $request->tingkat !== 'Semua') {
            $query->where('tingkat', $request->tingkat);
        }

        if ($request->has('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $prestasi = $query->paginate(12);
        $tingkats = ['Semua', 'Sekolah', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional'];
        $kategoris = ['Semua', 'Akademik', 'Olahraga', 'Seni', 'Teknologi'];

        return view('prestasi.index', compact('prestasi', 'tingkats', 'kategoris'));
    }
}
