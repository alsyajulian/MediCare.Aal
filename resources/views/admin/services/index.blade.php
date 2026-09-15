@extends('layouts.admin')

@section('title', 'Layanan - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Layanan
            </h1>

            <p class="text-muted mb-0">
                Kelola layanan yang tersedia di MediCare.
            </p>

        </div>

        <a
            href="{{ route('admin.services.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Layanan
        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Icon</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($services as $service)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if ($service->icon)
                                        <i class="{{ $service->icon }} fs-4"></i>
                                    @else
                                        <i class="bi bi-heart-pulse fs-4"></i>
                                    @endif
                                </td>

                                <td>
                                    <strong>
                                        {{ $service->name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ Str::limit($service->description, 80) }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus layanan ini?');"
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
                                    Belum ada layanan.
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