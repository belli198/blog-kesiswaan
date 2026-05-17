@extends('layouts.app')
@section('title', 'Pengumuman')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Pengumuman</span></div>
        <h1>Pengumuman</h1>
        <p>Informasi penting dan pengumuman resmi kesiswaan</p>
    </div>
</div>

<section class="section">
    <div class="container" style="max-width:850px">
        @forelse($pengumuman ?? [] as $item)
        <a href="{{ route('pengumuman.show', $item->id) }}" style="text-decoration:none;color:inherit;display:block;margin-bottom:16px">
            <div class="announce-card fade-up" style="border-radius:20px;padding:30px;align-items:center;box-shadow:0 10px 30px rgba(0,0,0,0.03);position:relative;background:var(--surface-0);display:flex">
                <div class="announce-date" style="border-right:1px solid var(--surface-200);padding-right:30px;min-width:100px;text-align:center">
                    <div class="day" style="font-size:2.2rem;color:var(--text-primary);font-weight:700">{{ $item->created_at->format('d') }}</div>
                    <div class="month" style="font-weight:700;color:var(--text-secondary)">{{ $item->created_at->format('M Y') }}</div>
                </div>
                <div class="announce-content" style="padding-left:30px;flex:1">
                    <div style="display:flex;gap:8px;margin-bottom:12px;flex-wrap:wrap">
                        <span class="badge badge-{{ $item->prioritas === 'tinggi' ? 'danger' : ($item->prioritas === 'sedang' ? 'warning' : 'primary') }}" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:1px">{{ ucfirst($item->prioritas) }}</span>
                        <span class="badge badge-gray" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:1px">{{ $item->kategori }}</span>
                    </div>
                    <h3 style="color:var(--text-primary);font-size:1.25rem;margin-bottom:10px">{{ $item->judul }}</h3>
                    <p style="color:var(--text-secondary);font-size:0.95rem;margin:0">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                    <p style="font-size:.8rem;color:var(--text-light);margin-top:12px">Berlaku: {{ $item->tanggal_mulai->format('d M') }} — {{ $item->tanggal_selesai->format('d M Y') }}</p>
                </div>
                <div style="color:var(--primary-400);font-size:2rem;padding-left:20px">&rsaquo;</div>
            </div>
        </a>
        @empty
        <div style="text-align:center;padding:60px 20px;background:var(--surface-0);border-radius:24px;border:1px dashed var(--surface-200)">
            <div style="font-size:3rem;margin-bottom:15px">📢</div>
            <h3 style="color:var(--text-primary);font-size:1.2rem;margin-bottom:10px">Belum ada pengumuman</h3>
            <p style="color:var(--text-secondary);font-size:0.95rem">Pengumuman terbaru akan muncul di sini.</p>
        </div>
        @endforelse

        @if(isset($pengumuman) && $pengumuman->hasPages())
        <div class="pagination-wrapper">{{ $pengumuman->links() }}</div>
        @endif
    </div>
</section>
@endsection


