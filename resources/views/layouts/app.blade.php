<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Kesiswaan SMK Negeri 1 Adiwerna - Media informasi dan dokumentasi kegiatan kesiswaan">
    @php
        $siteName = \App\Models\Setting::where('key', 'site_name')->first()?->value ?? 'SMK Negeri 1 Adiwerna';
    @endphp
    <title>@yield('title') - {{ $siteName }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>
    {{-- NAVBAR --}}
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="{{ route('beranda') }}" class="navbar-brand">
                <div class="brand-icon">SK</div>
                <span>{{ $siteName }}</span>
            </a>

            {{-- DESKTOP NAV --}}
            <div class="nav-links" id="navLinks">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
                <a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('pengumuman') }}" class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}">Pengumuman</a>
                <a href="{{ route('ekskul') }}" class="{{ request()->routeIs('ekskul') ? 'active' : '' }}">Ekskul</a>
                <a href="{{ route('prestasi') }}" class="{{ request()->routeIs('prestasi') ? 'active' : '' }}">Prestasi</a>
                <a href="{{ route('karya') }}" class="{{ request()->routeIs('karya') ? 'active' : '' }}">Karya</a>
                <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
            </nav>

            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
    <div class="mobile-overlay"></div>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h4>🏫 {{ $siteName }}</h4>
                    <p>Blog Kesiswaan sebagai media informasi, dokumentasi, dan apresiasi kegiatan siswa {{ $siteName }}.</p>
                </div>
                <div>
                    <h4>Navigasi</h4>
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <a href="{{ route('profil') }}">Profil</a>
                    <a href="{{ route('berita.index') }}">Berita</a>
                    <a href="{{ route('pengumuman') }}">Pengumuman</a>
                </div>
                <div>
                    <h4>Lainnya</h4>
                    <a href="{{ route('ekskul') }}">Ekstrakurikuler</a>
                    <a href="{{ route('prestasi') }}">Prestasi</a>
                    <a href="{{ route('karya') }}">Karya Siswa</a>
                    <a href="{{ route('galeri') }}">Galeri</a>
                </div>
                <div>
                    <h4>Kontak</h4>
                    <a href="{{ route('kontak') }}">Hubungi Kami</a>
                    <a href="#">📍 Adiwerna, Tegal</a>
                    <a href="#">📧 info@smkn1adiwerna.sch.id</a>
                    <a href="#">📞 (0283) 123456</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Blog Kesiswaan SMK Negeri 1 Adiwerna. Dibuat dengan ❤️ oleh Tim Kesiswaan.</p>
            </div>
        </div>
    </footer>

    {{-- BACK TO TOP --}}
    <button class="back-to-top" title="Kembali ke atas">↑</button>

    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
