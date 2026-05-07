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
            'email' => 'nullable|email|max:255',
            'kelas' => 'nullable|string|max:100',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|min:10',
        ]);

        // Minimal salah satu harus diisi: email atau kelas
        if (empty($data['email']) && empty($data['kelas'])) {
            return back()->withErrors(['email' => 'Harap isi Email atau Kelas (minimal salah satu).'])->withInput();
        }

        \App\Models\Pesan::create($data);

        return redirect()->route('kontak')->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera merespons.');
    }
}
