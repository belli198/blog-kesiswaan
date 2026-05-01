<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $konten = <<<EOT
<p>Sekolah Menengah Kejuruan (SMK) Negeri 1 Adiwerna Kabupaten Tegal berdiri pada tanggal 1 April 1969. Pada awal berdirinya, sekolah ini bernama Sekolah Teknologi Menengah (STM) Negeri Tegal yang berlokasi di Kota Tegal. Namun, seiring dengan kebijakan pemerintah daerah dan kebutuhan lahan yang lebih luas untuk fasilitas praktik bengkel dan laboratorium, sekolah ini kemudian direlokasi ke wilayah Adiwerna, Kabupaten Tegal.</p>

<p>Pada awalnya, STM Negeri Tegal hanya memiliki beberapa jurusan dasar di bidang keteknikan. Seiring dengan berjalannya waktu dan pesatnya perkembangan teknologi industri di Indonesia, sekolah ini terus menambah program keahlian baru guna menjawab tantangan zaman dan kebutuhan Dunia Usaha dan Dunia Industri (DUDI). Transformasi nama dari STM menjadi SMK terjadi pada akhir tahun 90-an mengikuti nomenklatur nasional, dan sekolah ini resmi menyandang nama SMK Negeri 1 Adiwerna.</p>

<p>Hingga saat ini, SMK Negeri 1 Adiwerna telah berkembang menjadi salah satu sekolah vokasi terbesar dan paling bergengsi di Provinsi Jawa Tengah. Dengan predikat sebagai SMK Pusat Keunggulan (Center of Excellence), sekolah ini menjadi rujukan nasional dalam penerapan Kurikulum Merdeka dan Link and Match dengan industri. Ribuan alumni telah berhasil diserap oleh perusahaan-perusahaan ternama berskala nasional maupun multinasional, sementara tidak sedikit pula yang sukses menjadi wirausahawan mandiri.</p>

<p>Dengan semboyan "Disiplin, Kompeten, dan Religius", SMK Negeri 1 Adiwerna terus berkomitmen mencetak generasi muda yang tidak hanya unggul dalam hardskill teknik dan teknologi, tetapi juga dibekali dengan softskill, karakter kepemimpinan, dan nilai-nilai spiritual yang kuat, menjadikan mereka lulusan yang siap kerja, santun, dan mandiri.</p>
EOT;

        \App\Models\SejarahSekolah::firstOrCreate(
            ['judul' => 'Sejarah SMK Negeri 1 Adiwerna'],
            [
                'konten' => $konten,
                'tahun_berdiri' => 1969,
            ]
        );
    }
}
