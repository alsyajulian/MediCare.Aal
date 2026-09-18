@extends('layouts.admin')

@section('title', 'Pendaftaran Pasien - Admin')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <span class="section-label">
                ADMIN
            </span>

            <h1 class="section-title mt-2">
                Pendaftaran Pasien
            </h1>

            <p class="text-muted mb-0">
                Kelola data pendaftaran pasien MediCare.
            </p>
        </div>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($registrations as $registration)

                            <tr>

                                <td>
                                    REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $registration->patient->name }}
                                    </strong>

                                    <br>

                                    <small class="text-muted">
                                        {{ $registration->patient->phone }}
                                    </small>

                                </td>

                                <td>

                                    {{ $registration->doctor->name }}

                                    <br>

                                    <small class="text-muted">
                                        {{ $registration->doctor->specialization }}
                                    </small>

                                </td>

                                <td>
                                    {{ $registration->registration_date->format('d/m/Y') }}
                                </td>

                                <td>

                                    <form
                                        action="{{ route('admin.registrations.updateStatus', $registration) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <select
                                            name="status"
                                            class="form-select form-select-sm"
                                            onchange="this.form.submit()"
                                            style="width: 130px;"
                                        >

                                            <option value="pending"
                                                {{ $registration->status === 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="confirmed"
                                                {{ $registration->status === 'confirmed' ? 'selected' : '' }}>
                                                Confirmed
                                            </option>

                                            <option value="completed"
                                                {{ $registration->status === 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>

                                            <option value="cancelled"
                                                {{ $registration->status === 'cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>

                                        </select>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center py-5 text-muted"
                                >
                                    Belum ada pendaftaran pasien.

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