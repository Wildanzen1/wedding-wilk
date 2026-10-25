
@extends('layouts.admin')

@section('title', 'Tambah Undangan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create.css') }}">


<div class="create-wedding">

    {{-- Header halaman --}}
    <div class="create-heading">
        <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">

            <div class="d-flex align-items-center gap-3">
                <div class="heading-icon">
                    <i class="bi bi-envelope-paper-heart"></i>
                </div>

                <div>
                    <p class="heading-label">
                        Wedding Invitation
                    </p>

                    <h1 class="heading-title">
                        Tambah Undangan
                    </h1>

                    <p class="heading-description">
                        Mulai buat undangan untuk hari istimewa kedua mempelai.
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

    {{-- Container form --}}
    <div class="create-form-wrapper">

        <div class="form-intro">
            <div class="form-intro-icon">
                <i class="bi bi-heart"></i>
            </div>

            <div>
                <h2 class="form-intro-title">
                    Form Undangan Pernikahan
                </h2>

                <p class="form-intro-description">
                    Lengkapi data mempelai, foto, jadwal acara, dan informasi
                    lainnya dengan benar.
                </p>
            </div>
        </div>

        {{-- Form tambah yang sudah ada --}}
        @include('admin.invitations._form')

    </div>

</div>
@endsection
