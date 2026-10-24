@extends('layouts.admin')

@section('title', 'Daftar Undangan')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/adminindex.css') }}">


<div class="container-fluid px-0 wd-dashboard">

    {{-- Hero --}}
    <div class="wd-hero mb-4">
        <div class="script">Wedding Invitation</div>
        <h2>Daftar Undangan</h2>
        <div class="wd-divider"><i class="bi bi-heart-fill"></i></div>
        <p>Kelola undangan pernikahan di sini.</p>
    </div>

    <div class="wd-panel">

        {{-- Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h5>Semua Undangan</h5>
                <div class="sub">Daftar lengkap undangan yang telah dibuat.</div>
            </div>

            <a href="{{ route('admin.invitations.create') }}" class="wd-btn wd-btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Undangan
            </a>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="wd-alert alert alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Tabel --}}
        <div class="table-responsive">
            <table class="table wd-table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Pasangan</th>
                        <th>Tanggal Akad</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Link</th>
                        <th style="min-width: 250px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($invitations as $invitation)
                    <tr>
                        {{-- Nomor --}}
                        <td>
                            <span class="wd-num">
                                {{ $invitations->firstItem() + $loop->index }}
                            </span>
                        </td>

                        {{-- Foto Cover --}}
                        <td>
                            @if ($invitation->cover_photo)
                                <img
                                    src="{{ asset('storage/' . $invitation->cover_photo) }}"
                                    alt="Cover {{ $invitation->groom_name }} dan {{ $invitation->bride_name }}"
                                    class="wd-photo"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >

                                <div class="wd-photo-empty" style="display:none;">
                                    <i class="bi bi-image"></i>
                                    No foto
                                </div>
                            @else
                                <div class="wd-photo-empty d-flex">
                                    <i class="bi bi-image"></i>
                                    No foto
                                </div>
                            @endif
                        </td>

                        {{-- Nama Pasangan --}}
                        <td>
                            <div class="wd-couple">
                                {{ $invitation->groom_name }}
                                <span class="amp">&amp;</span>
                                {{ $invitation->bride_name }}
                            </div>
                        </td>

                        {{-- Tanggal Akad --}}
                        <td>
                            @if ($invitation->akad_date)
                                <span class="wd-date">
                                    <i class="bi bi-calendar-heart"></i>{{ $invitation->akad_date->format('d/m/Y H:i') }}
                                </span>
                            @else
                                <span class="wd-muted-link">Belum diatur</span>
                            @endif
                        </td>

                        {{-- Slug --}}
                        <td>
                            <code class="wd-slug">{{ $invitation->slug }}</code>
                        </td>

                        {{-- Status --}}
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

                        {{-- Link Publik --}}
                        <td>
                            @if ($invitation->is_published)
                                <a href="{{ route('invitations.show', $invitation->slug) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="wd-btn wd-btn-sage wd-btn-sm">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>Lihat
                                </a>
                            @else
                                <span class="wd-muted-link">Belum terbit</span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('admin.invitations.show', $invitation) }}"
                                   class="wd-action detail">
                                    <i class="bi bi-eye"></i>Detail
                                </a>

                                <a href="{{ route('admin.invitations.edit', $invitation) }}"
                                   class="wd-action edit">
                                    <i class="bi bi-pencil-square"></i>Edit
                                </a>

                                <form
                                    action="{{ route('admin.invitations.destroy', $invitation) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus undangan ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="wd-action delete">
                                        <i class="bi bi-trash"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center wd-empty">
                            <span class="heart"><i class="bi bi-suit-heart"></i></span>
                            <p class="mb-3">Belum ada data undangan.</p>

                            <a href="{{ route('admin.invitations.create') }}"
                               class="wd-btn wd-btn-primary wd-btn-sm">
                                Tambah Undangan Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 wd-pagination">
            {{ $invitations->links() }}
        </div>
    </div>

</div>
@endsection