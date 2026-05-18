<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Karya;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Berita
        $beritaKategori = ['Akademik', 'Kegiatan', 'Prestasi', 'Umum'];
        for ($i = 1; $i <= 6; $i++) {
            Berita::updateOrCreate(
                ['slug' => Str::slug('Berita Dummy ' . $i . ' SMK N 1 Adiwerna')],
                [
                'judul' => 'Berita Dummy ' . $i . ' SMK N 1 Adiwerna',
                'konten' => '<p>Ini adalah konten berita dummy ke-' . $i . ' yang dibuat otomatis. Kegiatan kesiswaan SMK N 1 Adiwerna selalu aktif dan produktif. Semoga dengan adanya blog kesiswaan ini, seluruh siswa dapat lebih terinformasi dengan baik.</p>',
                'ringkasan' => 'Ringkasan berita dummy ke-' . $i . ' untuk keperluan testing UI.',
                'gambar' => '', // akan otomatis fallback ke placehold.co
                'kategori' => $beritaKategori[array_rand($beritaKategori)],
                'penulis' => 'Admin Kesiswaan',
                'is_published' => true,
                'published_at' => now()->subDays(rand(1, 10)),
            ]);
        }

        // 2. Pengumuman
        $pengKategori = ['Penting', 'Informasi', 'Lomba'];
        for ($i = 1; $i <= 4; $i++) {
            Pengumuman::create([
                'judul' => 'Pengumuman Penting Ke-' . $i,
                'konten' => 'Harap seluruh siswa memperhatikan pengumuman ke-' . $i . ' ini terkait kegiatan belajar mengajar minggu depan.',
                'kategori' => $pengKategori[array_rand($pengKategori)],
                'prioritas' => rand(1, 3), // 1: rendah, 2: sedang, 3: tinggi
                'tanggal_mulai' => now()->subDays(1),
                'tanggal_selesai' => now()->addDays(7),
                'is_active' => true,
            ]);
        }

        // 3. Ekstrakurikuler
        $ekskuls = ['Pramuka', 'PMR', 'Rohis', 'Paskibra', 'Futsal', 'Basket'];
        foreach ($ekskuls as $eks) {
            Ekstrakurikuler::create([
                'nama' => $eks,
                'deskripsi' => 'Ekstrakurikuler ' . $eks . ' bertujuan untuk mengembangkan bakat dan minat siswa di bidang tersebut.',
                'pembina' => 'Bapak/Ibu Pembina ' . $eks,
                'jadwal' => 'Setiap ' . ['Senin', 'Rabu', 'Jumat'][array_rand(['Senin', 'Rabu', 'Jumat'])] . ' Sore',
                'tempat' => 'Lapangan Utama',
                'gambar' => '',
                'kategori' => in_array($eks, ['Futsal', 'Basket']) ? 'Olahraga' : 'Wajib/Pilihan',
                'is_active' => true,
            ]);
        }

        // 4. Galeri
        $galeriKat = ['Kegiatan', 'Fasilitas', 'Lomba'];
        for ($i = 1; $i <= 6; $i++) {
            Galeri::create([
                'judul' => 'Dokumentasi ' . $galeriKat[array_rand($galeriKat)] . ' ' . $i,
                'deskripsi' => 'Foto dokumentasi dari acara sekolah yang diselenggarakan minggu lalu.',
                'gambar' => '',
                'kategori' => $galeriKat[array_rand($galeriKat)],
                'tanggal_kegiatan' => now()->subDays(rand(1, 30)),
            ]);
        }

        // 5. Prestasi
        $tingkats = ['Kabupaten', 'Provinsi', 'Nasional'];
        for ($i = 1; $i <= 5; $i++) {
            Prestasi::create([
                'judul' => 'Juara ' . rand(1, 3) . ' Lomba Kompetensi Siswa',
                'deskripsi' => 'Meraih juara pada bidang lomba IT/Otomotif/Lainnya di tingkat ' . $tingkats[array_rand($tingkats)],
                'tingkat' => $tingkats[array_rand($tingkats)],
                'peraih' => 'Siswa/i Berprestasi ' . $i,
                'tahun' => date('Y'),
                'gambar' => '',
                'kategori' => 'Akademik/Non-Akademik',
            ]);
        }

        // 6. Karya
        for ($i = 1; $i <= 5; $i++) {
            Karya::create([
                'judul' => 'Aplikasi / Produk Inovatif ' . $i,
                'deskripsi' => 'Karya inovatif yang dibuat oleh siswa untuk memecahkan masalah sehari-hari.',
                'pembuat' => 'Tim Karya ' . $i,
                'kelas' => 'XII RPL / TKR',
                'gambar' => '',
                'kategori' => 'Teknologi',
                'is_featured' => true,
            ]);
        }
    }
}
