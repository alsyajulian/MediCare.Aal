@extends('layouts.admin')

@section('title', 'Edit Jadwal Dokter - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Edit Jadwal Dokter
        </h1>

        <p class="text-muted">
            Perbarui jadwal praktik dokter MediCare.
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
                action="{{ route('admin.doctor-schedules.update', $doctorSchedule) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                {{-- DOKTER --}}

                <div class="mb-3">

                    <label class="form-label">
                        Dokter
                    </label>

                    <select
                        name="doctor_id"
                        class="form-select"
                        required
                    >

                        @foreach ($doctors as $doctor)

                            <option
                                value="{{ $doctor->id }}"
                                @selected(old('doctor_id', $doctorSchedule->doctor_id) == $doctor->id)
                            >
                                {{ $doctor->name }}
                                — {{ $doctor->specialization }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- HARI --}}

                <div class="mb-3">

                    <label class="form-label">
                        Hari Praktik
                    </label>

                    <select
                        name="day"
                        class="form-select"
                        required
                    >

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
                                @selected(old('day', $doctorSchedule->day) === $day)
                            >
                                {{ $day }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- JAM --}}

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jam Mulai
                        </label>

                        <input
                            type="time"
                            name="start_time"
                            class="form-control"
                            value="{{ old('start_time', \Carbon\Carbon::parse($doctorSchedule->start_time)->format('H:i')) }}"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jam Selesai
                        </label>

                        <input
                            type="time"
                            name="end_time"
                            class="form-control"
                            value="{{ old('end_time', \Carbon\Carbon::parse($doctorSchedule->end_time)->format('H:i')) }}"
                            required
                        >

                    </div>

                </div>


                <div class="d-flex gap-2 mt-3">

                    <a
                        href="{{ route('admin.doctor-schedules.index') }}"
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