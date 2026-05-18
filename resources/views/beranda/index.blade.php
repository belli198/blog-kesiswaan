@extends('layouts.app')
@section('title', 'Beranda')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .hero-swiper { width: 100%; height: 100%; border-radius: 30px; overflow: hidden; }
    .hero-swiper .swiper-slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .swiper-pagination-bullet { background:var(--surface-0) !important; opacity: 0.5; }
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
    {{-- HERO SECTION --}}
    <section class="hero" id="beranda" style="position:relative; overflow:hidden;">
        {{-- AMBIENT BLOBS --}}
        <div class="ambient-blobs">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
        </div>
        
        <div class="container" style="position:relative; z-index:2;">
        <div class="grid-2" style="align-items:center;gap:50px">
            <div class="hero-content fade-up" style="text-align:left;padding:0">
                <div class="hero-badge" id="dynamic-greeting">✨ Selamat Datang</div>
                <h1 style="font-size:clamp(2.5rem,5.5vw,3.8rem)">Blog Resmi<br>Kesiswaan<br><span class="gradient-text">SMK N 1 Adiwerna</span></h1>
                <p style="max-width:100%">Pusat informasi kegiatan, prestasi, dan program kesiswaan SMK Negeri 1 Adiwerna, Kabupaten Tegal.</p>
                <div class="hero-buttons">
                    <a href="{{ route('berita.index') }}" class="btn btn-primary">Lihat Kegiatan →</a>
                    <a href="{{ route('profil') }}" class="btn btn-outline">Tentang Kami</a>
                </div>
            </div>

            <div class="fade-up">
                <div class="stats-sidebar">
                    <h3 class="stats-title"><span class="stats-title-icon">📊</span> Statistik Sekolah</h3>
                    <div class="stats-grid-wrapper">
                        {{-- Stat Item 1 --}}
                        <div class="stat-card blue" data-aos="zoom-in" data-aos-delay="100">
                            <div class="stat-card__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <div class="stat-card__number"><span class="counter" data-target="2500">0</span>+</div>
                            <div class="stat-card__label">Siswa Aktif</div>
                        </div>

                        {{-- Stat Item 2 --}}
                        <div class="stat-card gold" data-aos="zoom-in" data-aos-delay="200">
                            <div class="stat-card__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                </svg>
                            </div>
                            <div class="stat-card__number"><span class="counter" data-target="{{ $totalPrestasi ?? 120 }}">0</span>+</div>
                            <div class="stat-card__label">Prestasi</div>
                        </div>

                        {{-- Stat Item 3 --}}
                        <div class="stat-card green" data-aos="zoom-in" data-aos-delay="300">
                            <div class="stat-card__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div class="stat-card__number"><span class="counter" data-target="{{ $totalEkskul ?? 24 }}">0</span></div>
                            <div class="stat-card__label">Ekstrakurikuler</div>
                        </div>

                        {{-- Stat Item 4 --}}
                        <div class="stat-card purple" data-aos="zoom-in" data-aos-delay="400">
                            <div class="stat-card__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.89 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.89l12.683-12.683zm0 0L19.5 7.125" />
                                </svg>
                            </div>
                            <div class="stat-card__number"><span class="counter" data-target="{{ $totalKarya ?? 50 }}">0</span>+</div>
                            <div class="stat-card__label">Karya Siswa</div>
                        </div>
                    </div>
                    
                    <div class="stats-terbaru">
                        <span class="stats-terbaru__icon">🏆</span>
                        <div class="stats-terbaru__text">
                            <strong>Terbaru:</strong> 
                            {{ $beritaTerbaru?->first()?->judul ?? 'Juara 1 LKS Nasional Bidang IT - Tim SMKN 1 Adiwerna 2024' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MARQUEE RUNNING TEXT --}}
<div class="marquee-wrapper">
    <div class="marquee-track">
        <div class="marquee-content">
            <span>✦ SMK BISA</span>
            <span>✦ SMK HEBAT</span>
            <span>✦ SIAP KERJA</span>
            <span>✦ CERDAS BERKARAKTER</span>
            <span>✦ BERPRESTASI</span>
            <span>✦ INOVATIF</span>
            <span>✦ KREATIF</span>
            <span>✦ BERAKHLAK MULIA</span>
            
            {{-- Clone for seamless loop --}}
            <span aria-hidden="true">✦ SMK BISA</span>
            <span aria-hidden="true">✦ SMK HEBAT</span>
            <span aria-hidden="true">✦ SIAP KERJA</span>
            <span aria-hidden="true">✦ CERDAS BERKARAKTER</span>
            <span aria-hidden="true">✦ BERPRESTASI</span>
            <span aria-hidden="true">✦ INOVATIF</span>
            <span aria-hidden="true">✦ KREATIF</span>
            <span aria-hidden="true">✦ BERAKHLAK MULIA</span>
        </div>
    </div>
