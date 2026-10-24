
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wedding Invitation | Awali Kisah Cinta</title>

    <meta name="description"
          content="Kelola undangan pernikahan digital dengan desain elegan, modern, dan mudah dibagikan kepada orang-orang tersayang.">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Great+Vibes&family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboardlogin.css') }}">

</head>

<body>

{{-- ==========================================
     NAVBAR
========================================== --}}
<nav class="navbar navbar-expand-lg wd-navbar">
    <div class="container">

        <a class="wd-brand" href="{{ route('dashboardlogin') }}">
            <span class="wd-brand-icon">
                <i class="bi bi-heart-fill"></i>
            </span>

            <span>
                <span class="wd-brand-name">Wedding</span>
                <span class="wd-brand-sub">Invitation Website</span>
            </span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">

                {{-- Link Dashboard publik --}}
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboardlogin') }}">
                        <i class="bi bi-house-heart me-1"></i>
                        Dashboard
                    </a>
                </li>

                {{-- Link Tentang Saya --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">
                        <i class="bi bi-person-heart me-1"></i>
                        Tentang Saya
                    </a>
                </li>

                {{-- Hanya satu tombol akun di navbar --}}
                <li class="nav-item">
                    @auth
                        <a class="wd-login-btn" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i>
                            Dashboard Admin
                        </a>
                    @else
                        <a class="wd-login-btn" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login Admin
                        </a>
                    @endauth
                </li>

            </ul>
        </div>
    </div>
</nav>

{{-- ==========================================
     HERO
========================================== --}}
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-4">

            {{-- Hero content --}}
            <div class="col-lg-6">
                <div class="hero-content">

                    <p class="hero-eyebrow">
                        The Beginning of Forever
                    </p>

                    <h1 class="hero-title">
                        Awali Kisah Cinta,
                        <span class="highlight">
                            dengan Undangan Istimewa
                        </span>
                    </h1>

                    <p class="hero-description">
                        Jadikan hari bahagiamu semakin berkesan dengan
                        undangan pernikahan digital yang elegan, praktis,
                        dan mudah dibagikan kepada keluarga serta orang-orang
                        tersayang.
                    </p>

                    <div class="hero-actions">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary-wd">
                                <i class="bi bi-speedometer2"></i>
                                Buka Dashboard Admin
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-primary-wd">
                                <i class="bi bi-envelope-heart"></i>
                                Mulai Kelola Undangan
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endauth

                        <a href="{{ route('tentang') }}"
                           class="btn-secondary-wd">
                            <i class="bi bi-info-circle"></i>
                            Tentang Saya
                        </a>
                    </div>

                    <div class="hero-note">
                        <i class="bi bi-heart-fill"></i>
                        <span>
                            Satu tautan untuk membagikan momen paling istimewa.
                        </span>
                    </div>

                </div>
            </div>

            {{-- Preview desain undangan --}}
            <div class="col-lg-6">
                <div class="hero-visual">

                    <div class="visual-halo"></div>

                    <span class="flower-decoration flower-one"
                          aria-hidden="true">
                        ❀
                    </span>

                    <span class="flower-decoration flower-two"
                          aria-hidden="true">
                        ❀
                    </span>

                    <span class="flower-decoration flower-three"
                          aria-hidden="true">
                        ✧
                    </span>

                    <div class="preview-card">

                        <div class="preview-top-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>

                        <p class="preview-eyebrow">
                            Together With Their Families
                        </p>

                        <h2 class="preview-title">
                            The Wedding Of
                        </h2>

                        <div class="preview-names">
                            Nama Pria
                            <span class="preview-ampersand">&amp;</span>
                            Nama Wanita
                        </div>

                        <div class="preview-line"></div>

                        <p class="preview-description">
                            Dengan penuh kebahagiaan,
                            kami mengundang Anda untuk
                            berbagi momen istimewa bersama kami.
                        </p>

                        <div class="preview-date">
                            SAVE THE DATE
                        </div>

                    </div>

                    <div class="floating-note">
                        <div class="floating-note-icon">
                            <i class="bi bi-phone"></i>
                        </div>

                        <div>
                            <strong>Digital Invitation</strong>
                            <span>Praktis dan elegan</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- ==========================================
     KEUNGGULAN
========================================== --}}
<section class="section features-section" id="keunggulan">
    <div class="container">

        <div class="section-heading">
            <p class="section-eyebrow">
                Made With Love
            </p>

            <h2 class="section-title">
                Keunggulan Undangan Digital
            </h2>

            <div class="section-ornament">❦</div>

            <p class="section-subtitle">
                Cara yang lebih modern untuk membagikan kabar bahagia
                dan mengundang orang-orang terkasih ke hari istimewamu.
            </p>
        </div>

        <div class="row g-4">

            {{-- Fitur 1 --}}
            <div class="col-md-4">
                <div class="feature-card">
                    <span class="feature-number">01</span>

                    <div class="feature-icon">
                        <i class="bi bi-flower1"></i>
                    </div>

                    <h3 class="feature-title">
                        Desain Elegan
                    </h3>

                    <p class="feature-description">
                        Tampilan bernuansa lembut, elegan, dan romantis
                        untuk menyambut hari istimewa bersama pasangan.
                    </p>
                </div>
            </div>

            {{-- Fitur 2 --}}
            <div class="col-md-4">
                <div class="feature-card">
                    <span class="feature-number">02</span>

                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h3 class="feature-title">
                        Mudah Dibagikan
                    </h3>

                    <p class="feature-description">
                        Bagikan tautan undangan melalui WhatsApp,
                        media sosial, atau aplikasi pesan lainnya.
                    </p>
                </div>
            </div>

            {{-- Fitur 3 --}}
            <div class="col-md-4">
                <div class="feature-card">
                    <span class="feature-number">03</span>

                    <div class="feature-icon">
                        <i class="bi bi-calendar-heart"></i>
                    </div>

                    <h3 class="feature-title">
                        Informasi Lengkap
                    </h3>

                    <p class="feature-description">
                        Tampilkan informasi mempelai, jadwal acara,
                        alamat lokasi, Google Maps, dan cerita pasangan
                        dalam satu halaman.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ==========================================
     CARA KERJA
