@extends('layouts.app')
@section('title', 'Pengumuman')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Pengumuman</span></div>
        <h1>📢 Pengumuman</h1>
        <p>Informasi penting dan pengumuman resmi kesiswaan</p>
    </div>
</div>

<section class="section">
    <div class="container" style="max-width:850px">
        @forelse($pengumuman ?? [] as $item)
        <div class="announce-card fade-up prioritas-{{ $item->prioritas }}" style="margin-bottom:16px">
            <div class="announce-date">
                <div class="day">{{ $item->created_at->format('d') }}</div>
                <div class="month">{{ $item->created_at->format('M Y') }}</div>
            </div>
            <div class="announce-content">
                <div style="display:flex;gap:8px;margin-bottom:8px;flex-wrap:wrap">
                    <span class="badge badge-{{ $item->prioritas === 'tinggi' ? 'danger' : ($item->prioritas === 'sedang' ? 'warning' : 'primary') }}">{{ ucfirst($item->prioritas) }}</span>
                    <span class="badge badge-purple">{{ $item->kategori }}</span>
                </div>
                <h3>{{ $item->judul }}</h3>
                <div class="prose">{!! $item->konten !!}</div>
                <p style="font-size:.8rem;color:var(--text-light);margin-top:8px">Berlaku: {{ $item->tanggal_mulai->format('d M') }} — {{ $item->tanggal_selesai->format('d M Y') }}</p>
            </div>
        </div>
        @empty
        @php $demoP = [
            ['d'=>'28','m'=>'Apr 2026','pri'=>'tinggi','badge'=>'danger','kat'=>'Ujian','title'=>'Jadwal Ujian Tengah Semester Genap 2026','desc'=>'UTS Genap dilaksanakan pada tanggal 5-10 Mei 2026. Siswa wajib hadir 30 menit sebelum ujian. Bawa perlengkapan ujian lengkap. Keterlambatan tidak ditoleransi.','berlaku'=>'5 Mei — 10 Mei 2026'],
            ['d'=>'25','m'=>'Apr 2026','pri'=>'sedang','badge'=>'warning','kat'=>'Ekskul','title'=>'Pendaftaran Ekstrakurikuler Baru Semester Genap','desc'=>'Pendaftaran anggota baru ekstrakurikuler telah dibuka. Formulir tersedia di ruang kesiswaan atau bisa diunduh melalui website sekolah. Kuota terbatas!','berlaku'=>'25 Apr — 5 Mei 2026'],
            ['d'=>'20','m'=>'Apr 2026','pri'=>'rendah','badge'=>'primary','kat'=>'Libur','title'=>'Libur Hari Raya Idul Fitri 1447 H','desc'=>'Libur Hari Raya Idul Fitri dimulai tanggal 1-14 April 2026. Kegiatan belajar mengajar kembali normal pada 15 April 2026.','berlaku'=>'1 Apr — 14 Apr 2026'],
            ['d'=>'15','m'=>'Apr 2026','pri'=>'tinggi','badge'=>'danger','kat'=>'Umum','title'=>'Rapat Pleno Orang Tua Siswa Kelas X','desc'=>'Mengundang Bapak/Ibu wali murid kelas X untuk hadir dalam rapat pleno membahas program kesiswaan dan tata tertib sekolah.','berlaku'=>'20 Apr 2026'],
            ['d'=>'10','m'=>'Apr 2026','pri'=>'sedang','badge'=>'warning','kat'=>'Ekskul','title'=>'Latihan Gabungan Pramuka Penggalang','desc'=>'Seluruh anggota Pramuka Penggalang diwajibkan mengikuti latihan gabungan di lapangan sekolah. Bawa perlengkapan lengkap.','berlaku'=>'12 Apr 2026'],
        ]; @endphp
        @foreach($demoP as $p)
        <div class="announce-card fade-up" style="margin-bottom:16px;border-left-color:{{ $p['pri']==='tinggi'?'var(--danger)':($p['pri']==='sedang'?'var(--warning)':'var(--primary-500)') }}">
            <div class="announce-date">
                <div class="day">{{ $p['d'] }}</div>
                <div class="month">{{ $p['m'] }}</div>
            </div>
            <div class="announce-content">
                <div style="display:flex;gap:8px;margin-bottom:8px">
                    <span class="badge badge-{{ $p['badge'] }}">{{ ucfirst($p['pri']) }}</span>
                    <span class="badge badge-purple">{{ $p['kat'] }}</span>
                </div>
                <h3>{{ $p['title'] }}</h3>
                <p>{{ $p['desc'] }}</p>
                <p style="font-size:.8rem;color:var(--text-light);margin-top:8px">Berlaku: {{ $p['berlaku'] }}</p>
            </div>
        </div>
        @endforeach
        @endforelse

        @if(isset($pengumuman) && $pengumuman->hasPages())
        <div class="pagination-wrapper">{{ $pengumuman->links() }}</div>
        @endif
    </div>
</section>
@endsection
