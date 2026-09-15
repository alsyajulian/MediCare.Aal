@extends('layouts.admin')

@section('title', 'Galeri - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Galeri
            </h1>

            <p class="text-muted mb-0">
                Kelola dokumentasi MediCare Hospital.
            </p>
        </div>

        <a
            href="{{ route('galleries.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Foto
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}

    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="row g-4">

        @forelse ($galleries as $gallery)

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                    <img
                        src="{{ asset('storage/' . $gallery->image) }}"
                        alt="{{ $gallery->title }}"
                        style="height: 220px; width: 100%; object-fit: cover;"
                    >


                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">
                            {{ $gallery->category }}
                        </span>

                        <h5 class="fw-bold">
                            {{ $gallery->title }}
                        </h5>

                        <p class="text-muted small">
                            {{ $gallery->description ?? 'Tidak ada deskripsi.' }}
                        </p>


                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('galleries.edit', $gallery) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                <i class="bi bi-pencil"></i>
                                Edit
                            </a>


                            <form
                                action="{{ route('galleries.destroy', $gallery) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-images fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            Belum ada foto
                        </h5>

                        <p class="text-muted">
                            Tambahkan dokumentasi MediCare melalui tombol
                            Tambah Foto.
                        </p>

                        <a
                            href="{{ route('galleries.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-plus-lg me-1"></i>
                            Tambah Foto
                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection