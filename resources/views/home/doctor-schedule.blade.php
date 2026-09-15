<div class="container">

    <div class="row align-items-end mb-4">

        <div class="col-md-8">

            <div class="doctor-heading">
                <h2>
                   Dokter
                </h2>

                <h3>
                    Temukan jadwal Dokter
                </h3>

            </div>

            <p class="section-subtitle">
                Cari jadwal praktik dokter berdasarkan
                spesialisasi dan hari yang Anda butuhkan.
            </p>

        </div>

        <div class="col-md-4 text-md-end mt-3 mt-md-0">

            <a
                href="{{ route('doctors.schedule') }}"
                class="btn btn-outline-medicare"
            >
                Lihat Semua Jadwal
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>

    </div>


    {{-- PREVIEW JADWAL --}}

    <div class="row g-3">

        @foreach ($doctors->take(3) as $doctor)

            <div class="col-lg-4">

                <div class="schedule-preview-card">

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


                    <div class="schedule-preview-list">

                        @foreach ($doctor->schedules as $schedule)

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

                        @endforeach

                    </div>


                    <a
                        href="{{ route('registration.create') }}"
                        class="btn btn-preview-booking"
                    >
                        Daftar
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>