@extends('layouts.admin')

@section('title', 'Tambah Departemen - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Tambah Departemen
        </h1>

        <p class="text-muted">
            Tambahkan departemen baru ke MediCare.
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
                action="{{ route('admin.departments.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nama Departemen
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Kardiologi"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Foto Departemen
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                    </small>

                </div>


                <div class="mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Masukkan deskripsi departemen..."
                    >{{ old('description') }}</textarea>

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.departments.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Departemen
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection