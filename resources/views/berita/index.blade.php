@extends('layouts.app')
@section('title', 'Berita Kegiatan')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Berita</span></div>
        <h1>Berita Kegiatan</h1>
        <p>Informasi dan dokumentasi kegiatan kesiswaan terkini</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="search-box fade-up">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <form action="{{ route('berita.index') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari berita..." value="{{ request('cari') }}">
            </form>
        </div>

        <div class="filter-tabs fade-up">
            @foreach($kategoris ?? ['Semua','OSIS','Ekskul','Akademik','Kegiatan','Umum'] as $kat)
            <a href="{{ route('berita.index', ['kategori' => $kat]) }}" class="filter-tab {{ (request('kategori', 'Semua') == $kat) ? 'active' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <div class="grid-3">
            @forelse($berita ?? [] as $item)
            <div class="card fade-up">
                <img src="{{ $item->gambar ? Storage::disk('cloudinary')->url($item->gambar) : 'https://placehold.co/600x400/1B3A6B/white?text='.urlencode(Str::limit($item->judul,20)) }}" alt="{{ $item->judul }}" class="card-img">
                <div class="card-body">
                    <span class="kategori-badge">{{ $item->kategori }}</span>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit($item->ringkasan ?? strip_tags($item->konten), 100) }}</p>
                    <a href="{{ route('berita.show', $item->id) }}" class="read-more">Baca Selengkapnya &rarr;</a>
                    <div class="card-footer">
                        <span>{{ $item->published_at?->format('d M Y') ?? now()->format('d M Y') }}</span>
                        <span>&bull;</span>
                        <span>{{ $item->penulis ?? 'Tim Kesiswaan' }}</span>
                    </div>
                </div>
            </div>
            @empty
            @php $beritaDemo = [
                ['judul'=>'Lomba 17 Agustus: Semangat Kemerdekaan di Sekolah','kat'=>'Kegiatan','color'=>'1B3A6B','desc'=>'Berbagai lomba seru digelar untuk memperingati HUT RI. Siswa antusias mengikuti lomba makan kerupuk hingga balap karung.'],
                ['judul'=>'Class Meeting Semester Genap 2026','kat'=>'OSIS','color'=>'2563EB','desc'=>'OSIS menggelar class meeting dengan berbagai pertandingan olahraga dan seni antar kelas yang berlangsung meriah.'],
                ['judul'=>'Study Tour ke Yogyakarta','kat'=>'Kegiatan','color'=>'152E56','desc'=>'Kunjungan edukatif ke Candi Borobudur dan Keraton Yogyakarta memberikan pengalaman berharga bagi siswa.'],
                ['judul'=>'Peringatan Hari Guru Nasional','kat'=>'Kegiatan','color'=>'0F2140','desc'=>'Siswa memberikan penghargaan dan apresiasi kepada guru tercinta dalam peringatan Hari Guru Nasional.'],
                ['judul'=>'Workshop Kewirausahaan Digital','kat'=>'Akademik','color'=>'3B82F6','desc'=>'Siswa belajar membuat bisnis online dan digital marketing dari praktisi berpengalaman.'],
                ['judul'=>'Turnamen E-Sport Antar Kelas','kat'=>'Ekskul','color'=>'1B3A6B','desc'=>'Kompetisi Mobile Legends dan Valorant antar kelas berlangsung seru selama satu minggu penuh.'],
            ]; @endphp
            @foreach($beritaDemo as $i => $b)
            <div class="card fade-up">
                <img src="https://placehold.co/600x400/{{ $b['color'] }}/white?text={{ urlencode(Str::limit($b['judul'],15)) }}" alt="{{ $b['judul'] }}" class="card-img">
                <div class="card-body">
                    <span class="kategori-badge">{{ $b['kat'] }}</span>
                    <h3>{{ $b['judul'] }}</h3>
                    <p>{{ $b['desc'] }}</p>
                    <a href="#" class="read-more">Baca Selengkapnya &rarr;</a>
                    <div class="card-footer">
                        <span>{{ now()->subDays($i*3)->format('d M Y') }}</span>
                        <span>&bull;</span>
                        <span>Tim Kesiswaan</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>

        @if(isset($berita) && $berita->hasPages())
        <div class="pagination-wrapper">{{ $berita->links() }}</div>
        @endif
    </div>
</section>
@endsection
