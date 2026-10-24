@extends('layouts.admin')

@section('title', 'Detail Undangan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/adminshow.css') }}">

<div class="wd-detail">

    {{-- Header --}}
    <div class="wd-heading">
        <div class="d-flex align-items-center gap-3">
            <div class="wd-heading-icon">
                <i class="bi bi-envelope-paper-heart"></i>
            </div>

            <div>
                <h1 class="wd-heading-title">Detail Undangan</h1>
                <p class="wd-heading-description">
                    Informasi lengkap dan detail acara pernikahan.
                </p>
            </div>
        </div>

        <div class="wd-heading-actions d-flex gap-2">
            <a href="{{ route('admin.invitations.index') }}"
               class="wd-btn wd-btn-back">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <a href="{{ route('admin.invitations.edit', $invitation) }}"
               class="wd-btn wd-btn-edit">
                <i class="bi bi-pencil-square"></i>
                Edit Undangan
            </a>
        </div>
    </div>

    {{-- Cover dan ringkasan pasangan --}}
    <div class="wd-card mb-4">

        <div class="wd-cover">
            @if ($invitation->cover_photo)
                <img
                    src="{{ asset('storage/' . $invitation->cover_photo) }}"
                    alt="Foto sampul undangan {{ $invitation->groom_name }} dan {{ $invitation->bride_name }}"
                >
            @else
                <div class="wd-cover-placeholder">
                    <i class="bi bi-hearts"></i>
                    <span>Foto sampul belum tersedia</span>
                </div>
            @endif
        </div>

        <div class="wd-couple-summary">
            <div>
                <span class="wd-status {{ $invitation->is_published ? 'is-published' : '' }}">
                    <i class="bi {{ $invitation->is_published ? 'bi-check-circle-fill' : 'bi-pencil-fill' }}"></i>

                    {{ $invitation->is_published ? 'Sudah Dipublikasikan' : 'Draft Undangan' }}
                </span>
            </div>

            <h2 class="wd-couple-names">
                {{ $invitation->groom_name }}
                <span class="wd-ampersand">&amp;</span>
                {{ $invitation->bride_name }}
            </h2>

            <div class="wd-public-url">
                <i class="bi bi-link-45deg me-1"></i>
                {{ url('/undangan/' . $invitation->slug) }}
            </div>

            @if ($invitation->is_published)
                <div class="mt-4">
                    <a href="{{ route('invitations.show', $invitation->slug) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="wd-btn wd-btn-public">
                        <i class="bi bi-box-arrow-up-right"></i>
                        Lihat Undangan Publik
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Foto kedua mempelai --}}
    <div class="row g-4 mb-4">

        {{-- Mempelai pria --}}
        <div class="col-md-6">
            <div class="wd-card">
                <div class="wd-card-header">
                    <div class="wd-section-icon">
                        <i class="bi bi-person-hearts"></i>
                    </div>

                    <div>
                        <h3 class="wd-section-title">Mempelai Pria</h3>
                        <span class="wd-section-subtitle">
                            The Groom
                        </span>
                    </div>
                </div>

                <div class="wd-card-body wd-person-card">
                    @if ($invitation->groom_photo)
                        <img
                            src="{{ asset('storage/' . $invitation->groom_photo) }}"
                            alt="Foto mempelai pria"
                            class="wd-person-photo"
                        >
                    @else
                        <div class="wd-person-placeholder">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif

                    <h4 class="wd-person-name">
                        {{ $invitation->groom_name }}
                    </h4>

                    <p class="wd-person-role">Mempelai Pria</p>
                    <div class="wd-person-divider"></div>
                </div>
            </div>
        </div>

        {{-- Mempelai wanita --}}
        <div class="col-md-6">
            <div class="wd-card">
                <div class="wd-card-header">
                    <div class="wd-section-icon">
                        <i class="bi bi-heart"></i>
                    </div>

                    <div>
                        <h3 class="wd-section-title">Mempelai Wanita</h3>
                        <span class="wd-section-subtitle">
                            The Bride
                        </span>
                    </div>
                </div>

                <div class="wd-card-body wd-person-card">
                    @if ($invitation->bride_photo)
                        <img
                            src="{{ asset('storage/' . $invitation->bride_photo) }}"
                            alt="Foto mempelai wanita"
                            class="wd-person-photo"
                        >
                    @else
                        <div class="wd-person-placeholder">
                            <i class="bi bi-person-heart"></i>
                        </div>
                    @endif

                    <h4 class="wd-person-name">
                        {{ $invitation->bride_name }}
                    </h4>

                    <p class="wd-person-role">Mempelai Wanita</p>
                    <div class="wd-person-divider"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Informasi acara --}}
    <div class="row g-4 mb-4">

        {{-- Akad nikah --}}
        <div class="col-md-6">
            <div class="wd-card">
                <div class="wd-card-header">
                    <div class="wd-section-icon">
                        <i class="bi bi-calendar-heart"></i>
                    </div>

                    <div>
                        <h3 class="wd-section-title">Akad Nikah</h3>
                        <span class="wd-section-subtitle">
                            Wedding Ceremony
                        </span>
                    </div>
                </div>

                <div class="wd-card-body">

                    <div class="wd-event-highlight">
                        <div class="wd-event-highlight-icon">
                            <i class="bi bi-calendar2-heart"></i>
                        </div>

                        <div>
                            <div class="wd-info-label">Tanggal dan Waktu</div>
                            <div class="wd-info-value">
                                @if ($invitation->akad_date)
                                    {{ $invitation->akad_date->locale('id')->translatedFormat('d F Y, H:i') }}
                                    WIB
                                @else
                                    <span class="wd-empty">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="wd-info-label">
                        <i class="bi bi-geo-alt me-1"></i>
                        Nama Tempat
                    </div>

                    <div class="wd-info-value">
                        {{ $invitation->akad_location ?: 'Belum ditentukan' }}
                    </div>

                    <div class="wd-info-label">
                        <i class="bi bi-pin-map me-1"></i>
                        Alamat Lengkap
                    </div>

                    <div class="wd-info-value">
                        {{ $invitation->akad_address ?: 'Belum ditentukan' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Resepsi --}}
        <div class="col-md-6">
            <div class="wd-card">
                <div class="wd-card-header">
                    <div class="wd-section-icon">
                        <i class="bi bi-calendar2-heart"></i>
                    </div>

                    <div>
                        <h3 class="wd-section-title">Resepsi Pernikahan</h3>
                        <span class="wd-section-subtitle">
                            Wedding Reception
                        </span>
                    </div>
                </div>

                <div class="wd-card-body">

                    <div class="wd-event-highlight">
                        <div class="wd-event-highlight-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>

                        <div>
                            <div class="wd-info-label">Tanggal dan Waktu</div>
                            <div class="wd-info-value">
                                @if ($invitation->reception_date)
                                    {{ $invitation->reception_date->locale('id')->translatedFormat('d F Y, H:i') }}
                                    WIB
                                @else
                                    <span class="wd-empty">Belum ditentukan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="wd-info-label">
                        <i class="bi bi-geo-alt me-1"></i>
                        Nama Tempat
                    </div>

                    <div class="wd-info-value">
                        {{ $invitation->reception_location ?: 'Belum ditentukan' }}
                    </div>

                    <div class="wd-info-label">
                        <i class="bi bi-pin-map me-1"></i>
                        Alamat Lengkap
                    </div>

                    <div class="wd-info-value">
                        {{ $invitation->reception_address ?: 'Belum ditentukan' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Google Maps --}}
    <div class="wd-card mb-4">
        <div class="wd-card-header">
            <div class="wd-section-icon">
                <i class="bi bi-geo-alt"></i>
            </div>

            <div>
                <h3 class="wd-section-title">Lokasi Acara</h3>
                <span class="wd-section-subtitle">
                    Google Maps
                </span>
            </div>
        </div>

        <div class="wd-card-body">
            @if ($invitation->google_maps_url)
                <p class="wd-info-value">
                    Tautan lokasi telah ditambahkan untuk membantu
                    tamu menemukan tempat acara.
                </p>

                <a href="{{ $invitation->google_maps_url }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="wd-btn wd-btn-maps">
                    <i class="bi bi-map"></i>
                    Buka Lokasi di Google Maps
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            @else
                <p class="wd-empty mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                    Link Google Maps belum ditambahkan.
                </p>
            @endif
        </div>
    </div>

    {{-- Cerita pasangan --}}
    <div class="wd-card mb-4">
        <div class="wd-card-header">
            <div class="wd-section-icon">
                <i class="bi bi-chat-heart"></i>
            </div>

            <div>
                <h3 class="wd-section-title">Cerita Perjalanan Cinta</h3>
                <span class="wd-section-subtitle">
                    Our Love Story
                </span>
            </div>
        </div>

        <div class="wd-card-body">
            @if ($invitation->story)
                <div class="wd-story" style="white-space: pre-line;">{{ $invitation->story }}</div>
            @else
                <p class="wd-empty mb-0">
                    <i class="bi bi-chat-square-heart me-1"></i>
                    Cerita pasangan belum ditambahkan.
                </p>
            @endif
        </div>
    </div>

    {{-- Tombol bawah --}}
    <div class="d-flex justify-content-end gap-2 flex-wrap mb-4">
        <a href="{{ route('admin.invitations.index') }}"
           class="wd-btn wd-btn-back">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Daftar
        </a>

        <a href="{{ route('admin.invitations.edit', $invitation) }}"
           class="wd-btn wd-btn-edit">
            <i class="bi bi-pencil-square"></i>
            Edit Undangan
        </a>
    </div>

</div>
@endsection