@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil - MediCare')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-lg-5 text-center">

                    {{-- ICON --}}
                    <div class="mb-4">

                        <i
                            class="bi bi-check-circle-fill text-success"
                            style="font-size: 64px;"
                        ></i>

                    </div>


                    {{-- TITLE --}}
                    <h1 class="section-title">
                        Pendaftaran Berhasil!
                    </h1>

                    <p class="text-muted">
                        Pendaftaran rawat jalan Anda telah berhasil
                        dikirim ke MediCare.
                    </p>


                    {{-- NOMOR PENDAFTARAN --}}
                    <div class="bg-light rounded-4 p-4 my-4">

                        <small class="text-muted d-block">
                            Nomor Pendaftaran
                        </small>

                        <h2 class="fw-bold mt-2 mb-0">
                            REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}
                        </h2>

                    </div>


                    {{-- DETAIL --}}
                    <div class="text-start">

                        <h5 class="mb-3">
                            Detail Pendaftaran
                        </h5>


                        <div class="row g-3">

                            <div class="col-sm-6">

                                <small class="text-muted">
                                    Nama Pasien
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->patient->name }}
                                </div>

                            </div>


                            <div class="col-sm-6">

                                <small class="text-muted">
                                    No. Telepon
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->patient->phone }}
                                </div>

                            </div>


                            <div class="col-sm-6">

                                <small class="text-muted">
                                    Dokter
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->doctor->name }}
                                </div>

                            </div>


                            <div class="col-sm-6">

                                <small class="text-muted">
                                    Spesialisasi
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->doctor->specialization }}
                                </div>

                            </div>


                            <div class="col-sm-6">

                                <small class="text-muted">
                                    Departemen
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->doctor->department->name }}
                                </div>

                            </div>


                            <div class="col-sm-6">

                                <small class="text-muted">
                                    Tanggal Kunjungan
                                </small>

                                <div class="fw-semibold">
                                    {{ $registration->registration_date->format('d F Y') }}
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="mt-4">

                        <span class="badge text-bg-warning px-3 py-2">
                            Menunggu Konfirmasi
                        </span>

                    </div>


                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-center gap-2 mt-4">

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-outline-secondary"
                        >
                            Kembali ke Beranda
                        </a>

                        <a
                            href="{{ route('doctors.schedule') }}"
                            class="btn btn-primary"
                        >
                            Lihat Jadwal Dokter
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection