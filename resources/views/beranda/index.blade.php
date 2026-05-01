@extends('layouts.app')
@section('title', 'Beranda')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .hero-swiper { width: 100%; height: 100%; border-radius: 30px; overflow: hidden; }
    .hero-swiper .swiper-slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .swiper-pagination-bullet { background: #fff !important; opacity: 0.5; }
    .swiper-pagination-bullet-active { opacity: 1; background: var(--accent) !important; }
    
    /* Fix for the giant box issue */
    .hero-image-wrapper { 
        position: relative; 
        z-index: 2; 
        width: 100%; 
        max-width: 550px;
        aspect-ratio: 4/3;
        margin-left: auto;
    }
</style>
@endsection

@section('content')
{{-- HERO --}}
<section class="hero">
    <div class="container">
        <div class="grid-2" style="align-items:center;gap:60px">
            <div class="hero-content fade-up" style="text-align:left;padding:0">
                <div class="hero-badge">🎓 Blog Kesiswaan SMK Negeri 1 Adiwerna</div>
                <h1 style="font-size:3.5rem">Wadah Kreativitas &<br><span class="gradient-text">Informasi Kesiswaan</span></h1>
                <p style="max-width:100%">Menyajikan berita terkini, dokumentasi kegiatan, prestasi siswa, dan berbagai informasi penting seputar kehidupan kesiswaan di SMK Negeri 1 Adiwerna.</p>
                <div class="hero-buttons">
                    <a href="{{ route('berita.index') }}" class="btn btn-primary">📰 Baca Berita</a>
                    <a href="{{ route('profil') }}" class="btn btn-outline">Tentang Kesiswaan →</a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <div class="stat-number" data-count="{{ $totalBerita ?? 25 }}">0</div>
                        <div class="stat-label">Artikel Berita</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number" data-count="{{ $totalEkskul ?? 12 }}">0</div>
                        <div class="stat-label">Ekstrakurikuler</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number" data-count="{{ $totalPrestasi ?? 50 }}">0</div>
                        <div class="stat-label">Prestasi Siswa</div>
                    </div>
                </div>
            </div>

            <div class="hero-image-container fade-up">
                <div class="hero-image-wrapper">
                    <div class="floating-badge badge-top">🌟 Top Prestasi</div>
                    <div class="floating-badge badge-bottom">🚀 Aktif & Kreatif</div>
                    
                    <div class="swiper heroSwiper hero-swiper">
                        <div class="swiper-wrapper">
                            @forelse($heroImages as $img)
                            <div class="swiper-slide">
                                <img src="{{ Storage::disk('cloudinary')->url($img) }}" alt="Slider Image">
                            </div>
                            @empty
                            <div class="swiper-slide">
                                <img src="https://images.unsplash.com/photo-1523050853061-80e8a4ff147e?q=80&w=1000" alt="Default 1">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.unsplash.com/photo-1523240715639-93f8bb0a95ee?q=80&w=1000" alt="Default 2">
                            </div>
                            @endforelse
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="hero-image-bg"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SAMBUTAN --}}
<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <h2>Selamat Datang di Blog Kesiswaan</h2>
            <div class="line"></div>
            <p>Media informasi resmi bidang kesiswaan SMK Negeri 1 Adiwerna</p>
        </div>
        <div class="grid-2 fade-up" style="max-width:900px;margin:0 auto;gap:30px;align-items:center">
            <div>
                <p style="color:var(--text-secondary);margin-bottom:15px">Blog Kesiswaan SMK Negeri 1 Adiwerna hadir sebagai wadah informasi dan dokumentasi seluruh kegiatan kesiswaan. Melalui blog ini, kami menyampaikan berita kegiatan, pengumuman penting, serta apresiasi terhadap prestasi dan karya siswa.</p>
                <p style="color:var(--text-secondary);margin-bottom:15px">Kami berharap blog ini dapat menjadi jembatan komunikasi antara sekolah, siswa, orang tua, dan masyarakat dalam mendukung pengembangan potensi siswa secara optimal.</p>
                <a href="{{ route('profil') }}" class="btn btn-primary btn-sm" style="margin-top:10px">Selengkapnya →</a>
            </div>
            <div style="background:linear-gradient(135deg,var(--primary-100,#DBEAFE),var(--surface-100));border-radius:var(--radius-lg);padding:40px;text-align:center">
                <div style="font-size:4rem;margin-bottom:10px">🏫</div>
                <h3 style="color:var(--primary-700);margin-bottom:8px">SMK Negeri 1 Adiwerna</h3>
                <p style="color:var(--text-secondary);font-size:.9rem">Mencetak Generasi Unggul, Berkarakter, dan Berprestasi</p>
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="section" style="background:var(--surface-100)">
    <div class="container">
        <div class="section-header fade-up">
            <h2>📰 Kegiatan Terbaru</h2>
            <div class="line"></div>
            <p>Berita dan dokumentasi kegiatan kesiswaan terkini</p>
        </div>
        <div class="grid-3">
            @forelse($beritaTerbaru ?? [] as $item)
            <div class="card fade-up">
                <img src="{{ $item->gambar ? Storage::disk('cloudinary')->url($item->gambar) : 'https://placehold.co/600x400/1B3A6B/white?text='.urlencode($item->judul) }}" alt="{{ $item->judul }}" class="card-img">
                <div class="card-body">
                    <div class="card-meta">
                        <span class="badge badge-primary">{{ $item->kategori }}</span>
                        <span>{{ $item->published_at?->format('d M Y') }}</span>
                    </div>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit($item->ringkasan ?? strip_tags($item->konten), 100) }}</p>
                    <a href="{{ route('berita.show', $item->id) }}" class="btn btn-sm btn-primary">Baca Selengkapnya →</a>
                </div>
            </div>
            @empty
            @for($i = 0; $i < 3; $i++)
            <div class="card fade-up">
                <img src="https://placehold.co/600x400/{{ ['1B3A6B','2563EB','0F2140'][$i] }}/white?text=Berita+{{ $i+1 }}" alt="Berita" class="card-img">
                <div class="card-body">
                    <div class="card-meta">
                        <span class="badge badge-primary">{{ ['OSIS','Ekskul','Kegiatan'][$i] }}</span>
                        <span>{{ now()->subDays($i)->format('d M Y') }}</span>
                    </div>
                    <h3>{{ ['Pelantikan Pengurus OSIS Periode 2026/2027','Turnamen Futsal Antar Kelas Meriahkan Class Meeting','Kunjungan Industri ke PT Telkom Indonesia'][$i] }}</h3>
                    <p>{{ ['Kegiatan pelantikan pengurus OSIS baru berlangsung khidmat di aula sekolah.','Pertandingan futsal antar kelas berlangsung seru dan penuh semangat.','Siswa kelas XI berkunjung ke PT Telkom untuk mengenal dunia industri.'][$i] }}</p>
                    <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya →</a>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
        <div class="text-center" style="margin-top:40px">
            <a href="{{ route('berita.index') }}" class="btn btn-accent">Lihat Semua Berita →</a>
        </div>
    </div>
</section>

{{-- PENGUMUMAN --}}
<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <h2>📢 Pengumuman Terbaru</h2>
            <div class="line"></div>
        </div>
        <div style="max-width:800px;margin:0 auto;display:flex;flex-direction:column;gap:16px">
            @forelse($pengumumanAktif ?? [] as $item)
            <div class="announce-card fade-up prioritas-{{ $item->prioritas }}">
                <div class="announce-date">
                    <div class="day">{{ $item->created_at->format('d') }}</div>
                    <div class="month">{{ $item->created_at->format('M') }}</div>
                </div>
                <div class="announce-content">
                    <span class="badge badge-{{ $item->prioritas === 'tinggi' ? 'danger' : ($item->prioritas === 'sedang' ? 'warning' : 'primary') }}">{{ ucfirst($item->prioritas) }}</span>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                </div>
            </div>
            @empty
            @php $pengumumanDemo = [
                ['day'=>'28','month'=>'Apr','badge'=>'danger','label'=>'Penting','title'=>'Jadwal Ujian Tengah Semester Genap 2026','desc'=>'UTS Genap dilaksanakan pada tanggal 5-10 Mei 2026. Siswa diwajibkan hadir 30 menit sebelum ujian dimulai.'],
                ['day'=>'25','month'=>'Apr','badge'=>'warning','label'=>'Ekskul','title'=>'Pendaftaran Ekstrakurikuler Baru Dibuka','desc'=>'Pendaftaran anggota baru ekstrakurikuler untuk semester genap telah dibuka. Segera daftarkan diri kalian!'],
                ['day'=>'20','month'=>'Apr','badge'=>'primary','label'=>'Umum','title'=>'Libur Hari Raya Idul Fitri 1447 H','desc'=>'Libur Hari Raya Idul Fitri dimulai tanggal 1-14 April 2026. Selamat Hari Raya Idul Fitri.'],
            ]; @endphp
            @foreach($pengumumanDemo as $p)
            <div class="announce-card fade-up">
                <div class="announce-date">
                    <div class="day">{{ $p['day'] }}</div>
                    <div class="month">{{ $p['month'] }}</div>
                </div>
                <div class="announce-content">
                    <span class="badge badge-{{ $p['badge'] }}">{{ $p['label'] }}</span>
                    <h3>{{ $p['title'] }}</h3>
                    <p>{{ $p['desc'] }}</p>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });
    });
</script>
@endsection
