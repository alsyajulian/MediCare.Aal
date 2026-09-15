@extends('layouts.admin')

@section('title', 'Tambah Foto - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Tambah Foto
        </h1>

        <p class="text-muted mb-0">
            Tambahkan dokumentasi baru ke Galeri MediCare.
        </p>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form
                action="{{ route('galleries.store') }}"
                method="POST"
                enctype="multipart/form-data"
                onsubmit="this.querySelector('button[type=submit]').disabled = true;"

            >

                @csrf


                {{-- JUDUL --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Ruang Rawat Inap"
                        required
                    >

                    @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- KATEGORI --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select
                        name="category"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Pilih Kategori
                        </option>

                        <option
                            value="Fasilitas"
                            {{ old('category') == 'Fasilitas' ? 'selected' : '' }}
                        >
                            Fasilitas
                        </option>

                        <option
                            value="Kegiatan"
                            {{ old('category') == 'Kegiatan' ? 'selected' : '' }}
                        >
                            Kegiatan
                        </option>

                        <option
                            value="Pelayanan"
                            {{ old('category') == 'Pelayanan' ? 'selected' : '' }}
                        >
                            Pelayanan
                        </option>

                        <option
                            value="Dokumentasi"
                            {{ old('category') == 'Dokumentasi' ? 'selected' : '' }}
                        >
                            Dokumentasi
                        </option>

                    </select>

                    @error('category')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- DESKRIPSI --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control"
                        placeholder="Deskripsi singkat mengenai foto..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- FOTO --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Foto
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                        required
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    @error('image')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- BUTTON --}}

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('galleries.index') }}"
                        class="btn btn-light"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-upload me-1"></i>
                        Simpan Foto
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection