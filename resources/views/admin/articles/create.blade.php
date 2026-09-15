@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Tambah Artikel
        </h1>

        <p class="text-muted">
            Tambahkan artikel kesehatan baru untuk pengunjung MediCare.
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
                action="{{ route('admin.articles.store') }}"
                method="POST"
                enctype="multipart/form-data"
                onsubmit="this.querySelector('button[type=submit]').disabled=true; this.querySelector('button[type=submit]').innerHTML='<i class=\'bi bi-hourglass-split me-1\'></i> Menyimpan...';"

            >

                @csrf


                {{-- JUDUL --}}

                <div class="mb-3">

                    <label class="form-label">
                        Judul Artikel
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Tips Menjaga Kesehatan Jantung"
                        required
                    >

                </div>


                {{-- KATEGORI --}}

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select
                        name="category"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ([
                            'Kesehatan Jantung',
                            'Gaya Hidup Sehat',
                            'Kesehatan Anak',
                            'Kesehatan Mental',
                            'Nutrisi',
                            'Penyakit'
                        ] as $category)

                            <option
                                value="{{ $category }}"
                                @selected(old('category') === $category)
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- GAMBAR --}}

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Artikel
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>


                {{-- RINGKASAN --}}

                <div class="mb-3">

                    <label class="form-label">
                        Ringkasan
                    </label>

                    <textarea
                        name="excerpt"
                        class="form-control"
                        rows="3"
                        placeholder="Tulis ringkasan singkat artikel..."
                    >{{ old('excerpt') }}</textarea>

                </div>


                {{-- ISI --}}

                <div class="mb-3">

                    <label class="form-label">
                        Isi Artikel
                    </label>

                    <textarea
                        name="content"
                        class="form-control"
                        rows="10"
                        placeholder="Tulis isi artikel..."
                        required
                    >{{ old('content') }}</textarea>

                </div>


                {{-- TANGGAL --}}

                <div class="mb-4">

                    <label class="form-label">
                        Tanggal Publikasi
                    </label>

                    <input
                        type="date"
                        name="published_at"
                        class="form-control"
                        value="{{ old('published_at') }}"
                    >

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.articles.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Artikel
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection