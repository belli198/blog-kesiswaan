<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::active();

        if ($request->has('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $ekskul = $query->paginate(12);
        $kategoris = ['Semua', 'Olahraga', 'Seni', 'Akademik', 'Teknologi', 'Keagamaan'];

        return view('ekstrakurikuler.index', compact('ekskul', 'kategoris'));
    }
}
