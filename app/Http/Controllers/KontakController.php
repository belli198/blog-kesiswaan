<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|min:10',
        ]);

        \App\Models\Pesan::create($data);

        return redirect()->route('kontak')->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera merespons.');
    }
}
