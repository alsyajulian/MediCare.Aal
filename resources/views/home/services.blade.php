<section class="section services-page">

    <div class="container">

        {{-- HEADER --}}
        <div class="row align-items-end mb-4">

            {{-- TOMBOL KIRI --}}
            <div class="col-md-4 order-2 order-md-1 mt-3 mt-md-0">

                <a
                    href="{{ route('services.index') }}"
                    class="btn btn-outline-medicare"
                >
                    Lihat Semua Layanan
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>


            {{-- JUDUL KANAN --}}
            <div class="col-md-8 order-1 order-md-2">

                <div class="services-heading">

                    <span class="section-label">
                        LAYANAN KAMI
                    </span>

                    <h2>
                        Layanan <span>Medis Kami</span>
                    </h2>

                    <p>
                        Kami menyediakan berbagai layanan medis untuk mendukung
                        kesehatan dan kesejahteraan Anda.
                    </p>

                </div>

            </div>

        </div>

        {{-- SERVICES --}}
        <div class="row g-4">

            @forelse ($services as $service)

                <div class="col-md-6 col-lg-4">

                    <div class="service-page-card">

                        {{-- ICON --}}
                        <div class="service-page-icon">

                            @if ($service->icon)

                                <i class="{{ $service->icon }}"></i>

                            @else

                                <i class="bi bi-heart-pulse"></i>

                            @endif

                        </div>


                        {{-- NAMA --}}
                        <h4>
                            {{ $service->name }}
                        </h4>


                        {{-- DESKRIPSI --}}
                        <p>
                            {{ $service->description }}
                        </p>


                        {{-- ACTION --}}
                        @if (strtolower($service->name) === 'rawat jalan')

                            <a
                                href="{{ route('registration.create') }}"
                                class="service-page-link"
                            >
                                Daftar Sekarang
                                <i class="bi bi-arrow-right"></i>
                            </a>

                       @else

                        <a
                            href="#"
                            class="service-page-link"
                            data-bs-toggle="modal"
                            data-bs-target="#serviceModal{{ $service->id }}"
                        >
                            Informasi Layanan
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    @endif

                    </div>

                    {{-- MODAL INFORMASI LAYANAN --}}

                    <div
                        class="modal fade"
                        id="serviceModal{{ $service->id }}"
                        tabindex="-1"
                        aria-labelledby="serviceModalLabel{{ $service->id }}"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog service-modal-dialog modal-dialog-centered">

                            <div class="modal-content service-modal">

                                {{-- CLOSE --}}

                                <div class="modal-header border-0">

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>

                                </div>


                                {{-- CONTENT --}}

                                <div class="modal-body">

                                    <div class="service-modal-icon">

                                        <i class="{{ $service->icon ?? 'bi bi-heart-pulse' }}"></i>

                                    </div>


                                    <span class="service-modal-label">
                                        INFORMASI LAYANAN
                                    </span>


                                    <h3 id="serviceModalLabel{{ $service->id }}">
                                        {{ $service->name }}
                                    </h3>


                                    @if ($service->details)

                                        <p class="service-modal-text">
                                            {!! nl2br(e($service->details)) !!}
                                        </p>

                                    @else

                                        <p class="service-modal-text">
                                            {{ $service->description }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5 text-muted">

                        <i class="bi bi-heart-pulse fs-1"></i>

                        <p class="mt-3 mb-0">
                            Belum ada layanan yang tersedia.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- CTA --}}
        <div class="services-cta mt-5">

            <div>

                <h4>
                    Ingin melakukan pemeriksaan?
                </h4>

                <p>
                    Lihat jadwal dokter dan lakukan pendaftaran
                    rawat jalan secara online.
                </p>

            </div>

            <div class="d-flex gap-2">

                <a
                    href="{{ route('doctors.schedule') }}"
                    class="btn btn-service-outline"
                >
                    Jadwal Dokter
                </a>

                <a
                    href="{{ route('registration.create') }}"
                    class="btn btn-service-primary"
                >
                    Booking Sekarang
                </a>

            </div>

        </div>

    </div>

</section>


<style>

    
/* =================================
   SERVICE MODAL
================================= */

.service-modal-dialog {
    width: 550px;
    max-width: calc(100% - 24px);
    margin: 30px auto;
}

.service-modal {
    border: none;
    border-radius: 16px;
    overflow: hidden;

    box-shadow:
        0 20px 60px rgba(6, 59, 120, 0.20);
}


/* CLOSE */

.service-modal .modal-header {
    position: absolute;

    top: 0;
    right: 0;

    z-index: 10;

    padding: 0 !important;
    border: none !important;
}

.service-modal .btn-close {
    width: 38px !important;
    height: 38px !important;

    padding: 0 !important;
    margin: 10px !important;

    background-color: #ffffff !important;

    border-radius: 50% !important;

    opacity: 1 !important;

    background-size: 14px 14px !important;
    background-position: center !important;
    background-repeat: no-repeat !important;

    box-shadow:
        0 2px 8px rgba(0, 0, 0, 0.12);
}


/* BODY */

.service-modal .modal-body {
    padding: 35px 30px 30px;
}


/* ICON */

.service-modal-icon {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eef6ff;

    border-radius: 12px;

    margin-bottom: 18px;
}

.service-modal-icon i {
    font-size: 24px;
    color: #1264c4;
}


/* LABEL */

.service-modal-label {
    display: block;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: 1px;

    color: #1264c4;
}


/* TITLE */

.service-modal h3 {
    color: #063b78;

    font-size: 24px;
    font-weight: 700;

    margin: 8px 0 14px;
}


/* TEXT */

.service-modal-text {
    color: #64748b;

    font-size: 13px;
    line-height: 1.8;

    margin: 0;
}


/* RESPONSIVE */

@media (max-width: 576px) {

    .service-modal-dialog {
        width: auto;
        max-width: calc(100% - 24px);

        margin: 12px auto;
    }

    .service-modal .modal-body {
        padding: 25px 20px;
    }

    .service-modal h3 {
        font-size: 21px;
    }

}

</style>