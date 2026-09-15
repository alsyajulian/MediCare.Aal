<section class="section pt-0">

    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4">

            <div>

                <small class="section-label">
                    GALERI
                </small>

                <h2 class="section-title mb-2">
                    Dokumentasi <span>MediCare</span>
                </h2>

                <p class="section-subtitle mb-0">
                    Lihat berbagai fasilitas, kegiatan, dan pelayanan
                    di MediCare Hospital.
                </p>

            </div>

            <a
                href="{{ route('gallery.index') }}"
                class="btn btn-outline-primary btn-sm"
            >
                Lihat Semua Galeri
            </a>

        </div>


        <div class="row g-3">

            @forelse ($galleries as $gallery)

                <div class="col-6 col-lg-3">

                    {{-- CARD GALERI --}}
                    <article
                        class="article-card gallery-home-card"
                        data-bs-toggle="modal"
                        data-bs-target="#galleryModal{{ $gallery->id }}"
                    >

                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="article-image"
                        >

                        <div class="article-info">

                            <small>
                                {{ $gallery->category }}
                            </small>

                            <h6>
                                {{ $gallery->title }}
                            </h6>

                            @if ($gallery->description)

                                <p>
                                    {{ $gallery->description }}
                                </p>

                            @endif

                            <span class="gallery-view-link">
                                Lihat Foto
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </article>


                    {{-- MODAL GALERI --}}
                    <div
                        class="modal fade"
                        id="galleryModal{{ $gallery->id }}"
                        tabindex="-1"
                        aria-labelledby="galleryModalLabel{{ $gallery->id }}"
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

                                    <h3 id="galleryModalLabel{{ $gallery->id }}">
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

                    <p class="text-center text-muted">
                        Belum ada dokumentasi.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<style>

    /* =================================
       GALLERY HOME CARD
    ================================= */

    .gallery-home-card {
        cursor: pointer;
    }

    .gallery-view-link {
        display: inline-block;
        margin-top: 8px;

        color: #1264c4;

        font-size: 12px;
        font-weight: 600;
    }


    /* =================================
       GALLERY MODAL
    ================================= */

    .gallery-modal-dialog {
        width: 550px !important;
        max-width: 550px !important;
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
        width: 100% !important;
        height: 240px !important;
        max-height: 240px !important;

        object-fit: cover ;
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


    /* RESPONSIVE */

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