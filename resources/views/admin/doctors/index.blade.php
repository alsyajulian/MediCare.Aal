@extends('layouts.admin')

@section('title', 'Dokter - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Dokter
            </h1>

            <p class="text-muted mb-0">
                Kelola data dokter MediCare.
            </p>
        </div>

        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Dokter
        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Departemen</th>
                            <th>Spesialisasi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($doctors as $doctor)

                            <tr>

                                {{-- NO --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- FOTO --}}
                                <td>

                                    @if ($doctor->photo)

                                        <img
                                            src="{{ asset('storage/' . $doctor->photo) }}"
                                            alt="{{ $doctor->name }}"
                                            width="60"
                                            height="60"
                                            style="
                                                object-fit: cover;
                                                border-radius: 10px;
                                            "
                                        >

                                    @else

                                        <div
                                            style="
                                                width: 60px;
                                                height: 60px;
                                                border-radius: 10px;
                                                background: #edf5ff;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            "
                                        >
                                            <i class="bi bi-person fs-4 text-primary"></i>
                                        </div>

                                    @endif

                                </td>


                                {{-- NAMA --}}
                                <td>
                                    <strong>
                                        {{ $doctor->name }}
                                    </strong>
                                </td>


                                {{-- DEPARTEMEN --}}
                                <td>
                                    {{ $doctor->department->name ?? '-' }}
                                </td>


                                {{-- SPESIALISASI --}}
                                <td>
                                    {{ $doctor->specialization }}
                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <a
                                        href="{{ route('admin.doctors.edit', $doctor) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.doctors.destroy', $doctor) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus dokter ini?');"
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
                                    colspan="6"
                                    class="text-center py-5 text-muted"
                                >
                                    Belum ada data dokter.
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