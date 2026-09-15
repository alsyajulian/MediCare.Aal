@extends('layouts.app')

@section('title', 'Jadwal Dokter - MediCare')

@section('content')


    {{-- HERO --}}
    <section class="doctors-schedule-hero">

        <div class="doctors-schedule-hero-overlay"></div>

            <div class="container position-relative">

                <div class="doctors-schedule-hero-content">

                    <small>
                        JADWAL DOKTER
                    </small>

                    <h1 class="section-title mt-2">
                        Jadwal Praktik <span>Dokter</span>
                    </h1>

                    <p>
                        Temukan jadwal praktik dokter MediCare
                        berdasarkan nama, spesialisasi, atau hari praktik.
                    </p>

                </div>

            </div>

        

    </section>

<div class="container py-5">

    <div>

        <form
            method="GET"
            action="{{ route('doctors.schedule') }}"
            class="row g-3 mt-4 mb-5"
        >

            {{-- Nama Dokter --}}
            <div class="col-lg-5">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama dokter..."
                    value="{{ request('search') }}"
                >
            </div>

            {{-- Spesialisasi --}}
            <div class="col-lg-3">
                <select name="specialization" class="form-select">
                    <option value="">Semua Spesialisasi</option>

                    @foreach ($specializations as $specialization)
                        <option
                            value="{{ $specialization }}"
                            {{ request('specialization') == $specialization ? 'selected' : '' }}
                        >
                            {{ $specialization }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Hari --}}
            <div class="col-lg-2">
                <select name="day" class="form-select">
                    <option value="">Semua Hari</option>

                    @foreach ([
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    ] as $day)

                        <option
                            value="{{ $day }}"
                            {{ request('day') == $day ? 'selected' : '' }}
                        >
                            {{ $day }}
                        </option>

                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <div class="col-lg-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i>
                    Cari
                </button>
            </div>

        </form>



    {{-- DAFTAR DOKTER --}}

    @if ($doctors->count())

        <div class="row g-4">

            @foreach ($doctors as $doctor)

                <div class="col-md-6 col-lg-4">

                    <div class="schedule-preview-card h-100">

                        {{-- DOKTER --}}
                        <div class="schedule-preview-doctor">

                            <img
                                src="{{ $doctor->photo
                                    ? asset('storage/' . $doctor->photo)
                                    : asset('images/doctor-default.jpg') }}"
                                alt="{{ $doctor->name }}"
                            >

                            <div>

                                <h5>
                                    {{ $doctor->name }}
                                </h5>

                                <p>
                                    {{ $doctor->specialization }}
                                </p>

                            </div>

                        </div>


                        {{-- JADWAL --}}
                        <div class="schedule-preview-list">

                            @forelse ($doctor->schedules as $schedule)

                                <div>

                                    <strong>
                                        {{ $schedule->day }}
                                    </strong>

                                    <span>
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H.i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H.i') }}
                                    </span>

                                </div>

                            @empty

                                <div>
                                    <span>
                                        Jadwal belum tersedia.
                                    </span>
                                </div>

                            @endforelse

                        </div>


                        {{-- BOOKING --}}
                        <a
                            href="{{ route('registration.create', ['doctor' => $doctor->id]) }}"
                            class="btn btn-preview-booking"
                        >
                            Daftar
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- TIDAK ADA HASIL --}}

        <div class="text-center py-5">

            <i class="bi bi-calendar-x fs-1 text-secondary"></i>

            <h4 class="mt-3">
                Jadwal dokter tidak ditemukan
            </h4>

            <p class="text-muted">
                Coba gunakan kata kunci atau filter yang berbeda.
            </p>

            <a
                href="{{ route('doctors.schedule') }}"
                class="btn btn-outline-medicare"
            >
                Reset Pencarian
            </a>

        </div>

    @endif

</div>

@endsection

<style>

/* =================================
   DEPARTMENT HERO
================================= */

.doctors-schedule-hero {
    min-height: 420px;

    display: flex;
    align-items: center;

    position: relative;
    overflow: hidden;

    background-image:
        linear-gradient(
            90deg,
            rgba(255, 255, 255, 1) 5%,
            rgba(255, 255, 255, 0.12) 85%,
            rgba(255, 255, 255, 0) 100%
        ),
        url('/images/hospital.jpg');

    background-size: cover;
    background-position: center;

    border-radius: 0 0 12px 12px;
}

.doctors-schedule-hero-overlay {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.doctors-schedule-hero .container {
    position: relative;
    z-index: 2;
}

.doctors-schedule-hero-content {
    position: relative;

    max-width: 650px;

    padding: 75px 0;
}

.doctors-schedule-hero-content small {
    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}

.doctors-schedule-hero-content h1 {
    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}

.doctors-schedule-hero-content h1 span {
    color: #b13c68;
}

.doctors-schedule-hero-content p {
    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}

/* Jarak halaman dari hero */
.doctors-schedule-hero + .container {
    padding-top: 40px;
    padding-bottom: 60px;
}

/* Jarak form dengan daftar dokter */
.doctors-schedule-hero + .container form {
    margin-bottom: 50px;
}

/* Biar card tidak terlalu menempel */
.schedule-preview-card {
    margin-bottom: 10px;
}
</style>