@extends('layouts.admin')

@section('title', 'Jadwal Dokter - Admin MediCare')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <small class="text-uppercase fw-bold text-secondary">
                Admin
            </small>

            <h1 class="fw-bold mb-1">
                Jadwal Dokter
            </h1>

            <p class="text-muted mb-0">
                Kelola jadwal praktik dokter MediCare.
            </p>
        </div>

        <a
            href="{{ route('admin.doctor-schedules.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Jadwal
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- TABLE --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Dokter</th>
                            <th>Hari</th>
                            <th>Jam Praktik</th>
                            <th width="130">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($schedules as $schedule)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $schedule->doctor->name }}
                                    </strong>

                                    @if ($schedule->doctor->specialization)
                                        <div class="text-muted small">
                                            {{ $schedule->doctor->specialization }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    {{ $schedule->day }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.doctor-schedules.edit', $schedule) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.doctor-schedules.destroy', $schedule) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');"
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
                                    <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>

                                    Belum ada jadwal dokter.
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