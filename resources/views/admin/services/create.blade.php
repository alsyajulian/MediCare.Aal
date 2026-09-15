@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Tambah Layanan
        </h1>

        <p class="text-muted">
            Tambahkan layanan kesehatan baru ke MediCare.
        </p>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin.services.store') }}"
                method="POST"
            >

                @csrf


                {{-- NAMA --}}

                <div class="mb-3">

                    <label class="form-label">
                        Nama Layanan
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Pemeriksaan Umum"
                        required
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Masukkan deskripsi layanan..."
                    >{{ old('description') }}</textarea>

                </div>

                <div class="mb-3">

                    <label for="details" class="form-label">
                        Informasi Lengkap
                    </label>

                    <textarea
                        name="details"
                        id="details"
                        rows="6"
                        class="form-control"
                        placeholder="Masukkan informasi lengkap mengenai layanan..."
                    >{{ old('details') }}</textarea>

                </div>


                {{-- ICON --}}

                <div class="mb-4">

                    <label class="form-label">
                        Icon
                    </label>

                    <input
                        type="text"
                        name="icon"
                        class="form-control"
                        value="{{ old('icon') }}"
                        placeholder="Contoh: bi bi-heart-pulse"
                    >

                    <small class="text-muted">
                        Masukkan class Bootstrap Icon.
                    </small>

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Layanan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection