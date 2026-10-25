@extends('layouts.admin')

@section('title', 'Rekap RSVP')

@section('content')
<link rel="stylesheet" href="{{ asset('css/rvsp.css') }}">

<div class="rsvp-admin">

    <div class="page-heading mb-4">
        <p class="text-uppercase mb-2"
           style="color:var(--gold);font-size:10px;letter-spacing:3px;">
            Wedding Invitation
        </p>

        <h1 class="page-title mb-2">Rekap RSVP</h1>

        <p class="mb-0" style="color:var(--muted);font-size:12px;">
            Daftar konfirmasi kehadiran tamu dari seluruh undangan.
        </p>
    </div>

    {{-- Notifikasi flash jika admin diarahkan dengan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-start gap-2 mb-4"
             role="status"
             style="border:1px solid #cfe5d1;border-radius:14px;font-size:12px;">
            <i class="bi bi-check-circle-fill mt-1"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- Pemberitahuan jika sudah ada RSVP tersimpan --}}
    @if ($totalRsvp > 0)
        <div class="rsvp-notification" role="status">
            <div class="rsvp-notification-icon">
                <i class="bi bi-bell-fill"></i>
            </div>

            <div>
                <div class="rsvp-notification-title">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    Tanggapan RSVP Sudah Masuk
                </div>

                <p class="rsvp-notification-text">
                    Ada {{ $totalRsvp }} konfirmasi RSVP yang tersimpan di sistem.
                    Periksa tabel di bawah untuk melihat status kehadiran,
                    jumlah tamu, dan ucapan dari para tamu.
                </p>
            </div>
        </div>
    @endif

    {{-- Ringkasan --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-xl-4">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="summary-label">Total Konfirmasi</span>
                    <span class="summary-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </span>
                </div>
                <div class="summary-number">{{ $totalRsvp }}</div>
            </div>
        </div>

        <div class="col-6 col-xl-4">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="summary-label">Konfirmasi Hadir</span>
                    <span class="summary-icon">
                        <i class="bi bi-person-check"></i>
                    </span>
                </div>
                <div class="summary-number">{{ $hadir }}</div>
            </div>
        </div>

        <div class="col-6 col-xl-4">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="summary-label">Jumlah Orang Hadir</span>
                    <span class="summary-icon">
                        <i class="bi bi-people"></i>
                    </span>
                </div>
                <div class="summary-number">{{ $totalTamuHadir }}</div>
            </div>
        </div>

        <div class="col-6 col-xl-6">
            <div class="summary-card">
                <div class="summary-label">Tidak Dapat Hadir</div>
                <div class="summary-number">{{ $tidakHadir }}</div>
            </div>
        </div>

        <div class="col-6 col-xl-6">
            <div class="summary-card">
                <div class="summary-label">Masih Ragu</div>
                <div class="summary-number">{{ $raguRagu }}</div>
            </div>
        </div>

    </div>

    {{-- Tabel RSVP --}}
    <div class="table-card">

        <div class="table-card-header">
            <h2 class="table-title">Daftar Tanggapan Tamu</h2>
            <p class="mb-0 mt-1"
               style="color:var(--muted);font-size:11px;">
                Urut dari jawaban terbaru.
            </p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tamu</th>
                        <th>Undangan</th>
                        <th>WhatsApp</th>
                        <th>Kehadiran</th>
                        <th>Jumlah Orang</th>
                        <th>Ucapan</th>
                        <th>Waktu Jawab</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($rsvps as $rsvp)
                        <tr>
                            <td>{{ $rsvps->firstItem() + $loop->index }}</td>

                            <td class="guest-name">
                                {{ $rsvp->guest_name }}
                            </td>

                            <td>
                                @if ($rsvp->invitation)
                                    {{ $rsvp->invitation->groom_name }}
                                    &amp;
                                    {{ $rsvp->invitation->bride_name }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $rsvp->phone ?: '-' }}</td>

                            <td>
                                @if ($rsvp->attendance_status === 'hadir')
                                    <span class="status status-hadir">Hadir</span>
                                @elseif ($rsvp->attendance_status === 'tidak_hadir')
                                    <span class="status status-tidak">Tidak hadir</span>
                                @else
                                    <span class="status status-ragu">Masih ragu</span>
                                @endif
                            </td>

                            <td>{{ $rsvp->guest_count }} orang</td>

                            <td>
                                <div class="guest-note">
                                    {{ $rsvp->message ?: '-' }}
                                </div>
                            </td>

                            <td>{{ $rsvp->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="bi bi-envelope-heart"></i>
                                    <strong>Belum ada konfirmasi RSVP</strong>
                                    <p class="mt-2 mb-0">
                                        Jawaban tamu akan tampil di sini setelah dikirim.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($rsvps->hasPages())
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-3">
                <small style="color:var(--muted);">
                    Menampilkan {{ $rsvps->firstItem() }}–{{ $rsvps->lastItem() }}
                    dari {{ $rsvps->total() }} jawaban
                </small>

                {{ $rsvps->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
