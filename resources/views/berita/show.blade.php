@extends('layouts.app')
@section('title', $berita->judul ?? 'Detail Berita')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <a href="{{ route('berita.index') }}">Berita</a> <span>/</span> <span>Detail</span></div>
        <h1>{{ $berita->judul ?? 'Judul Berita' }}</h1>
        <p>
            <span class="badge badge-accent">{{ $berita->kategori ?? 'Umum' }}</span>
            &nbsp; {{ $berita->published_at?->format('d F Y') ?? now()->format('d F Y') }}
            &nbsp;•&nbsp; {{ $berita->penulis ?? 'Admin' }}
            &nbsp;•&nbsp; {{ $berita->reading_time ?? '3 menit baca' }}
        </p>
    </div>
</div>

<section class="section">
    <div class="container" style="max-width:800px">
        <img src="{{ isset($berita->gambar) && $berita->gambar ? Storage::disk('cloudinary')->url($berita->gambar) : 'https://placehold.co/800x400/1B3A6B/white?text=Berita' }}" alt="{{ $berita->judul ?? '' }}" style="width:100%;border-radius:var(--radius-lg);margin-bottom:30px" class="fade-up">

        <article class="fade-up" style="font-size:1.05rem;line-height:1.9;color:var(--text-secondary)">
            {!! $berita->konten ?? '<p>Kegiatan pelantikan pengurus OSIS periode 2026/2027 telah dilaksanakan dengan khidmat di aula SMK Negeri 1 Adiwerna. Acara dihadiri oleh Kepala Sekolah, Wakil Kepala Sekolah bidang Kesiswaan, guru pembina OSIS, serta seluruh siswa.</p><p>Pelantikan dimulai dengan upacara pembukaan yang dipimpin oleh Kepala Sekolah. Dalam sambutannya, Kepala Sekolah menyampaikan harapan agar pengurus OSIS baru dapat membawa perubahan positif dan meningkatkan prestasi sekolah.</p><p>Ketua OSIS terpilih, Ahmad Fauzi, menyampaikan visi dan misi programnya yang berfokus pada peningkatan kreativitas siswa, pembinaan karakter, dan pengembangan kegiatan ekstrakurikuler.</p>' !!}
        </article>

        {{-- Share Buttons --}}
        <div style="margin-top:40px;padding-top:20px;border-top:1px solid var(--surface-200)" class="fade-up">
            <p style="font-weight:600;margin-bottom:12px">Bagikan Artikel:</p>
            <div style="display:flex;gap:10px">
                <a href="https://wa.me/?text={{ urlencode(($berita->judul ?? 'Berita').' - '.url()->current()) }}" target="_blank" class="btn btn-sm" style="background:#25D366;color:#fff">WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-sm" style="background:#1877F2;color:#fff">Facebook</a>
                <button onclick="navigator.clipboard.writeText(window.location.href);this.textContent='Tersalin!'" class="btn btn-sm btn-white">📋 Salin Link</button>
            </div>
        </div>

        {{-- Berita Terkait --}}
        @if(isset($beritaTerkait) && $beritaTerkait->count() > 0)
        <div style="margin-top:60px" class="fade-up">
            <h2 style="margin-bottom:24px">Berita Terkait</h2>
            <div class="grid-3">
                @foreach($beritaTerkait as $terkait)
                <div class="card">
                    <img src="{{ $terkait->gambar ? Storage::disk('cloudinary')->url($terkait->gambar) : 'https://placehold.co/400x250/2563EB/white?text=Berita' }}" alt="{{ $terkait->judul }}" class="card-img">
                    <div class="card-body">
                        <h3 style="font-size:.95rem">{{ $terkait->judul }}</h3>
                        <a href="{{ route('berita.show', $terkait->id) }}" class="btn btn-sm btn-primary" style="margin-top:8px">Baca →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
