@extends('layouts.admin')

@section('title', 'Edit Foto - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Edit Foto
        </h1>

        <p class="text-muted mb-0">
            Perbarui informasi dokumentasi MediCare.
        </p>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form
                action="{{ route('galleries.update', $gallery) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- JUDUL --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $gallery->title) }}"
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

                        <option value="Fasilitas"
                            {{ old('category', $gallery->category) == 'Fasilitas' ? 'selected' : '' }}>
                            Fasilitas
                        </option>

                        <option value="Kegiatan"
                            {{ old('category', $gallery->category) == 'Kegiatan' ? 'selected' : '' }}>
                            Kegiatan
                        </option>

                        <option value="Pelayanan"
                            {{ old('category', $gallery->category) == 'Pelayanan' ? 'selected' : '' }}>
                            Pelayanan
                        </option>

                        <option value="Dokumentasi"
                            {{ old('category', $gallery->category) == 'Dokumentasi' ? 'selected' : '' }}>
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
                    >{{ old('description', $gallery->description) }}</textarea>

                    @error('description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- FOTO SAAT INI --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold d-block">
                        Foto Saat Ini
                    </label>

                    <img
                        src="{{ asset('storage/' . $gallery->image) }}"
                        alt="{{ $gallery->title }}"
                        class="rounded-3 mb-3"
                        style="width: 250px; height: 160px; object-fit: cover;"
                    >

                </div>


                {{-- GANTI FOTO --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                        Maksimal 2 MB.
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
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection