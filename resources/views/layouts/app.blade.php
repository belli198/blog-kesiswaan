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
    <link rel="icon" href="{{ asset('images/logo-smk.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo-smk.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    @yield('styles')
</head>
<body>
    {{-- NAVBAR --}}
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="{{ route('beranda') }}" class="navbar-brand">
                <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK Negeri 1 Adiwerna" class="brand-logo">
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
            </div>

            <div style="display:flex;align-items:center;gap:15px;">
                <button id="theme-toggle" aria-label="Toggle Dark Mode" style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);color:#fff;border-radius:50%;width:38px;height:38px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:var(--transition);">
                    <span class="icon-sun" style="display:none;font-size:1.1rem;">☀️</span>
                    <span class="icon-moon" style="font-size:1.1rem;">🌙</span>
                </button>
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
    <div class="mobile-overlay"></div>
    <div class="page-transition"></div>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>&copy; {{ date('Y') }} Blog Kesiswaan <strong>SMKN 1 Adiwerna</strong></div>
                <div>Made with 💖 by <a href="{{ route('profil') }}">Tim Kesiswaan</a></div>
            </div>
        </div>
    </footer>

    {{-- BACK TO TOP --}}
    <button class="back-to-top" title="Kembali ke atas">↑</button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/main.js') }}?v={{ time() }}"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
    </script>
    @yield('scripts')
</body>
</html>


