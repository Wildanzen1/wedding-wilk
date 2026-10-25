
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        The Wedding of {{ $invitation->groom_name }} & {{ $invitation->bride_name }}
    </title>

    <meta name="description"
          content="Undangan pernikahan {{ $invitation->groom_name }} dan {{ $invitation->bride_name }}. Kami mengundang Anda untuk berbagi kebahagiaan bersama kami.">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    {{-- CSS undangan --}}
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>

<body>

<main class="invitation">

    {{-- ================================================== --}}
    {{-- 1. COVER UTAMA --}}
    {{-- ================================================== --}}
    <section class="hero">

        @if ($invitation->cover_photo)
            <img
                src="{{ asset('storage/' . $invitation->cover_photo) }}"
                alt="Foto sampul undangan {{ $invitation->groom_name }} dan {{ $invitation->bride_name }}"
                class="hero-image"
                fetchpriority="high"
            >
        @endif

        <div class="hero-overlay"></div>
        <div class="hero-frame"></div>

        <div class="hero-content">

            <p class="hero-label">The Wedding Invitation</p>

            <p class="hero-small-title">The Wedding Of</p>

            <h1 class="hero-names">
                {{ $invitation->groom_name }}
                <span class="hero-ampersand">&amp;</span>
                {{ $invitation->bride_name }}
            </h1>

            <div class="hero-divider"></div>

            <p class="hero-description">
                Dengan penuh rasa syukur dan kebahagiaan,
                kami mengundang Anda untuk menjadi bagian dari
                hari istimewa dalam perjalanan cinta kami.
            </p>

            @if ($invitation->akad_date || $invitation->reception_date)
                <div class="hero-date">
                    <i class="bi bi-calendar-heart"></i>

                    @if ($invitation->akad_date)
                        {{ \Carbon\Carbon::parse($invitation->akad_date)->locale('id')->translatedFormat('d F Y') }}
                    @else
                        {{ \Carbon\Carbon::parse($invitation->reception_date)->locale('id')->translatedFormat('d F Y') }}
                    @endif
                </div>
            @endif

            <div class="hero-actions">
                <a href="#pembuka" class="btn-wedding" id="openInvitation">
                    <i class="bi bi-envelope-open-heart"></i>
                    Buka Undangan
                </a>
            </div>

        </div>
    </section>

    {{-- ================================================== --}}
    {{-- 2. SAMBUTAN --}}
    {{-- ================================================== --}}
    <section class="section section-soft" id="pembuka">

        <p class="eyebrow">A Special Day</p>

        <div class="bismillah">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</div>

        <h2 class="greeting-title">
            Assalamu'alaikum Wr. Wb.
        </h2>

        <div class="ornament">❦</div>

        <p class="section-text">
            Dengan memohon rahmat dan ridho Allah SWT,
            kami bermaksud menyelenggarakan pernikahan kami.
            Merupakan suatu kehormatan dan kebahagiaan bagi kami
            apabila Bapak/Ibu/Saudara/i berkenan hadir untuk
            memberikan doa restu kepada kedua mempelai.
        </p>

    </section>

    {{-- ================================================== --}}
    {{-- 3. PROFIL MEMPELAI --}}
    {{-- ================================================== --}}
    <section class="section">

        <p class="eyebrow">Two Hearts, One Love</p>

        <h2 class="section-title">Kedua Mempelai</h2>

        <div class="ornament">♡</div>

        <p class="section-description">
            Dua hati, dua cerita, dan satu perjalanan baru
            yang akan dimulai bersama dalam ikatan suci pernikahan.
        </p>

        <div class="couple-grid">

            {{-- Mempelai pria --}}
            <div class="person-card">

                <div class="person-photo-frame">
                    @if ($invitation->groom_photo)
                        <img
                            src="{{ asset('storage/' . $invitation->groom_photo) }}"
                            alt="Foto {{ $invitation->groom_name }}"
                            class="person-photo"
                            loading="lazy"
                        >
                    @else
                        <div class="person-placeholder">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                </div>

                <p class="person-role">The Groom</p>

                <h3 class="person-name">
                    {{ $invitation->groom_name }}
                </h3>

                <p class="person-description">Mempelai Pria</p>
            </div>

            {{-- Ornamen hati --}}
            <div class="couple-heart" aria-hidden="true">
                <i class="bi bi-heart-fill"></i>
            </div>

            {{-- Mempelai wanita --}}
            <div class="person-card">

                <div class="person-photo-frame">
                    @if ($invitation->bride_photo)
                        <img
                            src="{{ asset('storage/' . $invitation->bride_photo) }}"
                            alt="Foto {{ $invitation->bride_name }}"
                            class="person-photo"
                            loading="lazy"
                        >
                    @else
                        <div class="person-placeholder">
                            <i class="bi bi-person-heart"></i>
                        </div>
                    @endif
                </div>

                <p class="person-role">The Bride</p>

                <h3 class="person-name">
                    {{ $invitation->bride_name }}
                </h3>

                <p class="person-description">Mempelai Wanita</p>
            </div>

        </div>
    </section>

    {{-- ================================================== --}}
    {{-- 4. CERITA CINTA --}}
    {{-- ================================================== --}}
    @if ($invitation->story)
        <section class="section section-blush">

            <p class="eyebrow">Our Journey</p>

            <h2 class="section-title">Kisah Kami</h2>

            <div class="ornament">❦</div>

            <div class="story-box">
                <div class="story-icon">
                    <i class="bi bi-chat-heart"></i>
                </div>

                <div class="story-text">{{ $invitation->story }}</div>
            </div>

        </section>
    @endif

    {{-- ================================================== --}}
    {{-- 5. DETAIL ACARA --}}
    {{-- ================================================== --}}
    <section class="section section-soft" id="acara">

        <p class="eyebrow">Save The Date</p>

        <h2 class="section-title">Detail Acara</h2>

        <div class="ornament">❦</div>

        <p class="section-description">
            Dengan penuh kebahagiaan, kami menantikan kehadiran
            Anda untuk berbagi momen istimewa bersama kami.
        </p>

        <div class="event-grid">

            {{-- Akad nikah --}}
            <article class="event-card">

                <div class="event-card-header">
                    <div class="event-icon">
                        <i class="bi bi-heart"></i>
                    </div>

                    <h3 class="event-title">Akad Nikah</h3>

                    <p class="event-subtitle mb-0">
                        The Wedding Ceremony
                    </p>
                </div>

                <div class="event-card-body">

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-calendar-heart"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Hari, Tanggal</div>

                            <div class="event-info-value">
                                @if ($invitation->akad_date)
                                    {{ \Carbon\Carbon::parse($invitation->akad_date)->locale('id')->translatedFormat('l, d F Y') }}
                                @else
                                    <span class="empty-text">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-clock"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Waktu</div>

                            <div class="event-info-value">
                                @if ($invitation->akad_date)
                                    Pukul
                                    {{ \Carbon\Carbon::parse($invitation->akad_date)->format('H:i') }}
                                    WIB
                                @else
                                    <span class="empty-text">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Tempat</div>

                            <div class="event-info-value">
                                {{ $invitation->akad_location ?: 'Belum ditentukan' }}
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-pin-map"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Alamat</div>

                            <div class="event-info-value">
                                {{ $invitation->akad_address ?: 'Belum ditentukan' }}
                            </div>
                        </div>
                    </div>

                </div>
            </article>

            {{-- Resepsi --}}
            <article class="event-card">

                <div class="event-card-header">
                    <div class="event-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <h3 class="event-title">Resepsi</h3>

                    <p class="event-subtitle mb-0">
                        The Wedding Reception
                    </p>
                </div>

                <div class="event-card-body">

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-calendar-heart"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Hari, Tanggal</div>

                            <div class="event-info-value">
                                @if ($invitation->reception_date)
                                    {{ \Carbon\Carbon::parse($invitation->reception_date)->locale('id')->translatedFormat('l, d F Y') }}
                                @else
                                    <span class="empty-text">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-clock"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Waktu</div>

                            <div class="event-info-value">
                                @if ($invitation->reception_date)
                                    Pukul
                                    {{ \Carbon\Carbon::parse($invitation->reception_date)->format('H:i') }}
                                    WIB
                                @else
                                    <span class="empty-text">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Tempat</div>

                            <div class="event-info-value">
                                {{ $invitation->reception_location ?: 'Belum ditentukan' }}
                            </div>
                        </div>
                    </div>

                    <div class="event-info">
                        <div class="event-info-icon">
                            <i class="bi bi-pin-map"></i>
                        </div>

                        <div>
                            <div class="event-info-label">Alamat</div>

                            <div class="event-info-value">
                                {{ $invitation->reception_address ?: 'Belum ditentukan' }}
                            </div>
                        </div>
                    </div>

                </div>
            </article>

        </div>

        {{-- Google Maps --}}
        @if ($invitation->google_maps_url)
            <div class="map-action">
                <a href="{{ $invitation->google_maps_url }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn-wedding">
                    <i class="bi bi-geo-alt-fill"></i>
                    Lihat Lokasi di Google Maps
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        @endif

    </section>

    {{-- ================================================== --}}
    {{-- 6. RSVP / KONFIRMASI KEHADIRAN --}}
    {{-- ================================================== --}}
    <section class="section rsvp-section" id="rsvp">

        <p class="eyebrow">Kindly Respond</p>

        <h2 class="section-title">Konfirmasi Kehadiran</h2>

        <div class="ornament">♡</div>

        <p class="section-description">
            Kami akan sangat bahagia mengetahui kehadiran Anda.
            Silakan isi formulir berikut untuk mengonfirmasi kehadiran
            dan mengirimkan ucapan kepada kedua mempelai.
        </p>

        <div class="rsvp-card">

            @if ($errors->any())
                <div class="alert alert-danger rsvp-alert" role="alert">
                    <strong>
                        <i class="bi bi-exclamation-circle me-1"></i>
                        Periksa kembali formulir:
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rsvps.store', $invitation->slug) }}"
                  method="POST">
                @csrf

                <div class="mb-3">
                    <label for="guest_name" class="form-label">
                        Nama Lengkap
                        <span style="color:var(--rose-dark)">*</span>
                    </label>

                    <input
                        type="text"
                        id="guest_name"
                        name="guest_name"
                        class="form-control"
                        value="{{ old('guest_name') }}"
                        maxlength="150"
                        autocomplete="name"
                        placeholder="Masukkan nama Anda"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">
                        Nomor WhatsApp
                        <span class="text-muted fw-normal">(Opsional)</span>
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone') }}"
                        maxlength="30"
                        autocomplete="tel"
                        placeholder="Contoh: 081234567890"
                    >
                </div>

                <div class="mb-3">
                    <label for="attendance_status" class="form-label">
                        Konfirmasi Kehadiran
                        <span style="color:var(--rose-dark)">*</span>
                    </label>

                    <select
                        id="attendance_status"
                        name="attendance_status"
                        class="form-select"
                        required
                    >
                        <option value="">-- Pilih Kehadiran --</option>

                        <option value="hadir" @selected(old('attendance_status') === 'hadir')>
                            Saya akan hadir
                        </option>

                        <option value="tidak_hadir" @selected(old('attendance_status') === 'tidak_hadir')>
                            Maaf, saya tidak dapat hadir
                        </option>

                        <option value="ragu_ragu" @selected(old('attendance_status') === 'ragu_ragu')>
                            Masih belum pasti
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="guest_count" class="form-label">
                        Jumlah Orang yang Hadir
                        <span style="color:var(--rose-dark)">*</span>
                    </label>

                    <select
                        id="guest_count"
                        name="guest_count"
                        class="form-select"
                        required
                    >
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" @selected((int) old('guest_count', 1) === $i)>
                                {{ $i }} orang
                            </option>
                        @endfor
                    </select>

                    <small class="rsvp-hint">
                        Jika memilih tidak hadir, jumlah orang yang hadir akan dicatat sebagai nol.
                    </small>
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label">
                        Ucapan dan Doa
                        <span class="text-muted fw-normal">(Opsional)</span>
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        class="form-control"
                        rows="4"
                        maxlength="1000"
                        placeholder="Tuliskan ucapan dan doa untuk kedua mempelai..."
                    >{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="rsvp-submit">
                    <i class="bi bi-heart-fill"></i>
                    Kirim Konfirmasi
                </button>
            </form>

        </div>
    </section>

    {{-- ================================================== --}}
    {{-- 7. PENUTUP --}}
    {{-- ================================================== --}}
    <section class="closing">

        <div class="closing-icon">
            <i class="bi bi-hearts"></i>
        </div>

        <p class="eyebrow">With Love & Gratitude</p>

        <h2 class="closing-title">Merupakan Kehormatan</h2>

        <div class="ornament">❦</div>

        <p class="closing-text">
            Merupakan suatu kehormatan dan kebahagiaan bagi kami
            apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan
            doa restu kepada kami.

            Terima kasih atas doa, perhatian, dan kasih sayang
            yang diberikan kepada kami.
        </p>

        <p class="closing-text">
            Wassalamu'alaikum Wr. Wb.
        </p>

        <div class="closing-names">
            {{ $invitation->groom_name }} &amp; {{ $invitation->bride_name }}
        </div>

    </section>

    {{-- ================================================== --}}
    {{-- 8. FOOTER --}}
    {{-- ================================================== --}}
    <footer class="footer">
        <p class="footer-text">
            Made with
            <i class="bi bi-heart-fill footer-heart"></i>
            for a beautiful beginning.
        </p>
    </footer>

</main>

{{-- ================================================== --}}
{{-- TOMBOL BERANDA DAN MUSIK --}}
{{-- ================================================== --}}
<div class="page-tools" aria-label="Kontrol undangan">

    <a href="https://wedding-wilk-three.vercel.app/"
       class="page-tool"
       aria-label="Kembali ke beranda Wedding Invitation">
        <i class="bi bi-house-heart-fill"></i>
        <span>Beranda</span>
    </a>

    <button type="button"
            class="page-tool music-off"
            id="musicToggle"
            aria-label="Putar musik undangan"
            aria-pressed="false">
        <span class="music-icon-wrap">
            <i class="bi bi-music-note-beamed"></i>
        </span>
        <span id="musicLabel">Putar Musik</span>
    </button>

</div>

{{-- Sumber 1: /storage/... (Vercel: public/uploads/images, lokal: storage/app/public/images) --}}
{{-- Sumber 2: cadangan lewat jsDelivr (repo GitHub harus public) --}}
<audio id="weddingMusic" loop preload="none">
    <source src="{{ url('storage/images/music-pernikahan.mp3') }}" type="audio/mpeg">
    <source src="https://cdn.jsdelivr.net/gh/Wildanzen1/wedding-wilk@main/public/uploads/images/music-pernikahan.mp3" type="audio/mpeg">
</audio>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const music = document.getElementById('weddingMusic');
    const musicToggle = document.getElementById('musicToggle');
    const musicLabel = document.getElementById('musicLabel');
    const openInvitation = document.getElementById('openInvitation');

    function updateMusicButton(isPlaying) {
        musicToggle.classList.toggle('music-playing', isPlaying);
        musicToggle.classList.toggle('music-off', !isPlaying);
        musicToggle.setAttribute('aria-pressed', isPlaying ? 'true' : 'false');
        musicToggle.setAttribute('aria-label', isPlaying ? 'Matikan musik undangan' : 'Putar musik undangan');
        musicLabel.textContent = isPlaying ? 'Matikan Musik' : 'Putar Musik';
    }

    async function startMusic() {
        try {
            await music.play();
        } catch (error) {
            // Tanpa notif, tombol tetap dicoret
            console.error('Musik gagal diputar:', error);
            updateMusicButton(false);
        }
    }

    // Klik tombol: nyalakan / matikan
    musicToggle.addEventListener('click', function () {
        if (music.paused) {
            startMusic();
        } else {
            music.pause();
        }
    });

    // Tombol Buka Undangan juga memulai musik
    if (openInvitation) {
        openInvitation.addEventListener('click', function () {
            if (music.paused) {
                startMusic();
            }
        });
    }

    // Tombol selalu ikut status musik yang sebenarnya
    music.addEventListener('play', function () { updateMusicButton(true); });
    music.addEventListener('pause', function () { updateMusicButton(false); });
    music.addEventListener('ended', function () { updateMusicButton(false); });

    // Popup setelah RSVP berhasil dikirim
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'RSVP Berhasil Dikirim!',
            text: @json(session('success')),
            confirmButtonText: 'Terima Kasih',
            confirmButtonColor: '#b07272',
            background: '#fffaf7',
            color: '#4a3f3a',
            iconColor: '#b07272'
        }).then(function () {
            const rsvpSection = document.getElementById('rsvp');
            if (rsvpSection) {
                rsvpSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    @endif

});
</script>

</body>
</html>
