@extends('layouts.app')

@section('title', 'Departemen & Spesialisasi - MediCare')

@section('content')

    {{-- HERO --}}
    <section class="department-hero">

        <div class="department-hero-overlay"></div>

            <div class="container position-relative">

                <div class="department-hero-content">

                    <small class="section-label">
                        DEPARTEMEN MEDIS
                    </small>

                    <h1>
                        Departemen & <span>Spesialisasi</span>
                    </h1>

                    <p>
                        Temukan layanan kesehatan dari berbagai departemen
                        dan spesialisasi yang tersedia di MediCare Hospital.
                    </p>

                </div>

            </div>

        </div>

    </section>


{{-- DEPARTMENTS GRID --}}
<section class="department-list-section">

    <div class="container">

        <div class="department-list-grid">

           @forelse ($departments as $department)

                <article class="dept-list-card">

                    {{-- IMAGE --}}
                    <div class="dept-list-card-img">

                        @if ($department->image)

                            <img
                                src="{{ asset('storage/' . $department->image) }}"
                                alt="{{ $department->name }}"
                            >

                        @else

                            <div class="dept-list-card-img-placeholder">
                                <i class="bi bi-heart-pulse"></i>
                            </div>

                        @endif

                    </div>


                    {{-- CONTENT --}}
                    <div class="dept-list-card-body">

                        <h4>{{ $department->name }}</h4>

                        <p>
                            {{ Str::limit($department->description, 80) }}
                        </p>

                        {{-- TOMBOL POPUP --}}
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#departmentModal{{ $department->id }}"
                        >
                            Pelajari selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>


                {{-- =========================
                    MODAL DETAIL DEPARTEMEN
                ========================= --}}
                <div
                    class="modal fade"
                    id="departmentModal{{ $department->id }}"
                    tabindex="-1"
                    aria-labelledby="departmentModalLabel{{ $department->id }}"
                    aria-hidden="true"
                >

                    <div class="modal-dialog modal-dialog-centered modal-lg">

                        <div class="modal-content department-modal">

                            {{-- CLOSE --}}
                            <button
                                type="button"
                                class="btn-close department-modal-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>


                            <div class="row g-0">

                                {{-- IMAGE --}}
                                <div class="col-md-5">

                                    @if ($department->image)

                                        <img
                                            src="{{ asset('storage/' . $department->image) }}"
                                            class="department-modal-image"
                                            alt="{{ $department->name }}"
                                        >

                                    @else

                                        <div class="department-modal-placeholder">
                                            <i class="bi bi-heart-pulse"></i>
                                        </div>

                                    @endif

                                </div>


                                {{-- CONTENT --}}
                                <div class="col-md-7">

                                    <div class="department-modal-body">

                                        <small>
                                            DEPARTEMEN MEDIS
                                        </small>

                                        <h3>
                                            {{ $department->name }}
                                        </h3>

                                        <p>
                                            {{ $department->description }}
                                        </p>

                                        <button
                                            type="button"
                                            class="btn btn-primary department-modal-button"
                                            data-bs-dismiss="modal"
                                        >
                                            Tutup
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="dept-list-empty">

                    <i class="bi bi-building"></i>

                    <p>Belum ada departemen.</p>

                </div>

            @endforelse

        </div>

        {{-- CTA --}}
        <div class="department-bottom mt-5">

            <div>

                <h5>
                    Butuh pemeriksaan dengan dokter?
                </h5>

                <p>
                    Lihat jadwal dokter dan pilih waktu pemeriksaan
                    yang sesuai.
                </p>

            </div>

            <a
                href="{{ route('doctors.schedule') }}"
                class="btn btn-primary"
            >
                Lihat Jadwal Dokter
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>

    </div>

</section>

@endsection


<style>

/* =================================
   DEPARTMENT HERO
================================= */

.department-hero {
    min-height: 420px;

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

.department-hero-content {
    max-width: 650px;
    padding: 75px 0;
}

.department-hero-content small {
    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}

.department-hero-content h1 {
    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}

.department-hero-content h1 span {
    color: #b13c68;
}

.department-hero-content p {
    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}


/* =================================
   LIST SECTION
================================= */

.department-list-section {
    padding: 60px 0 80px;

    background: #f8fafc;
}

.department-list-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 24px;
}


/* =================================
   CARD
================================= */

.dept-list-card {
    background: #ffffff;

    border-radius: 12px;

    overflow: hidden;

    border: 1px solid #e8edf5;

    transition: all .25s ease;
}