</div>

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
                <h3 style="color:var(--primary-400);margin-bottom:8px">SMK Negeri 1 Adiwerna</h3>
                <p style="color:var(--text-secondary);font-size:.9rem">Mencetak Generasi Unggul, Berkarakter, dan Berprestasi</p>
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="section" style="background:var(--surface-0)">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:40px" class="fade-up">
            <div>
                <span class="badge" style="background:var(--surface-100);color:var(--text-secondary);margin-bottom:12px;border:1px solid var(--surface-200);text-transform:uppercase;letter-spacing:1px;font-size:0.7rem">📋 Terkini</span>
                <h2 style="margin:0;color:var(--text-primary);font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em">Berita & Kegiatan Terbaru</h2>
                <p style="margin-top:8px;color:var(--text-secondary);font-size:0.95rem">Menampilkan berita terbaru dari total <strong>{{ $totalBerita ?? 25 }}</strong> artikel yang dipublikasikan.</p>
            </div>
            <a href="{{ route('berita.index') }}" style="color:var(--text-primary);font-weight:600;display:flex;align-items:center;gap:5px;font-size:0.95rem" class="hover-accent">Lihat Semua &rarr;</a>
        </div>
        <div class="bento-grid mobile-carousel">
            @forelse($beritaTerbaru ?? [] as $item)
            <div class="card news-card {{ $loop->first ? 'featured-news' : '' }} fade-up" style="border:none;box-shadow:0 10px 30px rgba(0,0,0,0.05);border-radius:24px">
                <img src="{{ $item->gambar ? Storage::disk('cloudinary')->url($item->gambar) : 'https://placehold.co/600x400/1B3A6B/white?text='.urlencode($item->judul) }}" alt="{{ $item->judul }}" class="card-img" style="height:240px;border-radius:24px 24px 0 0">
                <div class="card-body" style="padding:24px 30px">
                    <span style="font-size:0.75rem;font-weight:700;color:var(--text-light);text-transform:uppercase;letter-spacing:1px;display:block;margin-bottom:12px">{{ $item->kategori }}</span>
                    <h3 style="font-size:1.25rem;line-height:1.4;margin-bottom:16px;color:var(--text-primary)">{{ $item->judul }}</h3>
                    <p style="font-size:0.95rem;color:var(--text-secondary);line-height:1.6;margin-bottom:16px">{{ Str::limit($item->ringkasan ?? strip_tags($item->konten), 100) }}</p>
                    <a href="{{ route('berita.show', $item->id) }}" style="color:var(--primary-400);font-weight:700;font-size:0.9rem;display:inline-block;margin-bottom:20px;text-decoration:none">Baca Selengkapnya &rarr;</a>
                    <div style="font-size:0.85rem;color:var(--text-light);display:flex;align-items:center;gap:10px;border-top:1px solid var(--surface-100);padding-top:16px">
                        <span>{{ $item->published_at?->format('d M Y') ?? now()->format('d M Y') }}</span>
                        <span>&bull;</span>
                        <span>{{ $item->penulis ?? 'Tim Kesiswaan' }}</span>
                    </div>
                </div>
            </div>
            @empty
            @for($i = 0; $i < 3; $i++)
            <div class="card news-card {{ $i === 0 ? 'featured-news' : '' }} fade-up" style="border:none;box-shadow:0 10px 30px rgba(0,0,0,0.05);border-radius:24px">
                <img src="https://placehold.co/600x400/{{ ['1B3A6B','F59E0B','10B981'][$i] }}/white?text=Berita+{{ $i+1 }}" alt="Berita" class="card-img" style="height:240px;border-radius:24px 24px 0 0">
                <div class="card-body" style="padding:24px 30px">
                    <span style="font-size:0.75rem;font-weight:700;color:var(--text-light);text-transform:uppercase;letter-spacing:1px;display:block;margin-bottom:12px">{{ ['PRESTASI','KEGIATAN','EKSKUL'][$i] }}</span>
                    <h3 style="font-size:1.25rem;line-height:1.4;margin-bottom:16px;color:var(--text-primary)">{{ ['Tim SMKN 1 Adiwerna Raih Juara 1 LKS Nasional Bidang IT Software','Class Meeting Semester Genap 2024/2025','Pramuka SMKN 1 Adiwerna Ikuti Jambore Nasional'][$i] }}</h3>
                    <p style="font-size:0.95rem;color:var(--text-secondary);line-height:1.6;margin-bottom:16px">{{ ['Keberhasilan luar biasa ditorehkan tim IT SMKN 1 Adiwerna pada ajang bergengsi tingkat nasional tahun ini.','Kegiatan class meeting berlangsung seru dan penuh semangat kompetisi antar kelas di berbagai cabang lomba.','Anggota pramuka berprestasi terpilih mewakili sekolah dalam ajang Jambore Nasional.'][$i] }}</p>
                    <a href="#" style="color:var(--primary-400);font-weight:700;font-size:0.9rem;display:inline-block;margin-bottom:20px;text-decoration:none">Baca Selengkapnya &rarr;</a>
                    <div style="font-size:0.85rem;color:var(--text-light);display:flex;align-items:center;gap:10px;border-top:1px solid var(--surface-100);padding-top:16px">
                        <span>{{ now()->subDays($i*5)->format('d M Y') }}</span>
                        <span>&bull;</span>
                        <span>{{ ['Tim Kesiswaan','OSIS','Pramuka'][$i] }}</span>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

