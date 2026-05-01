@extends('layouts.app')
@section('title', 'Profil Kesiswaan')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Profil</span></div>
        <h1>Profil Kesiswaan</h1>
        <p>Mengenal lebih dekat bidang kesiswaan SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="section-header fade-up">
            <h2>Tentang Bidang Kesiswaan</h2>
            <div class="line"></div>
        </div>
        <div style="max-width:800px;margin:0 auto" class="fade-up">
            <p style="color:var(--text-secondary);margin-bottom:15px;text-align:center">Bidang Kesiswaan SMK Negeri 1 Adiwerna bertanggung jawab dalam membina, mengarahkan, dan mengembangkan potensi siswa di luar kegiatan akademik. Melalui berbagai program kegiatan, kami berupaya mencetak generasi muda yang berkarakter, kreatif, dan berprestasi.</p>
            <p style="color:var(--text-secondary);text-align:center">Kami bekerja sama dengan OSIS, MPK, pembina ekstrakurikuler, serta seluruh warga sekolah untuk menciptakan lingkungan pendidikan yang kondusif dan menyenangkan bagi seluruh siswa.</p>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="section" style="background:var(--surface-100)">
    <div class="container">
        <div class="section-header fade-up"><h2>Visi & Misi Kesiswaan</h2><div class="line"></div></div>
        <div class="grid-2 fade-up" style="max-width:900px;margin:0 auto">
            <div class="vm-card visi">
                <h3>🎯 Visi</h3>
                <p style="font-size:1.05rem;line-height:1.8">Mewujudkan siswa SMK Negeri 1 Adiwerna yang beriman, berkarakter, berprestasi, kreatif, dan siap bersaing di era global.</p>
            </div>
            <div class="vm-card misi">
                <h3>🚀 Misi</h3>
                <ol>
                    <li>Membina karakter siswa melalui kegiatan keagamaan dan nasionalisme</li>
                    <li>Mengembangkan bakat dan minat melalui ekstrakurikuler</li>
                    <li>Memfasilitasi siswa dalam kompetisi akademik dan non-akademik</li>
                    <li>Menumbuhkan jiwa kepemimpinan dan keorganisasian</li>
                    <li>Menciptakan lingkungan sekolah yang aman, nyaman, dan menyenangkan</li>
                </ol>
            </div>
        </div>
    </div>
</section>

{{-- STRUKTUR KESISWAAN --}}
<section class="section">
    <div class="container">
        <div class="section-header fade-up"><h2>Struktur Anggota Kesiswaan</h2><div class="line"></div><p>Guru dan Staf Bidang Kesiswaan</p></div>
        <div class="grid-4">
            @forelse($kesiswaan ?? [] as $k)
            <div class="org-card fade-up">
                @if($k->foto)
                    <img src="{{ Storage::disk('cloudinary')->url($k->foto) }}" alt="{{ $k->nama }}" class="org-photo" style="object-fit:cover">
                @else
                    <img src="https://placehold.co/200x200/1B3A6B/white?text={{ urlencode(substr($k->nama,0,2)) }}" alt="{{ $k->nama }}" class="org-photo">
                @endif
                <div class="org-name">{{ $k->nama }}</div>
                <div class="org-role">{{ $k->jabatan }}</div>
            </div>
            @empty
            <p style="grid-column:1/-1;text-align:center;color:var(--text-secondary)">Belum ada data anggota kesiswaan.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- STRUKTUR OSIS --}}
<section class="section" style="background:var(--surface-50)">
    <div class="container">
        <div class="section-header fade-up"><h2>Struktur Organisasi OSIS</h2><div class="line"></div><p>Pengurus OSIS Periode Saat Ini</p></div>
        <div class="grid-4">
            @forelse($osis ?? [] as $o)
            <div class="org-card fade-up">
                @if($o->foto)
                    <img src="{{ Storage::disk('cloudinary')->url($o->foto) }}" alt="{{ $o->nama }}" class="org-photo" style="object-fit:cover">
                @else
                    <img src="https://placehold.co/200x200/2563EB/white?text={{ urlencode(substr($o->nama,0,2)) }}" alt="{{ $o->nama }}" class="org-photo">
                @endif
                <div class="org-name">{{ $o->nama }}</div>
                <div class="org-role">{{ $o->jabatan }}</div>
            </div>
            @empty
            @php $demoOsis = [
                ['nama'=>'Ahmad Fauzi','jabatan'=>'Ketua OSIS','color'=>'2563EB'],
                ['nama'=>'Siti Nurhaliza','jabatan'=>'Wakil Ketua','color'=>'3B82F6'],
                ['nama'=>'Budi Santoso','jabatan'=>'Sekretaris','color'=>'1B3A6B'],
                ['nama'=>'Dewi Anggraini','jabatan'=>'Bendahara','color'=>'0F2140'],
            ]; @endphp
            @foreach($demoOsis as $do)
            <div class="org-card fade-up">
                <img src="https://placehold.co/200x200/{{ $do['color'] }}/white?text={{ urlencode(substr($do['nama'],0,2)) }}" alt="{{ $do['nama'] }}" class="org-photo">
                <div class="org-name">{{ $do['nama'] }}</div>
                <div class="org-role">{{ $do['jabatan'] }}</div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>
{{-- SEJARAH SEKOLAH --}}
@if($sejarah)
<section class="section" style="background:#fff">
    <div class="container">
        <div class="section-header fade-up">
            <h2>{{ $sejarah->judul }}</h2>
            <div class="line"></div>
        </div>
        <div class="grid-2 fade-up" style="align-items:center;gap:40px">
            <div>
                @if($sejarah->foto_gedung)
                    <img src="{{ Storage::disk('cloudinary')->url($sejarah->foto_gedung) }}" alt="Gedung SMK" style="width:100%;border-radius:15px;box-shadow:var(--shadow-lg)">
                @else
                    <div style="width:100%;height:300px;background:var(--surface-200);border-radius:15px;display:flex;align-items:center;justify-content:center;color:var(--text-secondary)">
                        <i class="fas fa-building" style="font-size:4rem"></i>
                    </div>
                @endif
            </div>
            <div style="font-size:1.1rem;line-height:1.8;color:var(--text-secondary)">
                {!! $sejarah->konten !!}
            </div>
        </div>
    </div>
</section>
@endif

{{-- PROGRAM UNGGULAN SEKOLAH --}}
<section class="section" style="background:var(--surface-100)">
    <div class="container">
        <div class="section-header fade-up">
            <h2>Program Unggulan Sekolah</h2>
            <div class="line"></div>
            <p>Program-program unggulan yang menjadi kebanggaan SMK Negeri 1 Adiwerna</p>
        </div>
        <div class="grid-3">
            @forelse($programSekolah ?? [] as $prog)
            <div class="fade-up" style="background:#fff;padding:25px 25px 25px 30px;border-radius:12px;box-shadow:var(--shadow-md);border-left:4px solid var(--primary-600);transition:transform 0.3s,box-shadow 0.3s;cursor:default">
                <div style="font-size:2.2rem;margin-bottom:10px">{{ $prog->ikon ?? '📋' }}</div>
                <h3 style="font-size:1.15rem;margin-bottom:8px;color:var(--text-primary)">{{ $prog->nama_program }}</h3>
                <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.7">{{ $prog->deskripsi }}</p>
            </div>
            @empty
            <p style="grid-column:1/-1;text-align:center;color:var(--text-secondary)">Belum ada data program sekolah.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- PENGHARGAAN SEKOLAH --}}
<section class="section" style="background:var(--surface-50)">
    <div class="container">
        <div class="section-header fade-up">
            <h2>Penghargaan & Prestasi Sekolah</h2>
            <div class="line"></div>
        </div>

        <div class="filter-tabs fade-up" style="display:flex;justify-content:center;gap:10px;margin-bottom:30px;flex-wrap:wrap">
            <button class="filter-btn active" data-filter="all" style="padding:8px 20px;border-radius:20px;border:none;background:var(--primary-600);color:#fff;cursor:pointer;font-weight:600">Semua</button>
            <button class="filter-btn" data-filter="Nasional" style="padding:8px 20px;border-radius:20px;border:none;background:var(--surface-200);color:var(--text-primary);cursor:pointer;font-weight:600">Nasional</button>
            <button class="filter-btn" data-filter="Provinsi" style="padding:8px 20px;border-radius:20px;border:none;background:var(--surface-200);color:var(--text-primary);cursor:pointer;font-weight:600">Provinsi</button>
            <button class="filter-btn" data-filter="Kabupaten" style="padding:8px 20px;border-radius:20px;border:none;background:var(--surface-200);color:var(--text-primary);cursor:pointer;font-weight:600">Kabupaten</button>
        </div>

        <div class="grid-3" id="penghargaan-grid">
            @forelse($penghargaan ?? [] as $p)
            <div class="prestasi-card fade-up" data-tingkat="{{ $p->tingkat }}" style="background:#fff;padding:25px;border-radius:15px;box-shadow:var(--shadow-md);display:flex;flex-direction:column;gap:15px;transition:transform 0.3s">
                <div style="display:flex;justify-content:space-between;align-items:flex-start">
                    <div style="font-size:2.5rem;line-height:1">🏆</div>
                    @php
                        $badgeColor = '#10B981'; // default green
                        if($p->tingkat == 'Nasional') $badgeColor = '#F59E0B'; // gold
                        elseif($p->tingkat == 'Provinsi') $badgeColor = '#3B82F6'; // blue
                    @endphp
                    <span style="background:{{ $badgeColor }}20;color:{{ $badgeColor }};padding:5px 12px;border-radius:20px;font-size:0.85rem;font-weight:700">{{ $p->tingkat }}</span>
                </div>
                <div>
                    <h3 style="font-size:1.25rem;margin-bottom:5px;color:var(--text-primary)">{{ $p->nama_penghargaan }}</h3>
                    <div style="color:var(--primary-600);font-weight:600;font-size:0.95rem;margin-bottom:10px">{{ $p->tahun }} @if($p->penyelenggara) • {{ $p->penyelenggara }} @endif</div>
                    <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.6">{{ $p->deskripsi }}</p>
                </div>
            </div>
            @empty
            <p style="grid-column:1/-1;text-align:center;color:var(--text-secondary)">Belum ada data penghargaan.</p>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.prestasi-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active button styles
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.style.background = 'var(--surface-200)';
                    b.style.color = 'var(--text-primary)';
                });
                btn.classList.add('active');
                btn.style.background = 'var(--primary-600)';
                btn.style.color = '#fff';

                // Filter cards
                const filter = btn.getAttribute('data-filter');
                cards.forEach(card => {
                    if(filter === 'all' || card.getAttribute('data-tingkat') === filter) {
                        card.style.display = 'flex';
                        // Small animation
                        card.style.opacity = '0';
                        setTimeout(() => card.style.opacity = '1', 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
