@extends('layouts.admin')

@section('title', 'Rekap RSVP')

@section('content')
<style>
    .rsvp-admin {
        --rose: #b07272;
        --blush: #f6e6e2;
        --cream: #fbf7f2;
        --gold: #b8975a;
        --gold-soft: #ecdfc4;
        --ink: #4a3f3a;
        --muted: #8c7f78;

        color: var(--ink);
        font-family: 'Poppins', sans-serif;
    }

    .rsvp-admin .page-heading {
        padding: 24px;
        border: 1px solid var(--gold-soft);
        border-radius: 18px;
        background: linear-gradient(120deg, white, var(--blush));
    }

    .rsvp-admin .page-title {
        color: var(--rose);
        font-family: 'Cormorant Garamond', serif;
        font-size: 34px;
        font-weight: 700;
    }

    .rsvp-admin .summary-card {
        height: 100%;
        padding: 20px;
        border: 1px solid var(--gold-soft);
        border-radius: 16px;
        background: white;
        box-shadow: 0 5px 20px rgba(74, 63, 58, .035);
    }

    .rsvp-admin .summary-label {
        color: var(--muted);
        font-size: 11px;
    }

    .rsvp-admin .summary-number {
        margin-top: 8px;
        color: var(--ink);
        font-family: 'Cormorant Garamond', serif;
        font-size: 34px;
        font-weight: 700;
    }

    .rsvp-admin .summary-icon {
        display: flex;
        width: 40px;
        height: 40px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: var(--blush);
        color: var(--rose);
        font-size: 18px;
    }

    .rsvp-admin .table-card {
        overflow: hidden;
        border: 1px solid var(--gold-soft);
        border-radius: 17px;
        background: white;
        box-shadow: 0 5px 20px rgba(74, 63, 58, .035);
    }

    .rsvp-admin .table-card-header {
        padding: 20px;
        border-bottom: 1px solid var(--gold-soft);
        background: #fffaf7;
    }

    .rsvp-admin .table-title {
        margin: 0;
        color: var(--rose);
        font-family: 'Cormorant Garamond', serif;
        font-size: 26px;
        font-weight: 700;
    }

    .rsvp-admin .table {
        margin: 0;
        font-size: 11px;
        vertical-align: middle;
    }

    .rsvp-admin .table thead th {
        padding: 15px;
        border-bottom: 1px solid var(--gold-soft);
        background: var(--cream);
        color: var(--muted);
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .rsvp-admin .table tbody td {
        padding: 15px;
        border-color: #f2e9e0;
        color: var(--ink);
    }

    .rsvp-admin .guest-name {
        font-weight: 600;
    }

    .rsvp-admin .guest-note {
        max-width: 250px;
        color: var(--muted);
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .rsvp-admin .status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .rsvp-admin .status-hadir {
        background: #e8f4e8;
        color: #387343;
    }

    .rsvp-admin .status-tidak {
        background: #f9e6e4;
        color: #a44747;
    }

    .rsvp-admin .status-ragu {
        background: #fff2d8;
        color: #906b26;
    }

    .rsvp-admin .pagination {
        margin: 0;
        gap: 4px;
    }

    .rsvp-admin .page-link {
        border-color: var(--gold-soft);
        color: var(--rose);
        font-size: 11px;
    }

    .rsvp-admin .active > .page-link {
        border-color: var(--rose);
        background: var(--rose);
        color: white;
    }

    .rsvp-admin .empty-state {
        padding: 45px 20px;
        color: var(--muted);
        text-align: center;
    }

    .rsvp-admin .empty-state i {
        display: block;
        margin-bottom: 12px;
        color: var(--rose);
        font-size: 38px;
    }
</style>

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
                            <td>
                                {{ $rsvps->firstItem() + $loop->index }}
                            </td>

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

                            <td>
                                {{ $rsvp->created_at->format('d/m/Y H:i') }}
                            </td>
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