{{-- EKSKUL --}}
<section class="section" style="background:var(--surface-50)">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:40px" class="fade-up">
            <div>
                <span class="badge" style="background:var(--surface-100);color:var(--text-secondary);margin-bottom:12px;border:1px solid var(--surface-200);text-transform:uppercase;letter-spacing:1px;font-size:0.7rem">🎯 Ekstrakurikuler</span>
                <h2 style="margin:0;color:var(--text-primary);font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em">Temukan Minat & Bakatmu</h2>
            </div>
            <a href="{{ route('ekskul') }}" style="color:var(--text-primary);font-weight:600;display:flex;align-items:center;gap:5px;font-size:0.95rem" class="hover-accent">Semua Ekskul &rarr;</a>
        </div>
        <div class="grid-4 mobile-carousel">
            @php $ekskulList = \App\Models\Ekstrakurikuler::where('is_active', true)->take(4)->get(); @endphp
            @forelse($ekskulList as $e)
            <div class="card ekskul-card fade-up" style="background:var(--surface-0);border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,0.03)">
                <div class="ekskul-icon" style="background:var(--surface-50);width:60px;height:60px;font-size:1.8rem;border-radius:12px;margin:0 0 16px 0;display:flex;align-items:center;justify-content:center">
                    @if($e->gambar)
                        <img src="{{ Storage::disk('cloudinary')->url($e->gambar) }}" alt="{{ $e->nama }}" style="width:100%;height:100%;object-fit:cover;border-radius:12px">
                    @else
                        🎯
                    @endif
                </div>
                <h3 style="text-align:left;font-size:1.1rem;margin-bottom:8px;color:var(--text-primary)">{{ $e->nama }}</h3>
                <p style="text-align:left;font-size:0.9rem;color:var(--text-secondary);margin-bottom:16px;line-height:1.5">{{ Str::limit($e->deskripsi, 60) }}</p>
                <div style="text-align:left">
                    <span class="badge" style="background:var(--surface-100);color:var(--text-secondary);font-size:0.7rem;font-weight:600">{{ $e->jadwal }}</span>
                </div>
            </div>
            @empty
            <p style="grid-column:1/-1;text-align:center;color:var(--text-secondary)">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- PENGUMUMAN --}}
<section class="section" style="background:var(--surface-0)">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:40px" class="fade-up">
            <div>
                <span class="badge" style="background:var(--surface-100);color:var(--text-secondary);margin-bottom:12px;border:1px solid var(--surface-200);text-transform:uppercase;letter-spacing:1px;font-size:0.7rem">📢 Penting</span>
                <h2 style="margin:0;color:var(--text-primary);font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em">Pengumuman Terkini</h2>
            </div>
            <a href="{{ route('pengumuman') }}" style="color:var(--text-primary);font-weight:600;display:flex;align-items:center;gap:5px;font-size:0.95rem" class="hover-accent">Semua Pengumuman &rarr;</a>
        </div>
        <div style="display:flex;flex-direction:column;gap:16px">
            @forelse($pengumumanAktif ?? [] as $item)
            <a href="{{ route('pengumuman.show', $item->id) }}" class="announce-card fade-up" style="border-left:none;border-radius:20px;padding:30px;align-items:center;box-shadow:0 10px 30px rgba(0,0,0,0.03);position:relative;display:flex;text-decoration:none;transition:var(--transition)">
                <div class="announce-date" style="border-right:1px solid var(--surface-200);padding-right:30px;min-width:100px">
                    <div class="day" style="font-size:2.2rem;color:var(--text-primary)">{{ $item->created_at->format('d') }}</div>
                    <div class="month">{{ $item->created_at->format('M') }}</div>
                </div>
                <div class="announce-content" style="padding-left:10px;flex:1">
                    <span class="badge" style="background:var(--surface-50);color:{{ $item->prioritas == '1' ? 'var(--primary-500)' : ($item->prioritas == '2' ? 'var(--warning)' : 'var(--danger)') }};font-weight:700;font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px">
                        {{ $item->prioritas == '1' ? 'Biasa' : ($item->prioritas == '2' ? 'Sedang' : 'Tinggi') }}
                    </span>
                    <h3 style="color:var(--text-primary);font-size:1.15rem;margin-bottom:0">{{ $item->judul }}</h3>
                </div>
                <div style="color:var(--text-light);font-size:1.5rem;transition:transform 0.3s" class="arrow-icon">&rsaquo;</div>
            </a>
            @empty
            <div style="text-align:center;padding:40px;background:var(--surface-0);border-radius:20px;border:1px dashed var(--surface-200)">
                <p style="color:var(--text-secondary);margin:0">Belum ada pengumuman.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- KALENDER KEGIATAN --}}
<section class="section" style="background:var(--surface-50)">
    <div class="container">
        <div class="section-header fade-up">
            <span class="badge badge-gray" style="margin-bottom:12px">📅 Agenda</span>
            <h2>Kalender Kegiatan</h2>
            <div class="line"></div>
            <p>Jadwal kegiatan kesiswaan terdekat yang akan diselenggarakan.</p>
        </div>
        <div class="grid-2 fade-up mobile-carousel">
            @forelse($kegiatan ?? [] as $agenda)
            <div class="card" style="display:flex;padding:24px;gap:20px;align-items:center;border-left:4px solid var(--{{ $agenda->warna ?? 'primary-500' }})">
                <div style="text-align:center;background:var(--surface-50);padding:15px;border-radius:16px;min-width:90px">
                    <div style="color:var(--danger);font-size:0.85rem;font-weight:700;text-transform:uppercase">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('M') }}</div>
                    <div style="font-size:2rem;font-weight:900;color:var(--text-primary);line-height:1">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</div>
                </div>
                <div>
                    <h4 style="font-size:1.1rem;margin-bottom:8px;color:var(--text-primary)">{{ $agenda->nama }}</h4>
                    <div style="font-size:0.85rem;color:var(--text-secondary);display:flex;gap:15px;margin-bottom:8px">
                        <span>⏰ {{ $agenda->waktu ?? 'Menyusul' }}</span>
                        <span>📍 {{ $agenda->lokasi }}</span>
                    </div>
                    @if($agenda->deskripsi)
                    <p style="font-size:0.9rem;color:var(--text-light);margin:0">{{ Str::limit($agenda->deskripsi, 60) }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:40px;background:var(--surface-0);border-radius:20px;border:1px dashed var(--surface-200)">
                <p style="color:var(--text-secondary);margin:0">Belum ada jadwal kegiatan terdekat.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- TESTIMONI --}}
