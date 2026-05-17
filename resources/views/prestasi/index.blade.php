@extends('layouts.app')
@section('title', 'Prestasi Siswa')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Prestasi</span></div>
        <h1>Prestasi Siswa</h1>
        <p>Apresiasi atas pencapaian gemilang siswa-siswi SMK Negeri 1 Adiwerna</p>
    </div>
</div>

{{-- HIGHLIGHT --}}
<section class="section">
    <div class="container fade-up">
        <div class="live-bg" style="border-radius:30px;padding:clamp(25px, 5vw, 50px);box-shadow:0 20px 40px rgba(0,0,0,0.1);margin:0">
            <div class="grid-2" style="align-items:center;gap:clamp(30px, 5vw, 50px)">
                <div>
                    <span class="badge" style="background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.2);margin-bottom:16px;display:inline-block;white-space:normal;line-height:1.4">🌟 Siswa Berprestasi Terbaik 2025</span>
                    <h2 style="font-size:clamp(2rem, 4vw, 2.5rem);margin-bottom:20px;color:#fff">Dinda Rahmawati</h2>
                    <p style="color:rgba(255,255,255,0.8);margin-bottom:30px;font-size:1.05rem;line-height:1.7">Meraih Medali Emas Olimpiade Sains Nasional (OSN) Bidang Komputer Tingkat Nasional dan mewakili Indonesia di ajang Internasional.</p>
                    <div style="display:flex;gap:15px;flex-wrap:wrap">
                        <div style="background:rgba(0,0,0,0.2);padding:15px 25px;border-radius:16px;border:1px solid rgba(255,255,255,0.05);flex:1;min-width:120px">
                            <div style="font-size:0.85rem;color:rgba(255,255,255,0.6);margin-bottom:5px">Kelas</div>
                            <div style="font-weight:700;font-size:1.1rem">XII RPL 1</div>
                        </div>
                        <div style="background:rgba(0,0,0,0.2);padding:15px 25px;border-radius:16px;border:1px solid rgba(255,255,255,0.05);flex:1;min-width:120px">
                            <div style="font-size:0.85rem;color:rgba(255,255,255,0.6);margin-bottom:5px">Kategori</div>
                            <div style="font-weight:700;font-size:1.1rem">Akademik</div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <img src="https://placehold.co/600x600/1E3A8A/white?text=Dinda+Rahma" alt="Dinda Rahmawati" style="border-radius:24px;box-shadow:0 15px 35px rgba(0,0,0,0.2);width:100%;max-width:350px;display:inline-block">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DAFTAR PRESTASI --}}
<section class="section">
    <div class="container">
        <div class="fade-up" style="margin-bottom:40px;text-align:center">
            <span class="badge badge-gray" style="margin-bottom:12px;display:inline-flex;align-items:center;gap:6px">🏅 Hall of Fame</span>
            <h2 style="margin:0;color:var(--text-primary);font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em">Daftar Prestasi</h2>
        </div>

        <div class="filter-tabs fade-up" style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;justify-content:center">
            @foreach($kategoris ?? ['Semua', 'Akademik', 'Non-Akademik'] as $kat)
            <a href="{{ route('prestasi', ['kategori' => $kat]) }}" class="filter-tab {{ (request('kategori', 'Semua') == $kat) ? 'active' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-2 mobile-carousel">
            @forelse($prestasi ?? [] as $item)
            <div class="card fade-up" style="padding:24px;display:flex;gap:20px;align-items:flex-start">
                <div class="trophy {{ $item->tingkat == 'Nasional' || $item->tingkat == 'Internasional' ? 'trophy-gold' : ($item->tingkat == 'Provinsi' ? 'trophy-silver' : 'trophy-bronze') }}" style="width:60px;height:60px;font-size:1.8rem">
                    @if($item->tingkat == 'Nasional' || $item->tingkat == 'Internasional') 🏆
                    @elseif($item->tingkat == 'Provinsi') 🥈
                    @else 🥉 @endif
                </div>
                <div style="flex:1">
                    <h3 style="margin-bottom:10px;font-size:1.2rem;color:var(--text-primary)">{{ $item->judul }}</h3>
                    <div style="display:flex;gap:8px;margin-bottom:12px;flex-wrap:wrap">
                        <span class="badge badge-gray" style="font-size:0.7rem">{{ $item->kategori }}</span>
                        <span class="badge" style="background:var(--surface-50);color:{{ $item->tingkat == 'Nasional' || $item->tingkat == 'Internasional' ? 'var(--warning)' : 'var(--text-secondary)' }};font-size:0.7rem;border:1px solid var(--surface-200)">{{ $item->tingkat }}</span>
                        <span class="badge" style="background:var(--surface-50);color:var(--text-secondary);font-size:0.7rem;border:1px solid var(--surface-200)">{{ $item->tahun }}</span>
                    </div>
                    <p style="font-size:0.95rem;color:var(--text-secondary);margin-bottom:10px;line-height:1.6">{{ $item->deskripsi }}</p>
                    <div style="padding-top:12px;border-top:1px solid var(--surface-100);font-size:0.85rem">
                        <strong style="color:var(--text-primary)">Peraih:</strong> <span style="color:var(--text-secondary)">{{ $item->peraih }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px 20px;grid-column:1/-1;background:var(--surface-0);border-radius:24px;border:1px dashed var(--surface-200)">
                <div style="font-size:3rem;margin-bottom:15px">🏆</div>
                <h3 style="color:var(--text-primary);font-size:1.2rem;margin-bottom:10px">Belum ada data prestasi</h3>
                <p style="color:var(--text-secondary);font-size:0.95rem">Data prestasi untuk kategori ini belum tersedia.</p>
            </div>
            @endforelse
        </div>
        
        @if(isset($prestasi) && $prestasi->hasPages())
        <div class="pagination-wrapper">{{ $prestasi->links() }}</div>
        @endif
    </div>
</section>
@endsection


