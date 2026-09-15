@extends('layouts.app')

@section('title', 'Pendaftaran Pasien - MediCare')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <span class="section-label">
            PENDAFTARAN PASIEN
        </span>

        <h1 class="section-title mt-2">
            Pendaftaran Rawat Jalan
        </h1>

        <p class="section-subtitle mx-auto" style="max-width: 650px;">
            Isi data berikut untuk melakukan pendaftaran
            dan daftar kunjungan ke MediCare.
        </p>

    </div>


    @if (session('success'))

        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>

    @endif


    @if ($errors->any())

        <div class="alert alert-danger mb-4">

            <strong>
                Ada data yang perlu diperbaiki:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-lg-5">

                    <form
                        method="POST"
                        action="{{ route('registration.store') }}"
                    >

                        @csrf


                        {{-- DATA PASIEN --}}

                        <h4 class="mb-4">
                            Data Pasien
                        </h4>

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    NIK
                                </label>

                                <input
                                    type="text"
                                    name="nik"
                                    class="form-control"
                                    value="{{ old('nik') }}"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    No. Telepon
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Tanggal Lahir
                                </label>

                                <input
                                    type="date"
                                    name="birth_date"
                                    class="form-control"
                                    value="{{ old('birth_date') }}"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Jenis Kelamin
                                </label>

                                <select
                                    name="gender"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Pilih jenis kelamin
                                    </option>

                                    <option
                                        value="L"
                                        @selected(old('gender') === 'L')
                                    >
                                        Laki-laki
                                    </option>

                                    <option
                                        value="P"
                                        @selected(old('gender') === 'P')
                                    >
                                        Perempuan
                                    </option>

                                </select>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Alamat
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                >{{ old('address') }}</textarea>

                            </div>

                        </div>


                        <hr class="my-5">


                        {{-- DATA PENDAFTARAN --}}

                        <h4 class="mb-4">
                            Detail Kunjungan
                        </h4>

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Pilih Dokter
                                </label>

                               <select
                                    name="doctor_id"
                                    id="doctor_id"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        Pilih dokter
                                    </option>

                                    @foreach ($doctors as $doctor)

                                        <option
                                            value="{{ $doctor->id }}"
                                            data-days="{{ $doctor->schedules->pluck('day')->implode(',') }}"
                                            @selected(old('doctor_id', $selectedDoctor?->id) == $doctor->id)
                                        >
                                            {{ $doctor->name }}
                                            —
                                            {{ $doctor->specialization }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Tanggal Kunjungan
                                </label>

                                <input
                                    type="date"
                                    name="registration_date"
                                    id="registration_date"
                                    class="form-control"
                                    value="{{ old('registration_date') }}"
                                    min="{{ date('Y-m-d') }}"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Keluhan
                                </label>

                                <textarea
                                    name="complaint"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Tuliskan keluhan atau alasan kunjungan..."
                                >{{ old('complaint') }}</textarea>

                            </div>

                        </div>


                        <div class="text-end mt-4">

                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >
                                <i class="bi bi-calendar-check me-1"></i>
                                Daftar Sekarang
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const doctorSelect = document.getElementById('doctor_id');
    const dateInput = document.getElementById('registration_date');

    const dayMap = {
        0: 'Minggu',
        1: 'Senin',
        2: 'Selasa',
        3: 'Rabu',
        4: 'Kamis',
        5: 'Jumat',
        6: 'Sabtu'
    };

    function checkDate() {

        const selectedOption =
            doctorSelect.options[doctorSelect.selectedIndex];

        const days = selectedOption.dataset.days
            ? selectedOption.dataset.days.split(',')
            : [];

        const selectedDate = dateInput.value;

        if (!selectedDate || days.length === 0) {
            return;
        }

        const date = new Date(selectedDate + 'T00:00:00');

        const selectedDay = dayMap[date.getDay()];

        if (!days.includes(selectedDay)) {

            alert(
                'Dokter tidak memiliki jadwal praktik pada hari ' +
                selectedDay +
                '. Silakan pilih tanggal lain.'
            );

            dateInput.value = '';
        }
    }

    doctorSelect.addEventListener('change', checkDate);

    dateInput.addEventListener('change', checkDate);

});
</script>