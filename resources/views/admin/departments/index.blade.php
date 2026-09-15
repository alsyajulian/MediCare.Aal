@extends('layouts.admin')

@section('title', 'Departemen - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Departemen
            </h1>

            <p class="text-muted mb-0">
                Kelola data departemen MediCare.
            </p>

        </div>

        <a
                href="{{ route('admin.departments.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Departemen
        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($departments as $department)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $department->name }}
                                    </strong>
                                </td>

                                <td>

                                    @if ($department->image)

                                        <img
                                            src="{{ asset('storage/' . $department->image) }}"
                                            alt="{{ $department->name }}"
                                            width="80"
                                            height="55"
                                            style="object-fit: cover; border-radius: 6px;"
                                        >

                                    @else

                                        <span class="text-muted small">
                                            Tidak ada foto
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ Str::limit($department->description, 80) }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.departments.edit', $department) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.departments.destroy', $department) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus departemen ini?');"
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
                                    colspan="4"
                                    class="text-center py-5 text-muted"
                                >
                                    Belum ada data departemen.
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