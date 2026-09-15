@extends('layouts.admin')

@section('title', 'Artikel Kesehatan - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Artikel Kesehatan
            </h1>

            <p class="text-muted mb-0">
                Kelola artikel kesehatan yang ditampilkan di MediCare.
            </p>

        </div>

        <a
            href="{{ route('admin.articles.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Artikel
        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($articles as $article)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    @if ($article->image)

                                        <img
                                            src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->title }}"
                                            width="80"
                                            height="55"
                                            class="rounded object-fit-cover"
                                        >

                                    @else

                                        <div
                                            class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 55px;"
                                        >
                                            <i class="bi bi-image text-muted"></i>
                                        </div>

                                    @endif

                                </td>

                                <td>

                                    <strong>
                                        {{ $article->title }}
                                    </strong>

                                    @if ($article->excerpt)

                                        <div class="small text-muted mt-1">
                                            {{ Str::limit($article->excerpt, 60) }}
                                        </div>

                                    @endif

                                </td>

                                <td>

                                    @if ($article->published_at)
                                        {{ $article->published_at->format('d M Y') }}
                                    @else
                                        <span class="text-muted">
                                            Belum diterbitkan
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.articles.edit', $article) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.articles.destroy', $article) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center py-5 text-muted"
                                >

                                    <i class="bi bi-newspaper fs-1 d-block mb-2"></i>

                                    Belum ada artikel kesehatan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection