@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="container-fluid px-0 wd-dashboard">

    {{-- Hero --}}
    <div class="wd-hero mb-4">
        <div class="script">Wedding Invitation</div>
        <h2>Dashboard Admin</h2>
        <div class="wd-divider"><i class="bi bi-heart-fill"></i></div>
        <p>Selamat datang di panel admin Wedding Invitation.</p>
    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="wd-stat" style="--accent: #c98b8b;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="label">Total Undangan</div>
                        <div class="value">{{ $totalUndangan }}</div>
                    </div>
                    <div class="icon"><i class="bi bi-envelope-heart"></i></div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.invitations.index') }}">
                        Lihat semua undangan →
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="wd-stat" style="--accent: #7f9a84;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="label">Undangan Terbit</div>
                        <div class="value">{{ $undanganTerbit }}</div>
                    </div>
                    <div class="icon"><i class="bi bi-patch-check"></i></div>
                </div>
                <p class="note mb-0">Siap dibagikan kepada tamu.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="wd-stat" style="--accent: #b8975a;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="label">Undangan Draft</div>
                        <div class="value">{{ $undanganDraft }}</div>
                    </div>
                    <div class="icon"><i class="bi bi-feather"></i></div>
                </div>
                <p class="note mb-0">Belum diterbitkan.</p>
            </div>
        </div>

    </div>

    {{-- Undangan terbaru --}}
    <div class="wd-panel">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
            <div>
                <h5>Undangan Terbaru</h5>
                <div class="sub">Lima undangan terakhir yang dibuat.</div>
            </div>

            <a href="{{ route('admin.invitations.create') }}" class="wd-btn wd-btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Undangan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table wd-table align-middle">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Pasangan</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($undanganTerbaru as $invitation)
                        <tr>
                            <td>
                                @if ($invitation->cover_photo)
                                    <img
                                        src="{{ asset('storage/' . $invitation->cover_photo) }}"
                                        alt="Foto cover"
                                        class="wd-photo">
                                @else
                                    <div class="wd-photo-empty">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <span class="wd-couple">
                                    {{ $invitation->groom_name }}
                                    <span class="amp">&</span>
                                    {{ $invitation->bride_name }}
                                </span>
                            </td>

                            <td>
                                <code class="wd-slug">{{ $invitation->slug }}</code>
                            </td>

                            <td>
                                @if ($invitation->is_published)
                                    <span class="wd-badge published">
                                        <i class="bi bi-check2-circle me-1"></i>Terbit
                                    </span>
                                @else
                                    <span class="wd-badge draft">
                                        <i class="bi bi-pencil me-1"></i>Draft
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.invitations.show', $invitation) }}"
                                   class="wd-btn wd-btn-outline wd-btn-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center wd-empty">
                                <span class="heart"><i class="bi bi-suit-heart"></i></span>
                                Belum ada undangan.
                                Silakan buat undangan pertama.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('admin.invitations.index') }}" class="wd-btn wd-btn-outline wd-btn-sm">
                Lihat Semua Undangan
            </a>
        </div>

    </div>

</div>
@endsection