<link rel="stylesheet" href="{{ asset('css/adminform.css') }}">

<div class="wedding-form">

    {{-- Header form --}}
    <div class="form-heading">
        <div class="heading-icon">
            <i class="bi bi-envelope-paper-heart"></i>
        </div>

        <h2 class="heading-title">
            {{ $invitation->exists ? 'Edit Undangan Pernikahan' : 'Buat Undangan Pernikahan' }}
        </h2>

        <p class="heading-description">
            Lengkapi informasi kedua mempelai dan detail acara pernikahan
            untuk menciptakan undangan yang istimewa.
        </p>
    </div>

    {{-- Validasi error --}}
    @if ($errors->any())
        <div class="wf-error">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-circle me-2"></i>
                Periksa kembali data berikut:
            </div>

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form utama --}}
    <form action="{{ $invitation->exists
        ? route('admin.invitations.update', $invitation)
        : route('admin.invitations.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @if ($invitation->exists)
            @method('PUT')
        @endif

        {{-- 1. Data mempelai --}}
        <div class="wf-card">
            <div class="wf-card-header">
                <div class="wf-section-icon">
                    <i class="bi bi-heart"></i>
                </div>

                <div>
                    <h3 class="wf-section-title">Data Mempelai</h3>
                    <span class="wf-section-subtitle">
                        Informasi pasangan yang akan menikah
                    </span>
                </div>
            </div>

            <div class="wf-card-body">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="groom_name" class="form-label">
                            Nama Mempelai Pria
                            <span class="required-mark">*</span>
                        </label>

                        <input type="text"
                               id="groom_name"
                               name="groom_name"
                               class="form-control"
                               value="{{ old('groom_name', $invitation->groom_name) }}"
                               placeholder="Masukkan nama mempelai pria"
                               maxlength="255"
                               autocomplete="name"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="bride_name" class="form-label">
                            Nama Mempelai Wanita
                            <span class="required-mark">*</span>
                        </label>

                        <input type="text"
                               id="bride_name"
                               name="bride_name"
                               class="form-control"
                               value="{{ old('bride_name', $invitation->bride_name) }}"
                               placeholder="Masukkan nama mempelai wanita"
                               maxlength="255"
                               required>
                    </div>

                    <div class="col-12">
                        <label for="slug" class="form-label">
                            Slug URL Undangan
                        </label>

                        <div class="input-group">
                            <span class="input-group-text"
                                  style="background:#f6e6e2;border-color:#e9dfd5;color:#b07272;">
                                <i class="bi bi-link-45deg"></i>
                            </span>

                            <input type="text"
                                   id="slug"
                                   name="slug"
                                   class="form-control"
                                   value="{{ old('slug', $invitation->slug) }}"
                                   placeholder="contoh: andi-siti">
                        </div>

                        <small class="wf-hint">
                            URL publik nantinya berbentuk
                            /undangan/andi-siti. Kosongkan untuk pembuatan
                            otomatis jika controller kamu mendukungnya.
                        </small>
                    </div>

                    {{-- Foto mempelai dan sampul --}}
                    @foreach ([
                        'groom_photo' => 'Foto Mempelai Pria',
                        'bride_photo' => 'Foto Mempelai Wanita',
                        'cover_photo' => 'Foto Sampul Undangan'
                    ] as $field => $label)

                        <div class="col-md-4">
                            <div class="wf-photo-box">
                                <label for="{{ $field }}" class="wf-photo-title">
                                    <i class="bi bi-image me-1"
                                       style="color:#b07272;"></i>
                                    {{ $label }}
                                </label>

                                <input type="file"
                                       id="{{ $field }}"
                                       name="{{ $field }}"
                                       class="form-control"
                                       accept="image/jpeg,image/png,image/webp">

                                <small class="wf-hint">
                                    JPG, PNG, atau WEBP sesuai ketentuan validasi.
                                </small>

                                @if ($invitation->exists && $invitation->$field)
                                    <img
                                        src="{{ asset('storage/' . $invitation->$field) }}"
                                        alt="{{ $label }}"
                                        class="wf-photo-preview">
                                @else
                                    <div class="wf-photo-empty">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <span>Belum ada foto</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- 2. Akad nikah --}}
        <div class="wf-card">
            <div class="wf-card-header">
                <div class="wf-section-icon">
                    <i class="bi bi-calendar-heart"></i>
                </div>

                <div>
                    <h3 class="wf-section-title">Akad Nikah</h3>
                    <span class="wf-section-subtitle">
                        Jadwal dan lokasi pelaksanaan akad
                    </span>
                </div>
            </div>

            <div class="wf-card-body">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="akad_date" class="form-label">
                            <i class="bi bi-calendar3 me-1"></i>
                            Tanggal dan Waktu
                        </label>

                        <input type="datetime-local"
                               id="akad_date"
                               name="akad_date"
                               class="form-control"
                               value="{{ old('akad_date', $invitation->akad_date ? $invitation->akad_date->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="akad_location" class="form-label">
                            <i class="bi bi-geo-alt me-1"></i>
                            Nama Tempat
                        </label>

                        <input type="text"
                               id="akad_location"
                               name="akad_location"
                               class="form-control"
                               value="{{ old('akad_location', $invitation->akad_location) }}"
                               placeholder="Contoh: Masjid Al-Ikhlas">
                    </div>

                    <div class="col-12">
                        <label for="akad_address" class="form-label">
                            Alamat Lengkap Akad
                        </label>

                        <textarea id="akad_address"
                                  name="akad_address"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap lokasi akad">{{ old('akad_address', $invitation->akad_address) }}</textarea>
                    </div>

                </div>
            </div>
        </div>

        {{-- 3. Resepsi --}}
        <div class="wf-card">
            <div class="wf-card-header">
                <div class="wf-section-icon">
                    <i class="bi bi-calendar2-heart"></i>
                </div>

                <div>
                    <h3 class="wf-section-title">Resepsi Pernikahan</h3>
                    <span class="wf-section-subtitle">
                        Informasi acara untuk keluarga dan para tamu
                    </span>
                </div>
            </div>

            <div class="wf-card-body">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="reception_date" class="form-label">
                            <i class="bi bi-calendar3 me-1"></i>
                            Tanggal dan Waktu
                        </label>

                        <input type="datetime-local"
                               id="reception_date"
                               name="reception_date"
                               class="form-control"
                               value="{{ old('reception_date', $invitation->reception_date ? $invitation->reception_date->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="reception_location" class="form-label">
                            <i class="bi bi-geo-alt me-1"></i>
                            Nama Tempat
                        </label>

                        <input type="text"
                               id="reception_location"
                               name="reception_location"
                               class="form-control"
                               value="{{ old('reception_location', $invitation->reception_location) }}"
                               placeholder="Contoh: Gedung Serbaguna">
                    </div>

                    <div class="col-12">
                        <label for="reception_address" class="form-label">
                            Alamat Lengkap Resepsi
                        </label>

                        <textarea id="reception_address"
                                  name="reception_address"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap lokasi resepsi">{{ old('reception_address', $invitation->reception_address) }}</textarea>
                    </div>

                </div>
            </div>
        </div>

        {{-- 4. Informasi tambahan --}}
        <div class="wf-card">
            <div class="wf-card-header">
                <div class="wf-section-icon">
                    <i class="bi bi-stars"></i>
                </div>

                <div>
                    <h3 class="wf-section-title">Informasi Tambahan</h3>
                    <span class="wf-section-subtitle">
                        Peta lokasi, cerita pasangan, dan status undangan
                    </span>
                </div>
            </div>

            <div class="wf-card-body">
                <div class="row g-4">

                    <div class="col-12">
                        <label for="google_maps_url" class="form-label">
                            <i class="bi bi-map me-1"></i>
                            Link Google Maps
                        </label>

                        <input type="url"
                               id="google_maps_url"
                               name="google_maps_url"
                               class="form-control"
                               value="{{ old('google_maps_url', $invitation->google_maps_url) }}"
                               placeholder="https://maps.google.com/...">

                        <small class="wf-hint">
                            Tempel tautan Google Maps menuju lokasi acara.
                        </small>
                    </div>

                    <div class="col-12">
                        <label for="story" class="form-label">
                            <i class="bi bi-chat-heart me-1"></i>
                            Cerita Perjalanan Cinta
                        </label>

                        <textarea id="story"
                                  name="story"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Tuliskan cerita singkat tentang perjalanan cinta pasangan...">{{ old('story', $invitation->story) }}</textarea>

                        <small class="wf-hint">
                            Cerita ini bisa ditampilkan pada halaman undangan publik.
                        </small>
                    </div>

                    {{-- Status publikasi --}}
                    <div class="col-12">
                        <div class="wf-publish-box">
                            <div class="wf-publish-icon">
                                <i class="bi bi-globe2"></i>
                            </div>

                            <div class="flex-grow-1">
                                <div class="wf-publish-title">
                                    Terbitkan Undangan
                                </div>

                                <p class="wf-publish-description">
                                    Aktifkan agar undangan dapat dilihat
                                    melalui tautan publik. Nonaktifkan untuk
                                    menyimpan sebagai draf.
                                </p>
                            </div>

                            <div class="form-check form-switch ms-auto">
                                <input type="hidden"
                                       name="is_published"
                                       value="0">

                                <input type="checkbox"
                                       name="is_published"
                                       value="1"
                                       class="form-check-input"
                                       id="is_published"
                                       role="switch"
                                       @checked((bool) old('is_published', $invitation->is_published))>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Tombol aksi --}}
        <div class="wf-actions">
            <a href="{{ route('admin.invitations.index') }}"
               class="wf-btn wf-btn-back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Daftar
            </a>

            <div class="d-flex gap-2 flex-wrap">
                <button type="reset" class="wf-btn wf-btn-back">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset Form
                </button>

                <button type="submit" class="wf-btn wf-btn-save">
                    <i class="bi bi-heart-fill"></i>
                    {{ $invitation->exists ? 'Simpan Perubahan' : 'Simpan Undangan' }}
                </button>
            </div>
        </div>

    </form>
</div>