@extends('layouts.app')
@section('title', $pengumuman->judul)

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <a href="{{ route('pengumuman') }}">Pengumuman</a> <span>/</span> <span>Detail</span></div>
    </div>
</div>

<section class="section" style="padding-top:20px;padding-bottom:80px">
    <div class="container" style="max-width:850px">
        <div class="card fade-up" style="padding:40px;border-radius:24px;border:none;box-shadow:0 10px 40px rgba(0,0,0,0.04);background:#fff">
            
            <div style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap">
                <span class="badge badge-{{ $pengumuman->prioritas === 'tinggi' ? 'danger' : ($pengumuman->prioritas === 'sedang' ? 'warning' : 'primary') }}" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;padding:6px 14px">{{ ucfirst($pengumuman->prioritas) }}</span>
                <span class="badge badge-gray" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;padding:6px 14px">{{ $pengumuman->kategori }}</span>
            </div>

            <h1 style="color:var(--primary-900);font-size:clamp(1.8rem, 4vw, 2.5rem);line-height:1.3;margin-bottom:20px;letter-spacing:-0.03em">{{ $pengumuman->judul }}</h1>
            
            <div style="display:flex;gap:25px;margin-bottom:30px;padding-bottom:25px;border-bottom:1px solid var(--surface-100);color:var(--text-secondary);font-size:0.9rem">
                <div style="display:flex;align-items:center;gap:8px">
                    <span style="color:var(--primary-500)">📅</span> Diterbitkan: {{ $pengumuman->created_at->format('d M Y') }}
                </div>
                <div style="display:flex;align-items:center;gap:8px">
                    <span style="color:var(--warning)">⏳</span> Berlaku: {{ $pengumuman->tanggal_mulai->format('d M') }} — {{ $pengumuman->tanggal_selesai->format('d M Y') }}
                </div>
            </div>

            <div class="article-content" style="font-size:1.1rem;line-height:1.9;color:var(--text-secondary)">
                {!! $pengumuman->konten !!}
            </div>

            <div style="margin-top:50px;padding-top:30px;border-top:1px dashed var(--surface-200)">
                <a href="{{ route('pengumuman') }}" class="btn btn-outline" style="border-radius:50px;padding:12px 30px;font-weight:600">&larr; Kembali ke Daftar Pengumuman</a>
            </div>
        </div>
    </div>
</section>
@endsection
