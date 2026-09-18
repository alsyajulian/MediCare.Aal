@extends('layouts.app')

@section('title', 'Cek Status Pendaftaran - MediCare')

@section('content')

<section class="section">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2">
                CEK PENDAFTARAN
            </span>

            <h1 class="mt-3 fw-bold">
                Cek Status Pendaftaran
            </h1>

            <p class="text-muted">
                Masukkan nomor pendaftaran dan nomor HP untuk melihat status pendaftaran Anda.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <form method="GET"
                              action="{{ route('registration.checkStatus') }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Nomor Pendaftaran
                                </label>

                                <input type="text"
                                       name="registration_number"
                                       class="form-control"
                                       placeholder="Contoh: REG-00001"
                                       value="{{ request('registration_number') }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Nomor HP
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       placeholder="Contoh: 08123456789"
                                       value="{{ request('phone') }}"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i>
                                Cek Status
                            </button>

                        </form>

                    </div>
                </div>

                @if(request()->filled('registration_number') && request()->filled('phone'))

                    @if($registration)

                        <div class="card border-0 shadow-sm rounded-4 mt-4">
                            <div class="card-body p-4">

                                <h5 class="fw-bold mb-4">
                                    Detail Pendaftaran
                                </h5>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Nomor Pendaftaran
                                    </small>
                                    <div class="fw-semibold">
                                        REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Nama Pasien
                                    </small>
                                    <div class="fw-semibold">
                                        {{ $registration->patient->name }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Dokter
                                    </small>
                                    <div class="fw-semibold">
                                        {{ $registration->doctor->name }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Departemen
                                    </small>
                                    <div class="fw-semibold">
                                        {{ $registration->doctor->department->name ?? '-' }}
                                    </div>
                                </div>

                                <div>
                                    <small class="text-muted">
                                        Status
                                    </small>

                                    <div class="mt-1">
                                        @if($registration->status === 'pending')
                                            <span class="badge bg-warning text-dark">
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif($registration->status === 'confirmed')
                                            <span class="badge bg-success">
                                                Dikonfirmasi
                                            </span>
                                        @elseif($registration->status === 'completed')
                                            <span class="badge bg-primary">
                                                Selesai
                                            </span>
                                        @elseif($registration->status === 'cancelled')
                                            <span class="badge bg-danger">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    @else

                        <div class="alert alert-danger mt-4 rounded-3">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Data pendaftaran tidak ditemukan.
                            Pastikan nomor pendaftaran dan nomor HP sudah benar.
                        </div>

                    @endif

                @endif

            </div>
        </div>

    </div>
</section>

@endsection