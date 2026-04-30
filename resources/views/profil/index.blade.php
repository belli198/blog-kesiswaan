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
                    <img src="{{ asset('storage/'.$k->foto) }}" alt="{{ $k->nama }}" class="org-photo" style="object-fit:cover">
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
                    <img src="{{ asset('storage/'.$o->foto) }}" alt="{{ $o->nama }}" class="org-photo" style="object-fit:cover">
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
@endsection
