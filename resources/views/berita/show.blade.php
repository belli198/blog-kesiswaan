@extends('layouts.app')
@section('title', $berita->judul ?? 'Detail Berita')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <a href="{{ route('berita.index') }}">Berita</a> <span>/</span> <span>Detail</span></div>
        <h1>{{ $berita->judul ?? 'Judul Berita' }}</h1>
        <div style="display:flex;gap:12px;align-items:center;font-size:0.9rem;color:rgba(255,255,255,0.7);margin-top:20px">
            <span class="badge" style="background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.2)">{{ $berita->kategori ?? 'Umum' }}</span>
            <span>&bull;</span>
            <span>{{ $berita->published_at?->format('d F Y') ?? now()->format('d F Y') }}</span>
            <span>&bull;</span>
            <span>{{ $berita->penulis ?? 'Tim Kesiswaan' }}</span>
        </div>
    </div>
</div>

<section class="section">
    <div class="container" style="max-width:800px">
        <img src="{{ isset($berita->gambar) && $berita->gambar ? Storage::disk('cloudinary')->url($berita->gambar) : 'https://placehold.co/800x400/1B3A6B/white?text=Berita' }}" alt="{{ $berita->judul ?? '' }}" style="width:100%;border-radius:24px;margin-bottom:40px;box-shadow:0 20px 40px rgba(0,0,0,0.06)" class="fade-up">

        <article class="fade-up" style="font-size:1.05rem;line-height:1.9;color:var(--text-secondary)">
            {!! $berita->konten ?? '<p>Kegiatan pelantikan pengurus OSIS periode 2026/2027 telah dilaksanakan dengan khidmat di aula SMK Negeri 1 Adiwerna. Acara dihadiri oleh Kepala Sekolah, Wakil Kepala Sekolah bidang Kesiswaan, guru pembina OSIS, serta seluruh siswa.</p><p>Pelantikan dimulai dengan upacara pembukaan yang dipimpin oleh Kepala Sekolah. Dalam sambutannya, Kepala Sekolah menyampaikan harapan agar pengurus OSIS baru dapat membawa perubahan positif dan meningkatkan prestasi sekolah.</p><p>Ketua OSIS terpilih, Ahmad Fauzi, menyampaikan visi dan misi programnya yang berfokus pada peningkatan kreativitas siswa, pembinaan karakter, dan pengembangan kegiatan ekstrakurikuler.</p>' !!}
        </article>

        {{-- Share Buttons --}}
        <div style="margin-top:50px;padding-top:30px;border-top:1px solid var(--surface-100)" class="fade-up">
            <p style="font-weight:700;margin-bottom:16px;color:var(--primary-900)">Bagikan Artikel Ini:</p>
            <div style="display:flex;gap:12px">
                <a href="https://wa.me/?text={{ urlencode(($berita->judul ?? 'Berita').' - '.url()->current()) }}" target="_blank" class="btn btn-sm" style="background:#25D366;color:#fff;border-radius:8px">WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-sm" style="background:#1877F2;color:#fff;border-radius:8px">Facebook</a>
                <button onclick="navigator.clipboard.writeText(window.location.href);this.textContent='Tersalin!'" class="btn btn-sm btn-white" style="border-radius:8px">📋 Salin Link</button>
            </div>
        </div>

        {{-- Berita Terkait --}}
        @if(isset($beritaTerkait) && $beritaTerkait->count() > 0)
        <div style="margin-top:60px" class="fade-up">
            <h2 style="margin-bottom:24px;font-size:1.8rem;color:var(--primary-900)">Berita Terkait</h2>
            <div class="grid-2">
                @foreach($beritaTerkait as $terkait)
                <div class="card">
                    <img src="{{ $terkait->gambar ? Storage::disk('cloudinary')->url($terkait->gambar) : 'https://placehold.co/400x250/2563EB/white?text=Berita' }}" alt="{{ $terkait->judul }}" class="card-img" style="height:180px">
                    <div class="card-body" style="padding:20px">
                        <span class="kategori-badge">{{ $terkait->kategori }}</span>
                        <h3 style="font-size:1.1rem;margin-bottom:12px">{{ $terkait->judul }}</h3>
                        <a href="{{ route('berita.show', $terkait->id) }}" class="read-more" style="margin-bottom:0">Baca Artikel &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
