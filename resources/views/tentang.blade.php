@php
    $profilePhoto = app()->environment('production')
        ? 'https://cdn.jsdelivr.net/gh/Wildanzen1/wedding-wilk@main/public/uploads/images/foto-profil-wildan.jpeg'
        : asset('storage/images/foto-profil-wildan.jpeg');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Saya | Wedding Invitation</title>

    <meta name="description"
          content="Profil pengembang website Wedding Invitation.">

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
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>

<body>

{{-- =========================
     NAVBAR
========================= --}}
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
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('dashboardlogin') }}">
                        <i class="bi bi-house-heart me-1"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active"
                       href="{{ route('tentang') }}">
                        <i class="bi bi-person-heart me-1"></i>
                        Tentang Saya
                    </a>
                </li>

                <li class="nav-item">
                    <a class="wd-login-btn"
                       href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login Admin
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

{{-- =========================
     ABOUT SECTION
========================= --}}
<section class="about-hero">
    <div class="container">

        <div class="about-wrapper">

            <div class="row g-4 align-items-start">

                {{-- Foto dan identitas --}}
                <div class="col-lg-5">
                    <div class="profile-area">

                        <div class="profile-frame">
                            <img
                                src="{{ $profilePhoto }}"
                                alt="Foto Ahmad Wildan Thoatullah"
                                class="profile-photo"
                                fetchpriority="high"
                            >
                        </div>

                        <p class="profile-label">
                            <i class="bi bi-stars"></i>
                            Tentang Pengembang
                        </p>

                        <h1 class="profile-name">
                            Ahmad Wildan Thoatullah
                        </h1>

                        <p class="profile-role">
                            Mahasiswa Teknik Informatika<br>
                            Universitas Negeri Surabaya
                        </p>

                        <div class="profile-divider">❦</div>

                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="col-lg-7">

                    <p class="section-label">
                        Get To Know Me
                    </p>

                    <h2 class="section-title">
                        Halo, Salam Kenal!
                    </h2>

                    <p class="about-text">
                        Perkenalkan, saya
                        <strong>Ahmad Wildan Thoathullah</strong>,
                        mahasiswa Universitas Negeri Surabaya (UNESA),
                        Program Studi Teknik Informatika.
                    </p>

                    <p class="about-text">
                        Website <strong>Wedding Invitation</strong> ini
                        saya kembangkan sebagai bagian dari tugas
                        Ujian Tengah Semester (UTS). Project ini menjadi
                        kesempatan bagi saya untuk menerapkan ilmu
                        pemrograman web dalam membangun sebuah aplikasi
                        yang bermanfaat.
                    </p>

                    <p class="about-text">
                        Melalui project ini, saya ingin menghadirkan
                        website undangan pernikahan digital yang
                        menarik, mudah digunakan, dan dapat membantu
                        pengguna membagikan informasi acara kepada
                        keluarga serta teman.
                    </p>

                    <div class="about-highlight">
                        <div class="d-flex align-items-start gap-3">

                            <div class="about-highlight-icon">
                                <i class="bi bi-laptop"></i>
                            </div>

                            <div>
                                <div class="highlight-title">
                                    Tentang Project
                                </div>

                                <p class="highlight-text">
                                    Website undangan pernikahan digital
                                    berbasis Laravel dengan fitur
                                    pengelolaan data mempelai, foto,
                                    detail acara, dan tautan undangan publik.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            {{-- Informasi akademik --}}
            <div class="academic-section">

                <p class="section-label">
                    Academic Background
                </p>

                <h2 class="academic-title">
                    <i class="bi bi-mortarboard me-2"
                       style="color: var(--rose-dark);"></i>
                    Informasi Akademik
                </h2>

                <div class="academic-list">

                    <div class="info-item">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">
                            Ahmad Wildan Thoatullah
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">NIM</div>
                        <div class="info-value">
                            25051204244
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Universitas</div>
                        <div class="info-value">
                            Universitas Negeri Surabaya (UNESA)
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Program Studi</div>
                        <div class="info-value">
                            Teknik Informatika
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Nama Project</div>
                        <div class="info-value">
                            Website Wedding Invitation
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Tujuan Pengembangan</div>
                        <div class="info-value">
                            Tugas Ujian Tengah Semester (UTS)
                        </div>
                    </div>

                </div>

                {{-- Tombol navigasi --}}
                <div class="about-actions">

                    <a href="{{ route('dashboardlogin') }}"
                       class="btn-about btn-about-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Dashboard
                    </a>

                    <a href="{{ route('login') }}"
                       class="btn-about btn-about-primary">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login Admin
                    </a>

                </div>

            </div>

        </div>
    </div>
</section>

{{-- =========================
     FOOTER
========================= --}}
<footer class="wd-footer">
    <div class="container">

        <div class="footer-brand">
            Wedding Invitation
        </div>

        <p class="footer-text">
            &copy; {{ date('Y') }} Wedding Invitation
            <br>
            Dikembangkan oleh Ahmad Wildan Thoatullah
            dengan <i class="bi bi-heart-fill footer-heart"></i>.
        </p>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>