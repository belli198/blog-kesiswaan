@extends('layouts.app')
@section('title', 'Ekstrakurikuler')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Ekstrakurikuler</span></div>
        <h1>Ekstrakurikuler</h1>
        <p>Wadah pengembangan bakat dan minat siswa SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="filter-tabs fade-up">
            @foreach($kategoris ?? ['Semua', 'Olahraga', 'Seni', 'Akademik', 'Teknologi', 'Keagamaan'] as $kat)
            <a href="{{ route('ekskul', ['kategori' => $kat]) }}" class="filter-tab {{ (request('kategori', 'Semua') == $kat) ? 'active' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-3">
            @forelse($ekskul ?? [] as $item)
            <div class="card ekskul-card fade-up">
                <div class="ekskul-icon">
                    @if($item->gambar)
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}" style="width:100%;height:100%;object-fit:cover;border-radius:inherit">
                    @else
                        {{ substr($item->nama, 0, 1) }}
                    @endif
                </div>
                <h3>{{ $item->nama }}</h3>
                <p>{{ $item->deskripsi }}</p>
                <div class="ekskul-info">
                    <div><strong>Jadwal:</strong> {{ $item->jadwal }}</div>
                    <div><strong>Pembina:</strong> {{ $item->pembina }}</div>
                </div>
            </div>
            @empty
            @php $demoEkskul = [
                ['nama'=>'Pramuka','kat'=>'Keagamaan/Umum','icon'=>'⛺','desc'=>'Kegiatan wajib untuk melatih kedisiplinan dan kemandirian siswa.','jadwal'=>'Jumat, 14.00 - 16.00','pembina'=>'Budi Santoso, S.Pd'],
                ['nama'=>'PMR (Palang Merah Remaja)','kat'=>'Keagamaan/Umum','icon'=>'🚑','desc'=>'Membentuk relawan muda yang tanggap dan peduli kesehatan.','jadwal'=>'Rabu, 15.00 - 16.30','pembina'=>'Siti Aminah, S.Kep'],
                ['nama'=>'Futsal','kat'=>'Olahraga','icon'=>'⚽','desc'=>'Mewadahi bakat siswa di bidang olahraga sepak bola dalam ruangan.','jadwal'=>'Selasa & Kamis, 15.30 - 17.00','pembina'=>'Agus Riyanto, S.Pd'],
                ['nama'=>'Basket','kat'=>'Olahraga','icon'=>'🏀','desc'=>'Pelatihan teknik dan strategi bola basket untuk kompetisi antar sekolah.','jadwal'=>'Senin & Rabu, 15.30 - 17.00','pembina'=>'Deni Setiawan, S.Or'],
                ['nama'=>'Tari Tradisional','kat'=>'Seni','icon'=>'💃','desc'=>'Melestarikan kebudayaan bangsa melalui seni tari daerah.','jadwal'=>'Sabtu, 09.00 - 11.00','pembina'=>'Rini Astuti, S.Sn'],
                ['nama'=>'Rohis (Rohani Islam)','kat'=>'Keagamaan','icon'=>'🕌','desc'=>'Pembinaan mental dan spiritual siswa beragama Islam.','jadwal'=>'Jumat, 11.30 - 13.00','pembina'=>'Ahmad Faizal, S.Ag'],
                ['nama'=>'Robotik','kat'=>'Teknologi','icon'=>'🤖','desc'=>'Pembelajaran dan pengembangan teknologi robotika dasar.','jadwal'=>'Sabtu, 13.00 - 15.00','pembina'=>'Ir. Hendra Kusuma'],
                ['nama'=>'English Club','kat'=>'Akademik','icon'=>'🗣️','desc'=>'Meningkatkan kemampuan bahasa Inggris melalui debat dan pidato.','jadwal'=>'Kamis, 15.00 - 16.30','pembina'=>'Maria Ulfa, S.Pd']
            ]; @endphp
            @foreach($demoEkskul as $e)
            <div class="card ekskul-card fade-up">
                <div class="ekskul-icon" style="background:var(--surface-100);color:var(--primary-500);font-size:3rem">{{ $e['icon'] }}</div>
                <h3>{{ $e['nama'] }}</h3>
                <span class="badge badge-primary" style="margin-bottom:10px">{{ $e['kat'] }}</span>
                <p>{{ $e['desc'] }}</p>
                <div class="ekskul-info" style="margin-top:15px;padding-top:15px;border-top:1px solid var(--surface-200);text-align:left">
                    <div style="margin-bottom:5px">📅 {{ $e['jadwal'] }}</div>
                    <div>👤 {{ $e['pembina'] }}</div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<section class="section" style="background:var(--primary-900);color:white">
    <div class="container text-center fade-up">
        <h2 style="color:white;margin-bottom:20px">Prestasi Ekstrakurikuler</h2>
        <p style="color:rgba(255,255,255,0.7);max-width:700px;margin:0 auto 40px">Ekstrakurikuler SMK Negeri 1 Adiwerna secara rutin menyumbangkan prestasi gemilang di berbagai tingkat kompetisi.</p>
        <div class="grid-3">
            <div style="padding:20px;background:rgba(255,255,255,0.05);border-radius:var(--radius)">
                <div style="font-size:2.5rem;margin-bottom:10px">🏆</div>
                <h4 style="margin-bottom:5px;color:var(--accent-light)">Juara 1 Futsal</h4>
                <p style="font-size:0.9rem;color:rgba(255,255,255,0.6)">Piala Walikota Tegal 2025</p>
            </div>
            <div style="padding:20px;background:rgba(255,255,255,0.05);border-radius:var(--radius)">
                <div style="font-size:2.5rem;margin-bottom:10px">🥇</div>
                <h4 style="margin-bottom:5px;color:var(--accent-light)">Juara Umum Pramuka</h4>
                <p style="font-size:0.9rem;color:rgba(255,255,255,0.6)">Lomba Tingkat Penegak Kabupaten Tegal 2025</p>
            </div>
            <div style="padding:20px;background:rgba(255,255,255,0.05);border-radius:var(--radius)">
                <div style="font-size:2.5rem;margin-bottom:10px">🥈</div>
                <h4 style="margin-bottom:5px;color:var(--accent-light)">Juara 2 Tari Daerah</h4>
                <p style="font-size:0.9rem;color:rgba(255,255,255,0.6)">Festival Seni Siswa Nasional Tingkat Provinsi 2024</p>
            </div>
        </div>
        <div style="margin-top:40px">
            <a href="{{ route('prestasi') }}" class="btn btn-accent">Lihat Semua Prestasi →</a>
        </div>
    </div>
</section>
@endsection
