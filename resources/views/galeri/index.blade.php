@extends('layouts.app')
@section('title', 'Galeri Kegiatan')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Galeri</span></div>
        <h1>Galeri Kegiatan</h1>
        <p>Dokumentasi berbagai momen berharga di SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="filter-tabs fade-up" style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;justify-content:center">
            <button class="filter-tab active" data-filter="Semua">Semua Foto</button>
            <button class="filter-tab" data-filter="MOS/MPLS">MOS/MPLS</button>
            <button class="filter-tab" data-filter="17-an">Lomba 17-an</button>
            <button class="filter-tab" data-filter="Class Meeting">Class Meeting</button>
            <button class="filter-tab" data-filter="Study Tour">Study Tour</button>
            <button class="filter-tab" data-filter="Ekskul">Kegiatan Ekskul</button>
        </div>

        <div class="gallery-grid fade-up">
            @forelse($galeri ?? [] as $item)
            <div class="gallery-item" data-category="{{ $item->kategori }}">
                <img src="{{ Storage::disk('cloudinary')->url($item->gambar) }}" alt="{{ $item->judul }}">
                <div class="gallery-overlay">
                    <div>
                        <span class="badge" style="background:rgba(255,255,255,0.2);color:white;margin-bottom:8px;font-size:0.7rem">{{ $item->kategori }}</span>
                        <p>{{ $item->judul }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px 20px;background:var(--surface-0);border-radius:24px;border:1px dashed var(--surface-200)">
                <div style="font-size:3rem;margin-bottom:15px">📸</div>
                <h3 style="color:var(--text-primary);font-size:1.2rem;margin-bottom:10px">Belum ada foto galeri</h3>
                <p style="color:var(--text-secondary);font-size:0.95rem">Galeri foto belum ditambahkan oleh administrator.</p>
            </div>
            @endforelse
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button styles
            filterBtns.forEach(b => {
                b.classList.remove('active');
                
                
                
            });
            btn.classList.add('active');
            
            
            

            // Filter cards
            const filter = btn.getAttribute('data-filter');
            cards.forEach(card => {
                if(filter === 'Semua' || card.getAttribute('data-category') === filter) {
                    card.style.display = '';
                    card.style.animation = 'fadeIn .4s ease';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection


