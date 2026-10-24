@extends('layouts.admin')

@section('title', 'Edit Undangan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<div class="edit-wedding">

    {{-- Header halaman --}}
    <div class="edit-heading">
        <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">

            <div class="d-flex align-items-center gap-3">
                <div class="heading-icon">
                    <i class="bi bi-envelope-paper-heart"></i>
                </div>

                <div>
                    <p class="heading-label">Wedding Invitation</p>

                    <h1 class="heading-title">
                        Edit Undangan
                    </h1>

                    <p class="heading-description">
                        Perbarui detail hari istimewa kedua mempelai.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.invitations.index') }}"
               class="btn-back">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>
    </div>

    {{-- Form edit --}}
    <div class="edit-card">

        <div class="edit-card-header">
            <div class="card-header-icon">
                <i class="bi bi-heart"></i>
            </div>

            <div>
                <h2 class="card-title">
                    Informasi Undangan
                </h2>

                <div class="card-subtitle">
                    Silakan sesuaikan informasi berikut.
                </div>
            </div>
        </div>

        <div class="edit-card-body">

            {{-- Nama pasangan --}}
            <div class="text-center mb-4 pb-4"
                 style="border-bottom: 1px solid #f2e9e0;">

                <p class="heading-label">
                    The Wedding Of
                </p>

                <div class="couple-name">
                    {{ $invitation->groom_name }}

                    <span class="couple-ampersand">&amp;</span>

                    {{ $invitation->bride_name }}
                </div>
            </div>

            {{-- Form yang sudah ada --}}
            @include('admin.invitations._form')

        </div>
    </div>

</div>
@endsection