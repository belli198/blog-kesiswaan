@extends('layouts.app')
@section('title', 'Karya Siswa')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Karya</span></div>
        <h1>🎨 Karya Siswa</h1>
        <p>Ruang apresiasi untuk karya kreatif siswa SMK Negeri 1 Adiwerna</p>
    </div>
</div>

<section class="section">
    <div class="container tabs-wrapper">
        <div class="tabs fade-up" style="justify-content:center;margin-bottom:40px">
            <button class="tab-btn active" data-tab="tab-puisi">Puisi</button>
            <button class="tab-btn" data-tab="tab-cerpen">Cerpen</button>
            <button class="tab-btn" data-tab="tab-artikel">Artikel Opini</button>
            <button class="tab-btn" data-tab="tab-visual">Karya Visual</button>
        </div>

        {{-- PUISI TAB --}}
        <div id="tab-puisi" class="tab-content active fade-up">
            <div class="grid-2">
                <div class="card karya-card">
                    <div class="card-body">
                        <h3>Seragam Abu-Abu</h3>
                        <div class="author">
                            <div style="width:30px;height:30px;background:var(--primary-200);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--primary-700)">A</div>
                            <span>Oleh: <strong>Aisyah Maharani</strong> (XI AKL 2)</span>
                        </div>
                        <hr style="border:0;border-top:1px solid var(--surface-200);margin:15px 0">
                        <blockquote>
                            Di ufuk timur sang surya menyapa<br>
                            Langkah kaki mantap menjejak asa<br>
                            Berbalut seragam putih abu-abu<br>
                            Membawa mimpi di dalam kalbu<br><br>
                            Buku dan pena menjadi teman setia<br>
                            Mengukir ilmu untuk masa jaya<br>
                            ...
                        </blockquote>
                        <a href="#" style="font-size:0.85rem;color:var(--primary-500);font-weight:600;display:inline-block;margin-top:15px">Baca Selengkapnya →</a>
                    </div>
                </div>
                <div class="card karya-card">
                    <div class="card-body">
                        <h3>Terima Kasih, Guru</h3>
                        <div class="author">
                            <div style="width:30px;height:30px;background:var(--accent-light);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#78350F">D</div>
                            <span>Oleh: <strong>Dimas Putra</strong> (X TKJ 1)</span>
                        </div>
                        <hr style="border:0;border-top:1px solid var(--surface-200);margin:15px 0">
                        <blockquote>
                            Bukan sekadar kata-kata yang kau beri<br>
                            Namun cahaya di tengah gelap gulita<br>
                            Tanganmu menuntun dengan sabar<br>
                            Meski terkadang kami sukar mendengar<br><br>
                            Pahlawan tanpa tanda jasa<br>
                            ...
                        </blockquote>
                        <a href="#" style="font-size:0.85rem;color:var(--primary-500);font-weight:600;display:inline-block;margin-top:15px">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- CERPEN TAB --}}
        <div id="tab-cerpen" class="tab-content fade-up">
            <div class="grid-2">
                <div class="card karya-card">
                    <div class="card-body">
                        <h3>Sepatu Lama Budi</h3>
                        <div class="author">
                            <div style="width:30px;height:30px;background:var(--surface-200);border-radius:50%;display:flex;align-items:center;justify-content:center">R</div>
                            <span>Oleh: <strong>Rani Safitri</strong> (XII RPL 2)</span>
                        </div>
                        <hr style="border:0;border-top:1px solid var(--surface-200);margin:15px 0">
                        <p style="color:var(--text-secondary);font-size:0.95rem">Budi menatap sepatu hitamnya yang mulai memudar warnanya. Di ujung kanannya, sebuah lubang kecil seolah tersenyum mengejeknya. Besok adalah hari pendaftaran ulang untuk ujian sertifikasi keahlian, dan syaratnya harus mengenakan pakaian serta sepatu yang rapi.</p>
                        <p style="color:var(--text-secondary);font-size:0.95rem;margin-top:10px">"Bapak belum gajian, Nak. Sabar ya, pakai yang itu dulu saja," kata bapaknya semalam, suaranya parau menahan rasa bersalah...</p>
                        <a href="#" style="font-size:0.85rem;color:var(--primary-500);font-weight:600;display:inline-block;margin-top:15px">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ARTIKEL OPINI TAB --}}
        <div id="tab-artikel" class="tab-content fade-up">
            <div class="grid-2">
                <div class="card karya-card">
                    <div class="card-body">
                        <h3>Pentingnya Soft Skill Bagi Siswa SMK</h3>
                        <div class="author">
                            <div style="width:30px;height:30px;background:var(--surface-200);border-radius:50%;display:flex;align-items:center;justify-content:center">F</div>
                            <span>Oleh: <strong>Faisal Akbar</strong> (XI TKR 1)</span>
                        </div>
                        <hr style="border:0;border-top:1px solid var(--surface-200);margin:15px 0">
                        <p style="color:var(--text-secondary);font-size:0.95rem">Sebagai siswa SMK, kita dituntut untuk memiliki keterampilan teknis (hard skill) yang mumpuni agar siap terjun ke dunia industri. Namun, di era revolusi industri 4.0 saat ini, hard skill saja tidak cukup. Banyak perusahaan yang mengeluhkan lulusan SMK yang pintar secara teknis namun kurang mampu berkomunikasi dan bekerja sama dalam tim.</p>
                        <a href="#" style="font-size:0.85rem;color:var(--primary-500);font-weight:600;display:inline-block;margin-top:15px">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- KARYA VISUAL TAB --}}
        <div id="tab-visual" class="tab-content fade-up">
            <div class="grid-3">
                <div class="card">
                    <img src="https://placehold.co/400x300/2563EB/white?text=Poster+Kesehatan" alt="Poster" class="card-img">
                    <div class="card-body">
                        <h3 style="font-size:1.05rem">Poster Anti Narkoba</h3>
                        <p style="font-size:0.85rem;color:var(--text-secondary)">Desain Grafis oleh Tim Ekstrakurikuler Multimedia.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/400x300/1B3A6B/white?text=Desain+Aplikasi" alt="UI/UX" class="card-img">
                    <div class="card-body">
                        <h3 style="font-size:1.05rem">UI/UX Aplikasi Absensi</h3>
                        <p style="font-size:0.85rem;color:var(--text-secondary)">Karya Tugas Akhir siswa jurusan Rekayasa Perangkat Lunak.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/400x300/F59E0B/white?text=Lukisan" alt="Lukisan" class="card-img">
                    <div class="card-body">
                        <h3 style="font-size:1.05rem">Lukisan "Harmoni Sekolah"</h3>
                        <p style="font-size:0.85rem;color:var(--text-secondary)">Juara 1 Lomba Melukis Class Meeting 2025.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
