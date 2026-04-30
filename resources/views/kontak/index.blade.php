@extends('layouts.app')
@section('title', 'Kontak & Tentang')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('beranda') }}">Beranda</a> <span>/</span> <span>Kontak</span></div>
        <h1>Hubungi Kami</h1>
        <p>Ada pertanyaan, masukan, atau informasi yang ingin disampaikan? Kami siap membantu!</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="grid-2 fade-up" style="gap:50px">
            {{-- INFORMASI KONTAK & TENTANG --}}
            <div>
                <h2 style="margin-bottom:20px">Tentang Blog Kesiswaan</h2>
                <p style="color:var(--text-secondary);margin-bottom:15px;line-height:1.8">Blog ini dikelola secara resmi oleh pengurus OSIS dan Tim Jurnalistik SMK Negeri 1 Adiwerna. Tujuan utama pembuatan blog ini adalah untuk memberikan transparansi informasi terkait program kesiswaan, mendokumentasikan setiap momen penting di sekolah, serta menyediakan ruang pameran maya bagi karya dan prestasi siswa.</p>
                <p style="color:var(--text-secondary);margin-bottom:30px;line-height:1.8">Tim redaksi kami terdiri dari perwakilan siswa dari berbagai jurusan yang memiliki minat di bidang penulisan, fotografi, dan desain web.</p>
                
                <h3 style="margin-bottom:20px">Informasi Kontak</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="icon-box">📍</div>
                        <div>
                            <h4 style="font-size:1rem;margin-bottom:5px">Alamat Sekolah</h4>
                            <p style="color:var(--text-secondary);font-size:0.9rem">Jl. Raya Ujungrusi Purbasana,<br>Kec. Adiwerna, Kab. Tegal,<br>Jawa Tengah 52194</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="icon-box">📧</div>
                        <div>
                            <h4 style="font-size:1rem;margin-bottom:5px">Email</h4>
                            <p style="color:var(--text-secondary);font-size:0.9rem">osis@smkn1adiwerna.sch.id<br>info@smkn1adiwerna.sch.id</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="icon-box">📞</div>
                        <div>
                            <h4 style="font-size:1rem;margin-bottom:5px">Telepon</h4>
                            <p style="color:var(--text-secondary);font-size:0.9rem">(0283) 443768 (Ext. Kesiswaan)</p>
                        </div>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" title="Instagram">📸</a>
                    <a href="#" title="Twitter / X">🐦</a>
                    <a href="#" title="YouTube">▶️</a>
                    <a href="#" title="Facebook">📘</a>
                </div>
            </div>

            {{-- FORM KONTAK --}}
            <div>
                <div style="background:var(--surface-0);padding:40px;border-radius:var(--radius-lg);box-shadow:var(--shadow-xl);border:1px solid var(--surface-200)">
                    <h3 style="margin-bottom:10px">Kirim Pesan</h3>
                    <p style="color:var(--text-secondary);font-size:0.9rem;margin-bottom:30px">Silakan isi formulir di bawah ini untuk mengirim pesan langsung kepada tim redaksi / pengurus OSIS.</p>
                    
                    @if(session('success'))
                        <div class="form-success">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required placeholder="Contoh: Budi Santoso">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email / Kelas</label>
                            <input type="text" id="email" name="email" required placeholder="Email atau Kelas (jika siswa)">
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek / Keperluan</label>
                            <select id="subjek" name="subjek" required>
                                <option value="" disabled selected>Pilih subjek...</option>
                                <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                                <option value="Kirim Karya">Kirim Karya (Puisi/Artikel)</option>
                                <option value="Saran/Masukan">Saran & Masukan</option>
                                <option value="Kerjasama">Kerjasama / Sponsorship</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan Anda</label>
                            <textarea id="pesan" name="pesan" required placeholder="Tuliskan pesan Anda dengan jelas di sini..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px">Kirim Pesan 🚀</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MAPS --}}
<section style="height:450px;background:var(--surface-200);overflow:hidden">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19886.192690658834!2d109.12771673305068!3d-6.931382716523688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9843d4c46bb%3A0x4e4da198ee7fbdb7!2sSmk%20N%201%20Adiwerna!5e0!3m2!1sid!2sid!4v1714485500000!5m2!1sid!2sid" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>
@endsection
