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
        <div class="filter-tabs fade-up" style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;justify-content:center">
            @foreach($kategoris ?? ['Semua', 'Olahraga', 'Seni', 'Akademik', 'Teknologi', 'Keagamaan'] as $kat)
            <a href="{{ route('ekskul', ['kategori' => $kat]) }}" class="filter-btn {{ (request('kategori', 'Semua') == $kat) ? 'active' : '' }}" style="padding:10px 24px;border-radius:50px;border:1px solid {{ (request('kategori', 'Semua') == $kat) ? 'var(--primary-900)' : 'var(--surface-200)' }};background:{{ (request('kategori', 'Semua') == $kat) ? 'var(--primary-900)' : '#fff' }};color:{{ (request('kategori', 'Semua') == $kat) ? '#fff' : 'var(--text-secondary)' }};font-weight:600;font-size:0.9rem;text-decoration:none">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-3">
            @php $colors = ['var(--primary-600)', 'var(--accent)', 'var(--success)', '#8B5CF6', '#EC4899', '#14B8A6']; @endphp
            @forelse($ekskul ?? [] as $index => $item)
            <div class="card ekskul-card fade-up" style="padding:30px;border-top:4px solid {{ $colors[$index % count($colors)] }}">
                <div class="ekskul-icon" style="background:var(--surface-50);width:60px;height:60px;font-size:1.8rem;border-radius:12px;margin:0 0 16px 0;display:flex;align-items:center;justify-content:center;overflow:hidden">
                    @if($item->gambar)
                        <img src="{{ Storage::disk('cloudinary')->url($item->gambar) }}" alt="{{ $item->nama }}" style="width:100%;height:100%;object-fit:cover">
                    @else
                        {{ substr($item->nama, 0, 1) }}
                    @endif
                </div>
                <h3 style="font-size:1.15rem;margin-bottom:8px;color:var(--primary-900)">{{ $item->nama }}</h3>
                <span class="badge badge-gray" style="margin-bottom:12px">{{ $item->kategori ?? 'Umum' }}</span>
                <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.6">{{ $item->deskripsi }}</p>
                <div class="ekskul-info" style="margin-top:15px;padding-top:15px;border-top:1px solid var(--surface-100);font-size:0.85rem;color:var(--text-light)">
                    <div style="margin-bottom:5px;display:flex;gap:8px"><strong>📅 Jadwal:</strong> {{ $item->jadwal }}</div>
                    <div style="display:flex;gap:8px"><strong>👤 Pembina:</strong> {{ $item->pembina }}</div>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px 20px;grid-column:1/-1;background:var(--surface-0);border-radius:24px;border:1px dashed var(--surface-200)">
                <div style="font-size:3rem;margin-bottom:15px">🎯</div>
                <h3 style="color:var(--primary-900);font-size:1.2rem;margin-bottom:10px">Belum ada data ekstrakurikuler</h3>
                <p style="color:var(--text-secondary);font-size:0.95rem">Data ekstrakurikuler belum ditambahkan oleh administrator.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section" style="background:var(--primary-900);color:white;margin:40px 20px;border-radius:30px;padding:80px 0">
    <div class="container text-center fade-up">
        <span class="badge" style="background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.2);margin-bottom:16px">🏆 Prestasi</span>
        <h2 style="color:white;margin-bottom:20px;font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em">Prestasi Ekstrakurikuler</h2>
        <p style="color:rgba(255,255,255,0.7);max-width:700px;margin:0 auto 50px;font-size:1.05rem">Ekstrakurikuler SMK Negeri 1 Adiwerna secara rutin menyumbangkan prestasi gemilang di berbagai tingkat kompetisi.</p>
        <div class="grid-3" style="text-align:left">
            <div style="padding:30px;background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.1)">
                <div style="font-size:2.5rem;margin-bottom:20px">🏆</div>
                <h4 style="margin-bottom:10px;color:var(--accent-light);font-size:1.15rem">Juara 1 Futsal</h4>
                <p style="font-size:0.95rem;color:rgba(255,255,255,0.6);margin:0">Piala Walikota Tegal 2025</p>
            </div>
            <div style="padding:30px;background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.1)">
                <div style="font-size:2.5rem;margin-bottom:20px">🥇</div>
                <h4 style="margin-bottom:10px;color:var(--accent-light);font-size:1.15rem">Juara Umum Pramuka</h4>
                <p style="font-size:0.95rem;color:rgba(255,255,255,0.6);margin:0">Lomba Tingkat Penegak Kabupaten Tegal 2025</p>
            </div>
            <div style="padding:30px;background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.1)">
                <div style="font-size:2.5rem;margin-bottom:20px">🥈</div>
                <h4 style="margin-bottom:10px;color:var(--accent-light);font-size:1.15rem">Juara 2 Tari Daerah</h4>
                <p style="font-size:0.95rem;color:rgba(255,255,255,0.6);margin:0">Festival Seni Siswa Nasional Tingkat Provinsi 2024</p>
            </div>
        </div>
        <div style="margin-top:50px">
            <a href="{{ route('prestasi') }}" class="btn btn-white" style="border-radius:50px;padding:12px 30px;font-weight:700">Lihat Semua Prestasi &rarr;</a>
        </div>
    </div>
</section>
@endsection
