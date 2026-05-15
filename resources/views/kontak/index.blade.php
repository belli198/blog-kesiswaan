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
                <span class="badge badge-gray" style="margin-bottom:16px;display:inline-flex;align-items:center;gap:6px">👋 Sapa Kami</span>
                <h2 style="margin-bottom:20px;font-size:clamp(1.8rem, 4vw, 2.5rem);letter-spacing:-0.03em;color:var(--primary-900)">Tentang Blog Kesiswaan</h2>
                <p style="color:var(--text-secondary);margin-bottom:15px;line-height:1.8;font-size:1.05rem">Blog ini dikelola secara resmi oleh pengurus OSIS dan Tim Jurnalistik SMK Negeri 1 Adiwerna. Tujuan utama pembuatan blog ini adalah untuk memberikan transparansi informasi terkait program kesiswaan, mendokumentasikan setiap momen penting di sekolah, serta menyediakan ruang pameran maya bagi karya dan prestasi siswa.</p>
                <p style="color:var(--text-secondary);margin-bottom:40px;line-height:1.8;font-size:1.05rem">Tim redaksi kami terdiri dari perwakilan siswa dari berbagai jurusan yang memiliki minat di bidang penulisan, fotografi, dan desain web.</p>
                
                <h3 style="margin-bottom:25px;font-size:1.4rem;color:var(--primary-900)">Informasi Kontak</h3>
                <div class="contact-info" style="display:flex;flex-direction:column;gap:20px;margin-bottom:40px">
                    <div class="contact-item" style="display:flex;gap:20px;align-items:flex-start">
                        <div class="icon-box" style="width:50px;height:50px;background:var(--surface-50);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">📍</div>
                        <div>
                            <h4 style="font-size:1.1rem;margin-bottom:5px;color:var(--primary-900)">Alamat Sekolah</h4>
                            <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.6;margin:0">Jl. Raya Ujungrusi Purbasana,<br>Kec. Adiwerna, Kab. Tegal,<br>Jawa Tengah 52194</p>
                        </div>
                    </div>
                    <div class="contact-item" style="display:flex;gap:20px;align-items:flex-start">
                        <div class="icon-box" style="width:50px;height:50px;background:var(--surface-50);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">📧</div>
                        <div>
                            <h4 style="font-size:1.1rem;margin-bottom:5px;color:var(--primary-900)">Email</h4>
                            <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.6;margin:0">osis@smkn1adiwerna.sch.id<br>info@smkn1adiwerna.sch.id</p>
                        </div>
                    </div>
                    <div class="contact-item" style="display:flex;gap:20px;align-items:flex-start">
                        <div class="icon-box" style="width:50px;height:50px;background:var(--surface-50);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">📞</div>
                        <div>
                            <h4 style="font-size:1.1rem;margin-bottom:5px;color:var(--primary-900)">Telepon</h4>
                            <p style="color:var(--text-secondary);font-size:0.95rem;line-height:1.6;margin:0">(0283) 443768 (Ext. Kesiswaan)</p>
                        </div>
                    </div>
                </div>

                <div class="social-links" style="display:flex;gap:15px">
                    <a href="#" title="Instagram" style="width:45px;height:45px;border-radius:50%;background:var(--surface-50);display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.2rem;transition:all 0.3s ease;border:1px solid var(--surface-100)">📸</a>
                    <a href="#" title="Twitter / X" style="width:45px;height:45px;border-radius:50%;background:var(--surface-50);display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.2rem;transition:all 0.3s ease;border:1px solid var(--surface-100)">🐦</a>
                    <a href="#" title="YouTube" style="width:45px;height:45px;border-radius:50%;background:var(--surface-50);display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.2rem;transition:all 0.3s ease;border:1px solid var(--surface-100)">▶️</a>
                    <a href="#" title="Facebook" style="width:45px;height:45px;border-radius:50%;background:var(--surface-50);display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.2rem;transition:all 0.3s ease;border:1px solid var(--surface-100)">📘</a>
                </div>
            </div>

            {{-- FORM KONTAK --}}
            <div>
                <div style="background:#fff;padding:50px;border-radius:30px;box-shadow:0 10px 40px rgba(0,0,0,0.04);border:1px solid var(--surface-100)">
                    <h3 style="margin-bottom:10px;font-size:1.5rem;color:var(--primary-900)">Kirim Pesan</h3>
                    <p style="color:var(--text-secondary);font-size:0.9rem;margin-bottom:30px">Silakan isi formulir di bawah ini untuk mengirim pesan langsung kepada tim redaksi / pengurus OSIS.</p>
                    
                    @if(session('success'))
                        <div class="form-success">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div style="background:#FEE2E2;border:1px solid #FECACA;color:#991B1B;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:0.9rem">
                            ⚠️ {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf
                        <div class="form-group" style="margin-bottom:20px">
                            <label for="nama" style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--primary-900)">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required placeholder="Contoh: Budi Santoso" value="{{ old('nama') }}" style="width:100%;padding:14px;border:1px solid var(--surface-200);border-radius:12px;background:var(--surface-50);font-family:inherit;font-size:0.95rem;outline:none;transition:border 0.3s">
                        </div>
                        <div class="form-group" style="margin-bottom:20px">
                            <label for="email" style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--primary-900)">Alamat Email <span style="color:var(--text-secondary);font-weight:400;font-size:0.8rem">(opsional)</span></label>
                            <input type="email" id="email" name="email" placeholder="Contoh: budi@gmail.com" value="{{ old('email') }}" style="width:100%;padding:14px;border:1px solid var(--surface-200);border-radius:12px;background:var(--surface-50);font-family:inherit;font-size:0.95rem;outline:none;transition:border 0.3s">
                        </div>
                        <div class="form-group" style="margin-bottom:20px">
                            <label for="kelas" style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--primary-900)">Kelas <span style="color:var(--text-secondary);font-weight:400;font-size:0.8rem">(opsional)</span></label>
                            <input type="text" id="kelas" name="kelas" placeholder="Contoh: XI RPL 1" value="{{ old('kelas') }}" style="width:100%;padding:14px;border:1px solid var(--surface-200);border-radius:12px;background:var(--surface-50);font-family:inherit;font-size:0.95rem;outline:none;transition:border 0.3s">
                        </div>
                        <p style="color:var(--text-secondary);font-size:0.8rem;margin:-10px 0 15px;font-style:italic">* Isi salah satu: Email atau Kelas</p>
                        <div class="form-group" style="margin-bottom:20px">
                            <label for="subjek" style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--primary-900)">Subjek / Keperluan</label>
                            <select id="subjek" name="subjek" required style="width:100%;padding:14px;border:1px solid var(--surface-200);border-radius:12px;background:var(--surface-50);font-family:inherit;font-size:0.95rem;outline:none;transition:border 0.3s;appearance:none">
                                <option value="" disabled selected>Pilih subjek...</option>
                                <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                                <option value="Kirim Karya">Kirim Karya (Puisi/Artikel)</option>
                                <option value="Saran/Masukan">Saran & Masukan</option>
                                <option value="Kerjasama">Kerjasama / Sponsorship</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom:30px">
                            <label for="pesan" style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--primary-900)">Pesan Anda</label>
                            <textarea id="pesan" name="pesan" required placeholder="Tuliskan pesan Anda dengan jelas di sini..." style="width:100%;padding:14px;border:1px solid var(--surface-200);border-radius:12px;background:var(--surface-50);font-family:inherit;font-size:0.95rem;outline:none;transition:border 0.3s;min-height:150px;resize:vertical"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;padding:16px;font-size:1.05rem;border-radius:50px;justify-content:center;font-weight:700">Kirim Pesan &rarr;</button>
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
