@extends('layouts.admin')

@section('title', 'Edit Artikel - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Edit Artikel
        </h1>

        <p class="text-muted">
            Perbarui artikel kesehatan MediCare.
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
                action="{{ route('admin.articles.update', $article) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Judul Artikel
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $article->title) }}"
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

                        <option value="Kesehatan Jantung"
                            {{ old('category', $article->category) == 'Kesehatan Jantung' ? 'selected' : '' }}>
                            Kesehatan Jantung
                        </option>

                        <option value="Gaya Hidup Sehat"
                            {{ old('category', $article->category) == 'Gaya Hidup Sehat' ? 'selected' : '' }}>
                            Gaya Hidup Sehat
                        </option>

                        <option value="Kesehatan Anak"
                            {{ old('category', $article->category) == 'Kesehatan Anak' ? 'selected' : '' }}>
                            Kesehatan Anak
                        </option>

                        <option value="Kesehatan Mental"
                            {{ old('category', $article->category) == 'Kesehatan Mental' ? 'selected' : '' }}>
                            Kesehatan Mental
                        </option>

                        <option value="Nutrisi"
                            {{ old('category', $article->category) == 'Nutrisi' ? 'selected' : '' }}>
                            Nutrisi
                        </option>

                        <option value="Penyakit"
                            {{ old('category', $article->category) == 'Penyakit' ? 'selected' : '' }}>
                            Penyakit
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
                                @selected(old('category', $article->category) === $category)
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Artikel
                    </label>

                    @if ($article->image)

                        <div class="mb-2">

                            <img
                                src="{{ asset('storage/' . $article->image) }}"
                                alt="{{ $article->title }}"
                                width="180"
                                class="rounded"
                            >

                        </div>

                    @endif

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Ringkasan
                    </label>

                    <textarea
                        name="excerpt"
                        class="form-control"
                        rows="3"
                    >{{ old('excerpt', $article->excerpt) }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Isi Artikel
                    </label>

                    <textarea
                        name="content"
                        class="form-control"
                        rows="10"
                        required
                    >{{ old('content', $article->content) }}</textarea>

                </div>


                <div class="mb-4">

                    <label class="form-label">
                        Tanggal Publikasi
                    </label>

                    <input
                        type="date"
                        name="published_at"
                        class="form-control"
                        value="{{ old(
                            'published_at',
                            $article->published_at?->format('Y-m-d')
                        ) }}"
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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection