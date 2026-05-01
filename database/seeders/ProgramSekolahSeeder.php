<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramSekolah;

class ProgramSekolahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_program' => 'Teaching Factory (TeFa)',
                'ikon' => '🏭',
                'deskripsi' => 'Program pembelajaran berbasis produksi yang mengintegrasikan proses belajar mengajar dengan kegiatan produksi nyata, sehingga siswa memiliki pengalaman kerja langsung sesuai standar industri.',
                'urutan' => 1,
            ],
            [
                'nama_program' => 'Program Sertifikasi Kompetensi',
                'ikon' => '📜',
                'deskripsi' => 'Program uji kompetensi resmi yang diakui oleh BNSP (Badan Nasional Sertifikasi Profesi), memberikan sertifikat kompetensi kepada siswa sebagai bekal memasuki dunia kerja.',
                'urutan' => 2,
            ],
            [
                'nama_program' => 'Praktek Kerja Lapangan (PKL)',
                'ikon' => '🏢',
                'deskripsi' => 'Kegiatan magang di perusahaan mitra selama 3-6 bulan, membekali siswa dengan pengalaman kerja nyata dan membangun jaringan profesional sejak dini.',
                'urutan' => 3,
            ],
            [
                'nama_program' => 'Program Adiwiyata',
                'ikon' => '🌿',
                'deskripsi' => 'Program sekolah berwawasan lingkungan yang bertujuan menanamkan kepedulian terhadap kelestarian alam melalui kegiatan penghijauan, pengelolaan sampah, dan edukasi lingkungan.',
                'urutan' => 4,
            ],
            [
                'nama_program' => 'Kelas Industri',
                'ikon' => '⚙️',
                'deskripsi' => 'Kerjasama langsung dengan perusahaan besar untuk menyelaraskan kurikulum dengan kebutuhan industri, termasuk penggunaan peralatan dan teknologi standar industri.',
                'urutan' => 5,
            ],
            [
                'nama_program' => 'Bimbingan Karir & Bursa Kerja',
                'ikon' => '💼',
                'deskripsi' => 'Layanan konseling karir dan penyaluran kerja bagi lulusan, bekerja sama dengan BKK (Bursa Kerja Khusus) sekolah dan ratusan perusahaan mitra di seluruh Indonesia.',
                'urutan' => 6,
            ],
        ];

        foreach ($data as $item) {
            ProgramSekolah::create($item);
        }
    }
}
