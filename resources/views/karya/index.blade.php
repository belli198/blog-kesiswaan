@extends('layouts.app')
@section('title', 'Karya Siswa')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Karya</span></div>
        <h1>Karya Siswa</h1>
        <p>Ruang apresiasi untuk karya kreatif siswa SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container tabs-wrapper">
        <div class="filter-tabs fade-up" style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;justify-content:center;border:none">
            @foreach($kategoris ?? ['Semua', 'Puisi', 'Cerpen', 'Artikel', 'Desain', 'Lainnya'] as $kat)
                <a href="{{ route('karya', ['kategori' => $kat]) }}" class="filter-tab {{ request('kategori', 'Semua') == $kat ? 'active' : '' }}" style="text-decoration:none">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-2">
            @forelse($karya as $item)
                <div class="card karya-card fade-up" style="padding:30px">
                    <div class="card-body" style="padding:0;display:flex;flex-direction:column;height:100%">
                        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px">
                            <span class="badge badge-gray">✍️ {{ $item->kategori }}</span>
                            <button class="btn-like" data-id="{{ $item->id }}" style="background:rgba(239,68,68,0.1);color:var(--danger);border:none;border-radius:50px;padding:6px 14px;font-size:0.85rem;font-weight:700;display:flex;align-items:center;gap:6px;cursor:pointer;transition:var(--transition)">
                                <span class="like-icon">🤍</span> <span class="like-count">{{ $item->likes ?? 0 }}</span> Suka
                            </button>
                        </div>
                        <h3 style="font-size:1.25rem;margin-bottom:15px;color:var(--text-primary)">{{ $item->judul }}</h3>
                        
                        <div class="author" style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
                            <div style="width:40px;height:40px;background:var(--primary-100);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--primary-400);font-weight:700">
                                {{ substr($item->pembuat, 0, 1) }}
                            </div>
                            <div style="font-size:0.9rem;color:var(--text-secondary)">
                                <strong style="color:var(--text-primary);display:block">{{ $item->pembuat }}</strong>
                                <span>{{ $item->kelas }}</span>
                            </div>
                        </div>

                        @if($item->gambar)
                            <div style="margin-bottom:20px;border-radius:12px;overflow:hidden">
                                <img src="{{ Storage::disk('cloudinary')->url($item->gambar) }}" alt="{{ $item->judul }}" style="width:100%;max-height:250px;object-fit:cover">
                            </div>
                        @else
                            <blockquote style="font-size:1.05rem;line-height:1.8;color:var(--text-secondary);font-style:italic;border-left:4px solid var(--primary-300);padding-left:20px;margin:0 0 20px 0;background:var(--surface-50);padding:20px;border-radius:0 12px 12px 0;flex-grow:1">
                                {!! nl2br(e(Str::limit($item->deskripsi, 200))) !!}
                            </blockquote>
                        @endif
                        
                        <a href="#" class="read-more" style="margin-top:auto;margin-bottom:0">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            @empty
                <div style="grid-column:1/-1;text-align:center;padding:60px 20px;background:var(--surface-50);border-radius:24px;border:1px dashed var(--surface-200)">
                    <div style="font-size:3rem;margin-bottom:15px">✍️</div>
                    <h3 style="color:var(--text-primary);font-size:1.2rem;margin-bottom:10px">Belum ada karya</h3>
                    <p style="color:var(--text-secondary)">Jadilah yang pertama mengirimkan karya terbaikmu!</p>
                </div>
            @endforelse
        </div>
        
        <div style="margin-top:40px">
            {{ $karya->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const likeBtns = document.querySelectorAll('.btn-like');
    
    likeBtns.forEach(btn => {
        btn.addEventListener('click', async function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const icon = this.querySelector('.like-icon');
            const count = this.querySelector('.like-count');
            
            // Prevent multiple clicks
            if(this.classList.contains('liked')) return;
            
            this.classList.add('liked');
            this.style.background = 'var(--danger)';
            this.style.color = 'white';
            icon.textContent = '❤️';
            
            try {
                const response = await fetch(`/karya/${id}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if(data.success) {
                    count.textContent = data.likes;
                }
            } catch (err) {
                console.error(err);
                // Revert if error
                this.classList.remove('liked');
                this.style.background = 'rgba(239,68,68,0.1)';
                this.style.color = 'var(--danger)';
                icon.textContent = '🤍';
            }
        });
    });
});
</script>
@endsection


