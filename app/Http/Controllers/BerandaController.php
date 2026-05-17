<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;

class BerandaController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::published()->take(6)->get();
        $pengumumanAktif = Pengumuman::active()->take(3)->get();
        $prestasiTerbaru = Prestasi::latest()->take(4)->get();
        $galeriTerbaru = Galeri::latest()->take(6)->get();
        $totalEkskul = Ekstrakurikuler::active()->count();
        $totalPrestasi = Prestasi::count();
        $totalBerita = Berita::published()->count();
        $heroSettings = \App\Models\Setting::where('key', 'hero_image')->first();
        $heroValue = $heroSettings?->value;
        
        // Pastikan heroImages selalu berupa array, jangan sampai NULL
        if (is_array($heroValue)) {
            $heroImages = $heroValue;
        } elseif (is_string($heroValue) && !empty($heroValue)) {
            $heroImages = json_decode($heroValue, true) ?? [];
        } else {
            $heroImages = [];
        }

        $kegiatan = \App\Models\Kegiatan::whereDate('tanggal', '>=', date('Y-m-d'))->orderBy('tanggal')->take(4)->get();
        $testimoni = \App\Models\Testimoni::where('is_active', true)->get();
        $totalKarya = \App\Models\Karya::count();

        return view('beranda.index', compact(
            'beritaTerbaru',
            'pengumumanAktif',
            'prestasiTerbaru',
            'galeriTerbaru',
            'totalEkskul',
            'totalPrestasi',
            'totalBerita',
            'totalKarya',
            'heroImages',
            'kegiatan',
            'testimoni'
        ));
    }
}
