@extends('layouts.app')

@section('title', 'Edit Dokter - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Edit Dokter
        </h1>

        <p class="text-muted">
            Perbarui informasi dokter MediCare.
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
                action="{{ route('admin.doctors.update', $doctor) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Nama Dokter
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $doctor->name) }}"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Departemen
                    </label>

                    <select
                        name="department_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Pilih Departemen
                        </option>

                        @foreach ($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                @selected(
                                    old(
                                        'department_id',
                                        $doctor->department_id
                                    ) == $department->id
                                )
                            >
                                {{ $department->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Spesialisasi
                    </label>

                    <input
                        type="text"
                        name="specialization"
                        class="form-control"
                        value="{{ old('specialization', $doctor->specialization) }}"
                        required
                    >

                </div>


                <div class="mb-4">

                    <label class="form-label">
                        Ganti Foto Dokter
                    </label>

                    <input
                        type="file"
                        name="photo"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    @if ($doctor->photo)

                        <small class="text-muted d-block mt-2">
                            Foto saat ini sudah tersedia.
                            Pilih file baru jika ingin menggantinya.
                        </small>

                    @endif

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.doctors.index') }}"
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