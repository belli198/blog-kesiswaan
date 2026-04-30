@extends('layouts.app')
@section('title', 'Galeri Kegiatan')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Galeri</span></div>
        <h1>📸 Galeri Kegiatan</h1>
        <p>Dokumentasi berbagai momen berharga di SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="filter-tabs fade-up">
            <button class="filter-tab active" data-filter="Semua">Semua Foto</button>
            <button class="filter-tab" data-filter="MOS/MPLS">MOS/MPLS</button>
            <button class="filter-tab" data-filter="17-an">Lomba 17-an</button>
            <button class="filter-tab" data-filter="Class Meeting">Class Meeting</button>
            <button class="filter-tab" data-filter="Study Tour">Study Tour</button>
            <button class="filter-tab" data-filter="Ekskul">Kegiatan Ekskul</button>
        </div>

        <div class="gallery-grid fade-up">
            @php $demoGaleri = [
                ['k'=>'MOS/MPLS','img'=>'152E56','title'=>'Upacara Pembukaan MPLS','desc'=>'Penyematan tanda peserta MPLS oleh Kepala Sekolah'],
                ['k'=>'MOS/MPLS','img'=>'1B3A6B','title'=>'Dinamika Kelompok','desc'=>'Peserta MPLS mengikuti permainan dinamika kelompok di lapangan'],
                ['k'=>'17-an','img'=>'2563EB','title'=>'Balap Karung','desc'=>'Keseruan lomba balap karung antar siswa memeriahkan HUT RI'],
                ['k'=>'17-an','img'=>'3B82F6','title'=>'Tarik Tambang','desc'=>'Final lomba tarik tambang guru melawan pengurus OSIS'],
                ['k'=>'Class Meeting','img'=>'0F2140','title'=>'Final Futsal','desc'=>'Pertandingan sengit di babak final futsal putra'],
                ['k'=>'Class Meeting','img'=>'60A5FA','title'=>'Lomba Menyanyi','desc'=>'Penampilan memukau perwakilan kelas XII di lomba menyanyi solo'],
                ['k'=>'Study Tour','img'=>'152E56','title'=>'Kunjungan Industri','desc'=>'Siswa menyimak pemaparan dari praktisi industri saat study tour'],
                ['k'=>'Study Tour','img'=>'1B3A6B','title'=>'Foto Bersama','desc'=>'Foto kenangan di depan Candi Borobudur saat study tour ke Yogyakarta'],
                ['k'=>'Ekskul','img'=>'2563EB','title'=>'Persami Pramuka','desc'=>'Kegiatan Perkemahan Sabtu Minggu anggota Pramuka'],
                ['k'=>'Ekskul','img'=>'3B82F6','title'=>'Latihan PMR','desc'=>'Simulasi pertolongan pertama oleh anggota PMR'],
                ['k'=>'Ekskul','img'=>'0F2140','title'=>'Pentas Seni','desc'=>'Penampilan ekskul Tari Tradisional di acara perpisahan'],
                ['k'=>'17-an','img'=>'60A5FA','title'=>'Makan Kerupuk','desc'=>'Ekspresi lucu peserta lomba makan kerupuk']
            ]; @endphp

            @foreach($demoGaleri as $index => $g)
            <div class="gallery-item" data-category="{{ $g['k'] }}">
                <img src="https://placehold.co/600x450/{{ $g['img'] }}/white?text={{ urlencode($g['title']) }}" alt="{{ $g['title'] }}">
                <div class="gallery-overlay">
                    <div>
                        <span class="badge" style="background:rgba(255,255,255,0.2);color:white;margin-bottom:8px;font-size:0.7rem">{{ $g['k'] }}</span>
                        <p>{{ $g['title'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- LIGHTBOX ELEMENT (Hidden by default, used by JS) --}}
<div class="lightbox" id="lightbox">
    <div class="lightbox-close">&times;</div>
    <div class="lightbox-nav lightbox-prev">❮</div>
    <img src="" alt="Gallery Image" id="lightbox-img">
    <div class="lightbox-nav lightbox-next">❯</div>
</div>
@endsection