.dept-list-card:hover {
    transform: translateY(-5px);

    box-shadow: 0 14px 35px rgba(6, 59, 120, 0.10);

    border-color: transparent;
}


/* IMAGE */

.dept-list-card-img {
    width: 100%;
    height: 200px;

    overflow: hidden;

    background: #edf3ff;
}

.dept-list-card-img img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform .4s ease;
}

.dept-list-card:hover .dept-list-card-img img {
    transform: scale(1.05);
}

.dept-list-card-img-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(135deg, #edf3ff, #dde8fc);

    color: #1264c4;

    font-size: 40px;
}


/* BODY */

.dept-list-card-body {
    padding: 22px 20px 24px;
}

.dept-list-card-body h4 {
    color: #0f1d33;

    font-size: 16px;
    font-weight: 700;

    margin: 0 0 8px;
}

.dept-list-card-body p {
    color: #64748b;

    font-size: 12.5px;
    line-height: 1.6;

    margin: 0 0 16px;

    min-height: 40px;
}

.dept-list-card-body a {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    color: #063b78;

    font-size: 11.5px;
    font-weight: 600;

    text-decoration: none;

    transition: color .2s ease, gap .2s ease;
}

.dept-list-card-body a i {
    font-size: 12px;

    transition: transform .2s ease;
}

.dept-list-card-body a:hover {
    color: #b13c68;
    gap: 7px;
}

.dept-list-card-body a:hover i {
    transform: translateX(2px);
}


/* =================================
   EMPTY
================================= */

.dept-list-empty {
    grid-column: 1 / -1;

    text-align: center;

    padding: 60px 20px;

    color: #94a3b8;
}

.dept-list-empty i {
    font-size: 40px;
    display: block;
    margin-bottom: 12px;
}


/* =================================
   RESPONSIVE — TABLET
================================= */

@media (max-width: 992px) {

    .department-list-grid {
        grid-template-columns: repeat(2, 1fr);

        gap: 18px;
    }

    .department-hero {
        height: 340px;
    }

    .department-hero-content h1 {
        font-size: 32px;
    }

}


/* =================================
   RESPONSIVE — MOBILE
================================= */

@media (max-width: 576px) {

    .department-hero {
        height: 300px;
    }

    .department-hero-content {
        padding-bottom: 40px;
    }

    .department-hero-content h1 {
        font-size: 26px;
    }

    .department-hero-content p {
        font-size: 13px;
    }

    .department-list-section {
        padding: 40px 0 60px;
    }

    .department-list-grid {
        grid-template-columns: 1fr;

        gap: 16px;
    }

    .dept-list-card-img {
        height: 180px;
    }

}

/* =================================
   DEPARTMENT MODAL
================================= */

.department-modal {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    background: #ffffff;
}


/* CLOSE BUTTON */

.department-modal-close {
    position: absolute;
    top: 18px;
    right: 18px;

    z-index: 10;

    background-color: #ffffff;
    border-radius: 50%;

    padding: 9px;

    opacity: 1;

    box-shadow: 0 3px 12px rgba(15, 59, 115, 0.12);
}


/* IMAGE */

.department-modal-image {
    width: 100%;
    height: 100%;
    min-height: 360px;

    object-fit: cover;
    display: block;
}


.department-modal-placeholder {
    width: 100%;
    height: 100%;
    min-height: 360px;

    background: #edf3ff;

    color: #1264c4;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 55px;
}


/* CONTENT */

.department-modal-body {
    padding: 45px 40px;

    height: 100%;

    display: flex;
    flex-direction: column;
    justify-content: center;
}


.department-modal-body small {
    display: inline-block;

    color: #1264c4;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: 1.3px;

    margin-bottom: 10px;
}


.department-modal-body h3 {
    color: #063b78;

    font-size: 25px;
    font-weight: 800;

    margin-bottom: 15px;
}


.department-modal-body p {
    color: #64748b;

    font-size: 13px;
    line-height: 1.8;

    margin-bottom: 25px;
}


/* BUTTON */

.department-modal-button {
    align-self: flex-start;

    padding: 9px 22px;

    font-size: 12px;
    font-weight: 600;

    border-radius: 8px;
}


/* MOBILE */

@media (max-width: 767px) {

    .department-modal-image {
        height: 220px;
        min-height: 220px;
    }

    .department-modal-placeholder {
        min-height: 220px;
    }

    .department-modal-body {
        padding: 30px 25px;
    }

    .department-modal-body h3 {
        font-size: 21px;
    }

    .department-modal-body p {
        font-size: 12px;
    }

}


</style>