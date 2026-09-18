@extends('layouts.app')

@section('title', 'Galeri - MediCare Hospital')

@section('content')


{{-- =========================================
     HERO
========================================= --}}

<section class="gallery-hero">

    <div class="gallery-hero-overlay"></div>

    <div class="container position-relative">

        <div class="gallery-hero-content">

            <small>
                GALERI
            </small>

            <h1 class="section-title mt-2">
                Dokumentasi <span>MediCare</span>
            </h1>

            <p>
                Lihat berbagai fasilitas, kegiatan, dan pelayanan
                yang ada di MediCare Hospital.
            </p>

        </div>

    </div>

</section>



{{-- =========================================
     FILTER KATEGORI
========================================= --}}

<section class="section" id="gallery-list">

    <div class="container">

        <div class="d-flex justify-content-center gap-2 flex-wrap mb-5">

            <a
                href="{{ route('gallery.index') }}#gallery-list"
                class="btn btn-sm {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}"
            >
                Semua
            </a>

            <a
                href="{{ route('gallery.index', ['category' => 'Fasilitas']) }}#gallery-list"
                class="btn btn-sm {{ request('category') == 'Fasilitas' ? 'btn-primary' : 'btn-outline-primary' }}"
            >
                Fasilitas
            </a>

            <a
                href="{{ route('gallery.index', ['category' => 'Kegiatan']) }}#gallery-list"
                class="btn btn-sm {{ request('category') == 'Kegiatan' ? 'btn-primary' : 'btn-outline-primary' }}"
            >
                Kegiatan
            </a>

            <a
                href="{{ route('gallery.index', ['category' => 'Pelayanan']) }}#gallery-list"
                class="btn btn-sm {{ request('category') == 'Pelayanan' ? 'btn-primary' : 'btn-outline-primary' }}"
            >
                Pelayanan
            </a>

            <a
                href="{{ route('gallery.index', ['category' => 'Dokumentasi']) }}#gallery-list"
                class="btn btn-sm {{ request('category') == 'Dokumentasi' ? 'btn-primary' : 'btn-outline-primary' }}"
            >
                Dokumentasi
            </a>

        </div>



        {{-- =================================
             GALERI
        ================================= --}}

        <div class="row g-4">

            @forelse ($galleries as $gallery)

                <div class="col-6 col-lg-4">

                    {{-- CARD --}}
                    <div
                        class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 gallery-page-card"
                        data-bs-toggle="modal"
                        data-bs-target="#galleryPageModal{{ $gallery->id }}"
                    >

                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="gallery-page-image"
                        >

                        <div class="card-body">

                            <small class="text-primary fw-semibold">
                                {{ $gallery->category }}
                            </small>

                            <h5 class="fw-bold mt-2">
                                {{ $gallery->title }}
                            </h5>

                            @if ($gallery->description)

                                <p class="text-muted small mb-0">
                                    {{ $gallery->description }}
                                </p>

                            @endif

                            <span class="gallery-page-link">
                                Lihat Foto
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>


                    {{-- =================================
                         MODAL
                    ================================= --}}

                    <div
                        class="modal fade"
                        id="galleryPageModal{{ $gallery->id }}"
                        tabindex="-1"
                        aria-labelledby="galleryPageModalLabel{{ $gallery->id }}"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog gallery-modal-dialog modal-dialog-centered">

                            <div class="modal-content gallery-modal">

                                {{-- CLOSE --}}
                                <div class="modal-header border-0">

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>

                                </div>


                                {{-- FOTO --}}
                                <img
                                    src="{{ asset('storage/' . $gallery->image) }}"
                                    alt="{{ $gallery->title }}"
                                    class="gallery-modal-image"
                                >


                                {{-- CONTENT --}}
                                <div class="modal-body">

                                    <span class="gallery-modal-label">
                                        {{ strtoupper($gallery->category) }}
                                    </span>

                                    <h3 id="galleryPageModalLabel{{ $gallery->id }}">
                                        {{ $gallery->title }}
                                    </h3>

                                    @if ($gallery->description)

                                        <p class="gallery-modal-text">
                                            {{ $gallery->description }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="bi bi-images fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            Belum ada dokumentasi
                        </h5>

                        <p class="text-muted">
                            Galeri MediCare belum memiliki foto.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection



<style>

/* =================================
   GALLERY HERO
================================= */

.gallery-hero {
    min-height: 460px;

    display: flex;
    align-items: center;

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

.gallery-hero-content {
    max-width: 650px;

    padding: 75px 0;
}

.gallery-hero-content small {
    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}

.gallery-hero-content h1 {
    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}

.gallery-hero-content h1 span {
    color: #b13c68;
}

.gallery-hero-content p {
    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}



/* =================================
   GALLERY CARD
================================= */

.gallery-page-card {
    cursor: pointer;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}

.gallery-page-card:hover {
    transform: translateY(-3px);
}

.gallery-page-image {
    width: 100%;
    height: 240px;

    object-fit: cover;
    display: block;
}

.gallery-page-link {
    display: inline-block;

    margin-top: 12px;

    color: #1264c4;

    font-size: 12px;
    font-weight: 600;
}



/* =================================
   GALLERY MODAL
================================= */

.gallery-modal-dialog {
    width: 700px;
    max-width: calc(100% - 24px);
    margin: 30px auto;
}

.gallery-modal {
    border: none;
    border-radius: 16px;
    overflow: hidden;

    box-shadow:
        0 20px 60px rgba(6, 59, 120, 0.20);
}



/* FOTO */

.gallery-modal-image {
    width: 100%;
    height: 360px;

    object-fit: cover;
    display: block;
}



/* CLOSE */

.gallery-modal .modal-header {
    position: absolute;

    top: 0;
    right: 0;

    z-index: 10;

    padding: 0 !important;

    border: none !important;
}

.gallery-modal .btn-close {
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

    border: none !important;
}

.gallery-modal .btn-close:focus {
    outline: none !important;

    box-shadow:
        0 2px 8px rgba(0, 0, 0, 0.12) !important;
}



/* CONTENT */

.gallery-modal .modal-body {
    padding: 25px 28px 30px;
}



/* CATEGORY */

.gallery-modal-label {
    display: block;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1px;

    color: #1264c4;
}



/* TITLE */

.gallery-modal h3 {
    color: #063b78;

    font-size: 24px;

    font-weight: 700;

    margin: 8px 0 12px;
}



/* DESCRIPTION */

.gallery-modal-text {
    color: #64748b;

    font-size: 13px;

    line-height: 1.7;

    margin: 0;
}



/* =================================
   RESPONSIVE
================================= */

@media (max-width: 576px) {

    .gallery-modal-dialog {
        width: auto;

        max-width: calc(100% - 24px);

        margin: 12px auto;
    }

    .gallery-modal-image {
        height: 240px;
    }

    .gallery-modal .modal-body {
        padding: 20px;
    }

    .gallery-modal h3 {
        font-size: 21px;
    }

}

</style>