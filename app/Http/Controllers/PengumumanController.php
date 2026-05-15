<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('is_active', true)
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pengumuman.index', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }
}