========================================== --}}
<section class="section steps-section">
    <div class="container">

        <div class="section-heading">
            <p class="section-eyebrow">
                Simple & Meaningful
            </p>

            <h2 class="section-title">
                Sederhana dalam Tiga Langkah
            </h2>

            <div class="section-ornament">♡</div>

            <p class="section-subtitle">
                Informasi tersusun rapi agar perjalanan membuat
                undangan pernikahan digital terasa lebih praktis.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">1</div>

                    <h3 class="step-title">
                        Masuk ke Admin
                    </h3>

                    <p class="step-description">
                        Login untuk masuk ke halaman pengelolaan
                        undangan pernikahan.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">2</div>

                    <h3 class="step-title">
                        Isi Data Undangan
                    </h3>

                    <p class="step-description">
                        Lengkapi nama mempelai, foto, jadwal acara,
                        lokasi, dan cerita perjalanan cinta.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">3</div>

                    <h3 class="step-title">
                        Bagikan Undangan
                    </h3>

                    <p class="step-description">
                        Setelah diterbitkan, tautan undangan bisa
                        dibagikan kepada tamu yang diundang.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ==========================================
     CTA LOGIN
========================================== --}}
<section class="cta-section">
    <div class="container">

        <div class="cta-card">
            <div class="cta-content">

                <div class="cta-icon">
                    <i class="bi bi-envelope-heart"></i>
                </div>

                <p class="section-eyebrow">
                    Your Beautiful Beginning
                </p>

                <h2 class="cta-title">
                    Siapkan Undangan Hari Bahagiamu
                </h2>

                <div class="section-ornament">❦</div>

                <p class="cta-description">
                    Mulai kelola detail undangan pernikahanmu melalui
                    halaman admin. Hadirkan informasi acara yang rapi
                    dan mudah diakses oleh tamu undangan.
                </p>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary-wd">
                        <i class="bi bi-speedometer2"></i>
                        Buka Dashboard Admin
                        <i class="bi bi-arrow-right"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary-wd">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk ke Dashboard Admin
                        <i class="bi bi-arrow-right"></i>
                    </a>
                @endauth

            </div>
        </div>

    </div>
</section>

{{-- ==========================================
     FOOTER
========================================== --}}
<footer class="wd-footer">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="footer-brand">
                    Wedding Invitation
                </div>

                <p class="footer-description">
                    Mengabadikan cinta dalam setiap undangan.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="footer-links">
                    <a href="{{ route('dashboardlogin') }}">
                        Dashboard
                    </a>

                    <a href="{{ route('tentang') }}">
                        Tentang Saya
                    </a>

                    <a href="{{ route('login') }}">
                        Login Admin
                    </a>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Wedding Invitation.
            Dibuat dengan <i class="bi bi-heart-fill"></i> untuk hari istimewa.
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
