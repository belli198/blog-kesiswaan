<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

class KaryaController extends Controller
{
    public function index(Request $request)
    {
        $query = Karya::latest();

        if ($request->has('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $karya = $query->paginate(12);
        $kategoris = ['Semua', 'Desain', 'Pemrograman', 'Kerajinan', 'Tulisan', 'Lainnya'];

        return view('karya.index', compact('karya', 'kategoris'));
    }

    public function like($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->increment('likes');
        
        return response()->json([
            'success' => true,
            'likes' => $karya->likes
        ]);
    }
}
