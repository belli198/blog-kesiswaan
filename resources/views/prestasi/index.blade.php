@extends('layouts.app')
@section('title', 'Prestasi Siswa')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Prestasi</span></div>
        <h1>🏆 Prestasi Siswa</h1>
        <p>Apresiasi atas pencapaian gemilang siswa-siswi SMK Negeri 1 Adiwerna</p>
    </div>
</div>

{{-- HIGHLIGHT --}}
<section class="section" style="padding-bottom:0">
    <div class="container fade-up">
        <div class="featured-section">
            <div class="grid-2" style="align-items:center;padding:0 40px">
                <div>
                    <span class="badge badge-accent" style="margin-bottom:15px">Siswa Berprestasi Terbaik 2025</span>
                    <h2>Dinda Rahmawati</h2>
                    <p style="color:rgba(255,255,255,0.8);margin:15px 0">Meraih Medali Emas Olimpiade Sains Nasional (OSN) Bidang Komputer Tingkat Nasional dan mewakili Indonesia di ajang Internasional.</p>
                    <div style="display:inline-flex;gap:15px;margin-top:10px">
                        <div style="background:rgba(0,0,0,0.2);padding:10px 15px;border-radius:var(--radius-sm)">
                            <div style="font-size:0.8rem;color:rgba(255,255,255,0.6)">Kelas</div>
                            <div style="font-weight:bold">XII RPL 1</div>
                        </div>
                        <div style="background:rgba(0,0,0,0.2);padding:10px 15px;border-radius:var(--radius-sm)">
                            <div style="font-size:0.8rem;color:rgba(255,255,255,0.6)">Kategori</div>
                            <div style="font-weight:bold">Akademik</div>
                        </div>
                    </div>
                </div>
                <div style="text-align:right">
                    <img src="https://placehold.co/400x400/2563EB/white?text=Dinda+Rahma" alt="Dinda Rahmawati" style="border-radius:var(--radius-lg);box-shadow:var(--shadow-xl);display:inline-block">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DAFTAR PRESTASI --}}
<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <h2>Daftar Prestasi</h2>
            <div class="line"></div>
        </div>

        <div class="filter-tabs fade-up">
            @foreach($kategoris ?? ['Semua', 'Akademik', 'Non-Akademik'] as $kat)
            <a href="{{ route('prestasi', ['kategori' => $kat]) }}" class="filter-tab {{ (request('kategori', 'Semua') == $kat) ? 'active' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-2">
            @forelse($prestasi ?? [] as $item)
            <div class="card fade-up">
                <div class="card-body prestasi-card">
                    <div class="trophy {{ $item->tingkat == 'Nasional' || $item->tingkat == 'Internasional' ? 'trophy-gold' : ($item->tingkat == 'Provinsi' ? 'trophy-silver' : 'trophy-bronze') }}">
                        @if($item->tingkat == 'Nasional' || $item->tingkat == 'Internasional') 🏆
                        @elseif($item->tingkat == 'Provinsi') 🥈
                        @else 🥉 @endif
                    </div>
                    <div>
                        <h3 style="margin-bottom:5px;font-size:1.1rem">{{ $item->judul }}</h3>
                        <div style="display:flex;gap:10px;margin-bottom:8px">
                            <span class="badge badge-primary">{{ $item->kategori }}</span>
                            <span class="badge badge-accent">{{ $item->tingkat }}</span>
                            <span class="badge" style="background:var(--surface-200);color:var(--text-secondary)">{{ $item->tahun }}</span>
                        </div>
                        <p style="font-size:0.9rem;margin-bottom:5px"><strong>Peraih:</strong> {{ $item->peraih }}</p>
                        <p style="font-size:0.85rem;color:var(--text-secondary)">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @empty
            @php $demoPrestasi = [
                ['judul'=>'Juara 1 LKS Web Technologies','kat'=>'Akademik','tkt'=>'Provinsi','thn'=>'2025','peraih'=>'Budi Gunawan (XII RPL 2)','desc'=>'Mewakili Kabupaten Tegal dan berhasil meraih juara pertama di tingkat Provinsi Jawa Tengah.'],
                ['judul'=>'Juara 2 Lomba Debat Bahasa Inggris','kat'=>'Akademik','tkt'=>'Kabupaten','thn'=>'2025','peraih'=>'Tim English Club','desc'=>'Kompetisi debat antar SMK se-Kabupaten Tegal yang diadakan oleh Dinas Pendidikan.'],
                ['judul'=>'Medali Perunggu Pencak Silat','kat'=>'Non-Akademik','tkt'=>'Nasional','thn'=>'2024','peraih'=>'Andi Saputra (XI TKJ 1)','desc'=>'Kejuaraan Nasional Pencak Silat Pelajar Piala Menpora RI di Jakarta.'],
                ['judul'=>'Juara Harapan 1 Cipta Puisi','kat'=>'Non-Akademik','tkt'=>'Provinsi','thn'=>'2024','peraih'=>'Siti Maesaroh (X AKL 3)','desc'=>'Festival Literasi Sekolah tingkat Provinsi Jawa Tengah.'],
                ['judul'=>'Juara 1 Lomba Kompetensi Siswa (Akuntansi)','kat'=>'Akademik','tkt'=>'Kabupaten','thn'=>'2025','peraih'=>'Rina Wijayanti (XII AKL 1)','desc'=>'LKS tingkat Kabupaten Tegal bidang Akuntansi.'],
                ['judul'=>'Tim Favorit Festival Film Pendek','kat'=>'Non-Akademik','tkt'=>'Nasional','thn'=>'2024','peraih'=>'Ekskul Sinematografi','desc'=>'Festival Film Pelajar Nusantara (FFPN) dengan judul karya "Secercah Harap".']
            ]; @endphp
            @foreach($demoPrestasi as $p)
            <div class="card fade-up">
                <div class="card-body prestasi-card">
                    <div class="trophy {{ $p['tkt'] == 'Nasional' ? 'trophy-gold' : ($p['tkt'] == 'Provinsi' ? 'trophy-silver' : 'trophy-bronze') }}">
                        @if($p['tkt'] == 'Nasional') 🏆
                        @elseif($p['tkt'] == 'Provinsi') 🥈
                        @else 🥉 @endif
                    </div>
                    <div>
                        <h3 style="margin-bottom:5px;font-size:1.1rem">{{ $p['judul'] }}</h3>
                        <div style="display:flex;gap:10px;margin-bottom:8px">
                            <span class="badge badge-primary">{{ $p['kat'] }}</span>
                            <span class="badge badge-accent">{{ $p['tkt'] }}</span>
                            <span class="badge" style="background:var(--surface-200);color:var(--text-secondary)">{{ $p['thn'] }}</span>
                        </div>
                        <p style="font-size:0.9rem;margin-bottom:5px"><strong>Peraih:</strong> {{ $p['peraih'] }}</p>
                        <p style="font-size:0.85rem;color:var(--text-secondary)">{{ $p['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
        
        @if(isset($prestasi) && $prestasi->hasPages())
        <div class="pagination-wrapper">{{ $prestasi->links() }}</div>
        @endif
    </div>
</section>
@endsection