<section class="section live-bg">
    <div style="position:absolute;top:-50%;left:-20%;width:800px;height:800px;background:radial-gradient(circle,rgba(37,99,235,.15),transparent 65%);border-radius:50%"></div>
    <div class="container fade-up" style="position:relative;z-index:2">
        <div class="section-header">
            <span class="badge" style="background:rgba(255,255,255,0.1);color:#fff;margin-bottom:12px">💬 Kata Mereka</span>
            <h2 style="color:#fff">Suara Siswa & Alumni</h2>
            <div class="line" style="background:linear-gradient(90deg,var(--accent),var(--primary-300))"></div>
        </div>
        
        <div class="swiper testimoniSwiper" style="padding-bottom:50px">
            <div class="swiper-wrapper">
                @forelse($testimoni ?? [] as $t)
                <div class="swiper-slide">
                    <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);padding:40px;border-radius:24px;text-align:center;backdrop-filter:blur(10px)">
                        <div style="font-size:3rem;color:var(--accent);line-height:1;margin-bottom:20px">"</div>
                        <p style="font-size:1.15rem;line-height:1.8;color:rgba(255,255,255,0.9);margin-bottom:30px;font-style:italic">{{ $t->isi }}</p>
                        <div style="display:flex;align-items:center;justify-content:center;gap:15px">
                            @if($t->foto)
                            <img src="{{ Storage::disk('cloudinary')->url($t->foto) }}" alt="{{ $t->nama }}" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid var(--accent)">
                            @else
                            <div style="width:50px;height:50px;border-radius:50%;background:var(--primary-600);display:flex;align-items:center;justify-content:center;font-weight:700">{{ substr($t->nama, 0, 1) }}</div>
                            @endif
                            <div style="text-align:left">
                                <h4 style="color:#fff;font-size:1rem;margin:0">{{ $t->nama }}</h4>
                                <span style="color:var(--accent-light);font-size:0.85rem">{{ $t->peran }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="swiper-slide">
                    <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);padding:40px;border-radius:24px;text-align:center">
                        <p style="color:rgba(255,255,255,0.7)">Testimoni belum tersedia.</p>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="testimoni-pagination"></div>
        </div>
    </div>
</section>

{{-- FEED INSTAGRAM --}}
<section class="section" style="background:var(--surface-0)">
    <div class="container text-center fade-up">
        <h2 style="margin-bottom:15px;color:var(--text-primary)">📷 Instagram @osis.smkn1adw</h2>
        <p style="color:var(--text-secondary);margin-bottom:40px">Ikuti keseruan kegiatan kami di Instagram resmi OSIS.</p>
        
        <div class="grid-4 mobile-carousel" style="gap:15px">
            <a href="https://instagram.com" target="_blank" class="card" style="border-radius:12px;aspect-ratio:1/1;display:block;position:relative;overflow:hidden">
                <img src="https://placehold.co/400x400/1B3A6B/white?text=IG+Post+1" alt="IG Post" style="width:100%;height:100%;object-fit:cover">
                <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:var(--transition)" class="ig-overlay">
                    <span style="color:#fff;font-size:1.5rem">❤️ 125 💬 12</span>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank" class="card" style="border-radius:12px;aspect-ratio:1/1;display:block;position:relative;overflow:hidden">
                <img src="https://placehold.co/400x400/F59E0B/white?text=IG+Post+2" alt="IG Post" style="width:100%;height:100%;object-fit:cover">
                <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:var(--transition)" class="ig-overlay">
                    <span style="color:#fff;font-size:1.5rem">❤️ 240 💬 30</span>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank" class="card" style="border-radius:12px;aspect-ratio:1/1;display:block;position:relative;overflow:hidden">
                <img src="https://placehold.co/400x400/10B981/white?text=IG+Post+3" alt="IG Post" style="width:100%;height:100%;object-fit:cover">
                <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:var(--transition)" class="ig-overlay">
                    <span style="color:#fff;font-size:1.5rem">❤️ 89 💬 5</span>
                </div>
            </a>
            <a href="https://instagram.com" target="_blank" class="card" style="border-radius:12px;aspect-ratio:1/1;display:block;position:relative;overflow:hidden">
                <img src="https://placehold.co/400x400/8B5CF6/white?text=IG+Post+4" alt="IG Post" style="width:100%;height:100%;object-fit:cover">
                <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:var(--transition)" class="ig-overlay">
                    <span style="color:#fff;font-size:1.5rem">❤️ 312 💬 45</span>
                </div>
            </a>
        </div>
        <style>
            .card:hover .ig-overlay { opacity: 1; }
        </style>
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

        const testimoniSwiper = new Swiper('.testimoniSwiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimoni-pagination',
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 }
            }
        });
    });
</script>
@endsection


