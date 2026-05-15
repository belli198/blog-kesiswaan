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
        <div class="tabs fade-up" style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;justify-content:center;border:none">
            <button class="tab-btn active" data-tab="tab-puisi" style="padding:10px 24px;border-radius:50px;border:1px solid var(--primary-900);background:var(--primary-900);color:#fff;font-weight:600;font-size:0.9rem">Puisi</button>
            <button class="tab-btn" data-tab="tab-cerpen" style="padding:10px 24px;border-radius:50px;border:1px solid var(--surface-200);background:#fff;color:var(--text-secondary);font-weight:600;font-size:0.9rem">Cerpen</button>
            <button class="tab-btn" data-tab="tab-artikel" style="padding:10px 24px;border-radius:50px;border:1px solid var(--surface-200);background:#fff;color:var(--text-secondary);font-weight:600;font-size:0.9rem">Artikel Opini</button>
            <button class="tab-btn" data-tab="tab-visual" style="padding:10px 24px;border-radius:50px;border:1px solid var(--surface-200);background:#fff;color:var(--text-secondary);font-weight:600;font-size:0.9rem">Karya Visual</button>
        </div>

        {{-- PUISI TAB --}}
        <div id="tab-puisi" class="tab-content active fade-up">
            <div class="grid-2">
                <div class="card karya-card" style="padding:30px">
                    <div class="card-body" style="padding:0">
                        <span class="badge badge-gray" style="margin-bottom:12px">✍️ Puisi</span>
                        <h3 style="font-size:1.25rem;margin-bottom:15px;color:var(--primary-900)">Seragam Abu-Abu</h3>
                        <div class="author" style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
                            <div style="width:40px;height:40px;background:var(--primary-100);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--primary-700);font-weight:700">A</div>
                            <div style="font-size:0.9rem;color:var(--text-secondary)">
                                <strong style="color:var(--text-primary);display:block">Aisyah Maharani</strong>
                                <span>XI AKL 2</span>
                            </div>
                        </div>
                        <blockquote style="font-size:1.05rem;line-height:1.8;color:var(--text-secondary);font-style:italic;border-left:4px solid var(--primary-300);padding-left:20px;margin:0 0 20px 0;background:var(--surface-50);padding:20px;border-radius:0 12px 12px 0">
                            Di ufuk timur sang surya menyapa<br>
                            Langkah kaki mantap menjejak asa<br>
                            Berbalut seragam putih abu-abu<br>
                            Membawa mimpi di dalam kalbu<br><br>
                            Buku dan pena menjadi teman setia<br>
                            Mengukir ilmu untuk masa jaya<br>
                            ...
                        </blockquote>
                        <a href="#" class="read-more" style="margin-bottom:0">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
                <div class="card karya-card" style="padding:30px">
                    <div class="card-body" style="padding:0">
                        <span class="badge badge-gray" style="margin-bottom:12px">✍️ Puisi</span>
                        <h3 style="font-size:1.25rem;margin-bottom:15px;color:var(--primary-900)">Terima Kasih, Guru</h3>
                        <div class="author" style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
                            <div style="width:40px;height:40px;background:var(--accent-light);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#78350F;font-weight:700">D</div>
                            <div style="font-size:0.9rem;color:var(--text-secondary)">
                                <strong style="color:var(--text-primary);display:block">Dimas Putra</strong>
                                <span>X TKJ 1</span>
                            </div>
                        </div>
                        <blockquote style="font-size:1.05rem;line-height:1.8;color:var(--text-secondary);font-style:italic;border-left:4px solid var(--accent);padding-left:20px;margin:0 0 20px 0;background:var(--surface-50);padding:20px;border-radius:0 12px 12px 0">
                            Bukan sekadar kata-kata yang kau beri<br>
                            Namun cahaya di tengah gelap gulita<br>
                            Tanganmu menuntun dengan sabar<br>
                            Meski terkadang kami sukar mendengar<br><br>
                            Pahlawan tanpa tanda jasa<br>
                            ...
                        </blockquote>
                        <a href="#" class="read-more" style="margin-bottom:0">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- CERPEN TAB --}}
        <div id="tab-cerpen" class="tab-content fade-up">
            <div class="grid-2">
                <div class="card karya-card" style="padding:30px">
                    <div class="card-body" style="padding:0">
                        <span class="badge badge-gray" style="margin-bottom:12px">📖 Cerpen</span>
                        <h3 style="font-size:1.25rem;margin-bottom:15px;color:var(--primary-900)">Sepatu Lama Budi</h3>
                        <div class="author" style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
                            <div style="width:40px;height:40px;background:var(--surface-200);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--text-primary);font-weight:700">R</div>
                            <div style="font-size:0.9rem;color:var(--text-secondary)">
                                <strong style="color:var(--text-primary);display:block">Rani Safitri</strong>
                                <span>XII RPL 2</span>
                            </div>
                        </div>
                        <div style="font-size:1.05rem;line-height:1.8;color:var(--text-secondary);margin-bottom:20px">
                            <p style="margin-bottom:10px">Budi menatap sepatu hitamnya yang mulai memudar warnanya. Di ujung kanannya, sebuah lubang kecil seolah tersenyum mengejeknya. Besok adalah hari pendaftaran ulang untuk ujian sertifikasi keahlian, dan syaratnya harus mengenakan pakaian serta sepatu yang rapi.</p>
                            <p style="margin:0">"Bapak belum gajian, Nak. Sabar ya, pakai yang itu dulu saja," kata bapaknya semalam, suaranya parau menahan rasa bersalah...</p>
                        </div>
                        <a href="#" class="read-more" style="margin-bottom:0">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ARTIKEL OPINI TAB --}}
        <div id="tab-artikel" class="tab-content fade-up">
            <div class="grid-2">
                <div class="card karya-card" style="padding:30px">
                    <div class="card-body" style="padding:0">
                        <span class="badge badge-gray" style="margin-bottom:12px">📝 Artikel</span>
                        <h3 style="font-size:1.25rem;margin-bottom:15px;color:var(--primary-900)">Pentingnya Soft Skill Bagi Siswa SMK</h3>
                        <div class="author" style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
                            <div style="width:40px;height:40px;background:var(--surface-200);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--text-primary);font-weight:700">F</div>
                            <div style="font-size:0.9rem;color:var(--text-secondary)">
                                <strong style="color:var(--text-primary);display:block">Faisal Akbar</strong>
                                <span>XI TKR 1</span>
                            </div>
                        </div>
                        <p style="color:var(--text-secondary);font-size:1.05rem;line-height:1.8;margin-bottom:20px">Sebagai siswa SMK, kita dituntut untuk memiliki keterampilan teknis (hard skill) yang mumpuni agar siap terjun ke dunia industri. Namun, di era revolusi industri 4.0 saat ini, hard skill saja tidak cukup. Banyak perusahaan yang mengeluhkan lulusan SMK yang pintar secara teknis namun kurang mampu berkomunikasi dan bekerja sama dalam tim.</p>
                        <a href="#" class="read-more" style="margin-bottom:0">Baca Selengkapnya &rarr;</a>
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
