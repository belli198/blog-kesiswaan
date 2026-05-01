<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenghargaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_penghargaan' => 'Juara 1 LKS Nasional Bidang IT Software Solution',
                'kategori' => 'Akademik',
                'tingkat' => 'Nasional',
                'tahun' => 2023,
                'penyelenggara' => 'Kemendikbudristek',
                'deskripsi' => 'Meraih medali emas pada Lomba Kompetensi Siswa tingkat nasional.',
            ],
            [
                'nama_penghargaan' => 'Sekolah Adiwiyata Mandiri Tingkat Nasional',
                'kategori' => 'Kelembagaan',
                'tingkat' => 'Nasional',
                'tahun' => 2022,
                'penyelenggara' => 'Kementerian LHK',
                'deskripsi' => 'Penghargaan tertinggi di bidang lingkungan hidup untuk sekolah.',
            ],
            [
                'nama_penghargaan' => 'Juara 2 LKS Provinsi Jawa Tengah Bidang Web Design',
                'kategori' => 'Akademik',
                'tingkat' => 'Provinsi',
                'tahun' => 2023,
                'penyelenggara' => 'Dinas Pendidikan Jawa Tengah',
                'deskripsi' => 'Meraih medali perak pada kompetisi web design tingkat provinsi.',
            ],
            [
                'nama_penghargaan' => 'Sekolah Vokasi Terbaik Provinsi Jawa Tengah',
                'kategori' => 'Kelembagaan',
                'tingkat' => 'Provinsi',
                'tahun' => 2021,
                'penyelenggara' => 'Pemerintah Provinsi Jawa Tengah',
                'deskripsi' => 'Dinobatkan sebagai salah satu SMK terbaik berdasarkan serapan kerja lulusan.',
            ],
            [
                'nama_penghargaan' => 'Juara 1 Olimpiade Sains Nasional Bidang Komputer',
                'kategori' => 'Akademik',
                'tingkat' => 'Nasional',
                'tahun' => 2022,
                'penyelenggara' => 'Pusat Prestasi Nasional',
                'deskripsi' => 'Siswa Teknik Komputer dan Jaringan memenangkan OSN bidang komputer.',
            ],
            [
                'nama_penghargaan' => 'SMK PK (Pusat Keunggulan)',
                'kategori' => 'Kelembagaan',
                'tingkat' => 'Nasional',
                'tahun' => 2021,
                'penyelenggara' => 'Kemendikbud',
                'deskripsi' => 'Ditetapkan sebagai SMK Pusat Keunggulan untuk pengembangan program keahlian.',
            ],
            [
                'nama_penghargaan' => 'Juara 1 Debat Bahasa Inggris Tingkat Kabupaten',
                'kategori' => 'Non-Akademik',
                'tingkat' => 'Kabupaten',
                'tahun' => 2023,
                'penyelenggara' => 'Dinas Pendidikan Kab. Tegal',
                'deskripsi' => 'Tim debat bahasa Inggris sekolah meraih juara pertama.',
            ],
            [
                'nama_penghargaan' => 'Akreditasi A',
                'kategori' => 'Kelembagaan',
                'tingkat' => 'Nasional',
                'tahun' => 2020,
                'penyelenggara' => 'BAN-SM',
                'deskripsi' => 'Mempertahankan nilai akreditasi A dengan predikat amat baik.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Penghargaan::create($item);
        }
    }
}
