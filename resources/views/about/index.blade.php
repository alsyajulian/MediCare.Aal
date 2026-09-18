@extends('layouts.app')

@section('title', 'Tentang MediCare - MediCare Hospital')

@section('content')

{{-- =========================================================
    HERO
========================================================= --}}
<section class="about-hero">

    <div class="about-hero-overlay"></div>

    <div class="container position-relative">

        <div class="about-hero-content">

            <span class="about-label">
                TENTANG KAMI
            </span>

            <h1>
                Tentang <span>MediCare.</span>
            </h1>

            <p>
                MediCare Hospital hadir untuk memberikan pelayanan
                kesehatan yang berkualitas, aman, dan terpercaya
                dengan mengutamakan kebutuhan setiap pasien.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
    TENTANG MEDICARE
========================================================= --}}
<section class="about-intro">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- TEXT --}}
            <div class="col-lg-6">

                <span class="section-label">
                    TENTANG MEDICARE
                </span>

                <h2 class="about-title">
                    Pelayanan Kesehatan
                    <span>Berkualitas untuk Semua</span>
                </h2>

                <p>
                    MediCare Hospital merupakan fasilitas pelayanan
                    kesehatan yang berkomitmen memberikan pelayanan
                    medis secara profesional, aman, dan nyaman.
                </p>

                <p>
                    Kami mengutamakan kualitas pelayanan serta
                    kebutuhan pasien dengan didukung oleh tenaga
                    kesehatan yang kompeten dan fasilitas yang memadai.
                </p>

                <p>
                    Setiap pasien adalah bagian penting dari kami.
                    Karena itu, MediCare terus berusaha memberikan
                    pengalaman pelayanan kesehatan yang terbaik.
                </p>

            </div>


            {{-- VISI MISI --}}
            <div class="col-lg-6">

                <div class="about-info-grid">

                    {{-- VISI --}}
                    <div class="about-info-card">

                        <div class="about-info-icon">
                            <i class="bi bi-eye"></i>
                        </div>

                        <h4>
                            Visi
                        </h4>

                        <p>
                            Menjadi rumah sakit terpercaya yang
                            memberikan pelayanan kesehatan berkualitas
                            dan berorientasi pada kebutuhan pasien.
                        </p>

                    </div>


                    {{-- MISI --}}
                    <div class="about-info-card">

                        <div class="about-info-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <h4>
                            Misi
                        </h4>

                        <p>
                            Memberikan pelayanan kesehatan yang aman,
                            profesional, ramah, serta terus meningkatkan
                            kualitas tenaga medis dan fasilitas.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- {{-- =========================================================
    NILAI KAMI
========================================================= --}}
<section class="about-values">

    <div class="container">

        <div class="about-section-heading text-center">

            <span class="section-label">
                NILAI KAMI
            </span>

            <h2 class="about-section-title">
                Nilai yang Menjadi Komitmen Kami
            </h2>

            <p class="section-subtitle mx-auto">
                Prinsip yang kami pegang dalam memberikan pelayanan
                kesehatan terbaik kepada setiap pasien.
            </p>

        </div>


        <div class="row g-3">

            {{-- KEPEDULIAN --}}
            <div class="col-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-heart"></i>
                    </div>

                    <h5>
                        Kepedulian
                    </h5>

                    <p>
                        Mengutamakan kebutuhan dan kenyamanan pasien.
                    </p>

                </div>

            </div>


            {{-- PROFESIONAL --}}
            <div class="col-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h5>
                        Profesional
                    </h5>

                    <p>
                        Memberikan pelayanan dengan standar profesional.
                    </p>

                </div>

            </div>


            {{-- BERKUALITAS --}}
            <div class="col-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-star"></i>
                    </div>

                    <h5>
                        Berkualitas
                    </h5>

                    <p>
                        Terus meningkatkan kualitas pelayanan kesehatan.
                    </p>

                </div>

            </div>


            {{-- TERPERCAYA --}}
            <div class="col-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h5>
                        Terpercaya
                    </h5>

                    <p>
                        Membangun kepercayaan melalui pelayanan terbaik.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section> -->


{{-- =========================================================
    STATISTIK
========================================================= --}}
<section class="about-statistics">

    <div class="container">

        <div class="about-statistics-box">

            {{-- DOKTER --}}
            <div class="about-stat-item">

                <i class="bi bi-people"></i>

                <strong>
                    {{ $doctorCount }}+
                </strong>

                <span>
                    Dokter
                </span>

            </div>


            {{-- DEPARTEMEN --}}
            <div class="about-stat-item">

                <i class="bi bi-hospital"></i>

                <strong>
                    {{ $departmentCount }}+
                </strong>

                <span>
                    Departemen
                </span>

            </div>


            {{-- LAYANAN --}}
            <div class="about-stat-item">

                <i class="bi bi-heart-pulse"></i>

                <strong>
                    {{ $serviceCount }}+
                </strong>

                <span>
                    Layanan
                </span>

            </div>


            {{-- PENGALAMAN --}}
            <div class="about-stat-item">

                <i class="bi bi-award"></i>

                <strong>
                    20+
                </strong>

                <span>
                    Tahun Pengalaman
                </span>

            </div>


            {{-- PASIEN --}}
            <div class="about-stat-item">

                <i class="bi bi-person-check"></i>

                <strong>
                    {{ $patientCount }}+
                </strong>

                <span>
                    Pasien
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    FASILITAS
========================================================= --}}
<section class="about-facility">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- IMAGE --}}
            <div class="col-lg-6">

                <img
                    src="{{ asset('images/hospital-interior.jpg') }}"
                    alt="Fasilitas MediCare Hospital"
                    class="about-facility-image"
                >

            </div>


            {{-- TEXT --}}
            <div class="col-lg-6">

                <span class="section-label">
                    FASILITAS MEDICARE
                </span>

                <h2 class="about-title">
                    Fasilitas yang Mendukung
                    <span>Pelayanan Terbaik</span>
                </h2>

                <p>
                    MediCare menyediakan fasilitas yang dirancang
                    untuk memberikan kenyamanan dan mendukung proses
                    pelayanan kesehatan pasien.
                </p>


                <div class="facility-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Fasilitas medis yang nyaman</span>
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Tenaga medis profesional</span>
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Pelayanan kesehatan terpadu</span>
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Pelayanan yang berorientasi pada pasien</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


<style>

/* =========================================================
   GENERAL
========================================================= */

.about-intro {
    padding: 75px 0;
    background: #ffffff;
}

.about-values {
    padding: 70px 0;
    background: #f5f8fc;
}

.about-statistics {
    padding: 45px 0;
    background: #ffffff;
}

.about-facility {
    padding: 75px 0;
    background: #f3f7fc;
}

.about-cta {
    padding: 55px 0;
    background: #ffffff;
}


/* =========================================================
   HERO
========================================================= */

.about-hero {
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

.about-hero-content {
    max-width: 580px;
    padding: 65px 0;
}

.about-label,
.section-label {
    display: inline-block;

    color: #1264c4;

    font-size: 12px;
    font-weight: 700;

    letter-spacing: .7px;
}

.about-hero h1 {
    color: #063b78;

    font-size: 20px;
    font-weight: 700;

    line-height: 1.15;

    margin: 10px 0 18px;
}

.about-hero h1 span {
    color: #b13c68;
}

.about-hero p {
    max-width: 540px;

    color: #52657d;

    font-size: 14px;
    line-height: 1.7;

    margin: 0;
}


/* =========================================================
   ABOUT INTRO
========================================================= */

.about-title {
    color: #063b78;

    font-size: 32px;
    line-height: 1.25;

    font-weight: 700;

    margin: 12px 0 20px;
}

.about-title span {
    display: block;
    color: #1264c4;
}

.about-intro > .container > .row {
    align-items: center;
}

.about-intro p {
    color: #64748b;

    font-size: 14px;
    line-height: 1.8;

    max-width: 570px;

    margin-bottom: 12px;
}

.about-intro p:last-child {
    margin-bottom: 0;
}


/* =========================================================
   VISI & MISI
========================================================= */

.about-info-grid {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 18px;
}

.about-info-card {
    background: #f3f7fc;

    border-radius: 12px;

    padding: 25px;

    transition: .2s ease;
}

.about-info-card:nth-child(2) {
    background: #fffaf0;
}

.about-info-card:hover {
    transform: translateY(-3px);
}

.about-info-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;

    color: #063b78;

    border-radius: 50%;

    margin-bottom: 15px;
}

.about-info-card h4 {
    color: #063b78;

    font-size: 17px;
    font-weight: 700;

    margin-bottom: 8px;
}

.about-info-card p {
    color: #64748b;

    font-size: 12px;
    line-height: 1.7;

    margin: 0;
}


/* =========================================================
   VALUES
========================================================= */

.about-section-heading {
    max-width: 650px;

    margin: 0 auto 42px;
}

.about-section-title {
    color: #063b78;

    font-size: 30px;
    font-weight: 700;

    line-height: 1.25;

    margin: 10px 0;
}

.about-section-heading .section-subtitle {
    max-width: 540px;

    color: #64748b;

    font-size: 13px;
    line-height: 1.7;

    margin-bottom: 0;
}

.value-card {
    height: 100%;

    background: #ffffff;

    border: 1px solid #dce6f2;

    border-radius: 12px;

    padding: 24px 16px;

    text-align: center;

    transition: .2s ease;
}

.value-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 8px 22px rgba(15,59,115,.08);
}

.value-icon {
    width: 44px;
    height: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 13px;

    border-radius: 50%;

    background: #edf5ff;

    color: #1264c4;

    font-size: 18px;
}

.value-card h5 {
    color: #063b78;

    font-size: 14px;
    font-weight: 700;

    margin-bottom: 8px;
}

.value-card p {
    color: #64748b;

    font-size: 11px;
    line-height: 1.6;

    margin: 0;
}


/* =========================================================
   STATISTICS
========================================================= */

.about-statistics-box {
    display: grid;

    grid-template-columns: repeat(5, 1fr);

    background: #ffffff;

    border: 1px solid #dce6f2;

    border-radius: 12px;

    box-shadow:
        0 8px 25px rgba(15,59,115,.06);

    overflow: hidden;
}

.about-stat-item {
    min-height: 110px;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    position: relative;

    text-align: center;

    padding: 15px 10px;
}

.about-stat-item:not(:last-child)::after {
    content: "";

    position: absolute;

    right: 0;
    top: 25%;

    width: 1px;
    height: 50%;

    background: #dce6f2;
}

.about-stat-item i {
    color: #1264c4;

    font-size: 20px;

    margin-bottom: 5px;
}

.about-stat-item strong {
    color: #063b78;

    font-size: 19px;
    font-weight: 700;
}

.about-stat-item span {
    color: #475569;

    font-size: 12px;

    margin-top: 2px;
}


/* =========================================================
   FACILITY
========================================================= */

.about-facility-image {
    width: 100%;
    height: 310px;

    object-fit: cover;

    border-radius: 12px;

    display: block;
}

.about-facility p {
    color: #64748b;

    font-size: 14px;
    line-height: 1.8;

    max-width: 550px;
}

.facility-list {
    margin-top: 20px;
}

.facility-list div {
    display: flex;
    align-items: center;

    gap: 10px;

    color: #334155;

    font-size: 13px;

    margin-bottom: 13px;
}

.facility-list div:last-child {
    margin-bottom: 0;
}

.facility-list i {
    color: #1264c4;

    font-size: 14px;
}


/* =========================================================
   CTA
========================================================= */

.about-cta-box {
    background: #f1f6fc;

    border-radius: 12px;

    padding: 28px 32px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;
}

.about-cta-box h3 {
    color: #063b78;

    font-size: 21px;
    font-weight: 700;

    margin-bottom: 5px;
}

.about-cta-box p {
    color: #64748b;

    font-size: 13px;

    margin: 0;
}

.btn-about-primary,
.btn-about-outline {
    border-radius: 7px;

    padding: 10px 18px;

    font-size: 13px;

    text-decoration: none;

    transition: .2s ease;
}

.btn-about-primary {
    background: #1264c4;
    color: #ffffff;
}

.btn-about-primary:hover {
    background: #063b78;
    color: #ffffff;
}

.btn-about-outline {
    border: 1px solid #1264c4;

    color: #1264c4;

    background: #ffffff;
}

.btn-about-outline:hover {
    background: #1264c4;
    color: #ffffff;
}


/* =========================================================
   RESPONSIVE — TABLET
========================================================= */

@media (max-width: 992px) {

    .about-hero h1 {
        font-size: 40px;
    }

    .about-info-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .about-statistics-box {
        grid-template-columns: repeat(3, 1fr);
    }

    .about-stat-item:nth-child(3)::after {
        display: none;
    }

    .about-facility-image {
        height: 280px;
    }

}


/* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

@media (max-width: 768px) {

    .about-hero {
        min-height: 350px;
    }

    .about-hero-content {
        padding: 55px 0;
    }

    .about-hero h1 {
        font-size: 34px;
    }

    .about-hero p {
        font-size: 13px;
    }

    .about-intro {
        padding: 60px 0;
    }

    .about-values {
        padding: 60px 0;
    }

    .about-facility {
        padding: 60px 0;
    }

    .about-info-grid {
        grid-template-columns: 1fr;
    }

    .about-statistics-box {
        grid-template-columns: repeat(2, 1fr);
    }

    .about-stat-item:nth-child(2)::after,
    .about-stat-item:nth-child(4)::after {
        display: none;
    }

    .about-facility-image {
        height: 250px;
    }

    .about-cta-box {
        flex-direction: column;

        align-items: flex-start;

        padding: 25px;
    }

}


/* =========================================================
   RESPONSIVE — SMALL MOBILE
========================================================= */

@media (max-width: 576px) {

    .about-hero {
        min-height: 320px;
    }

    .about-hero h1 {
        font-size: 29px;
    }

    .about-hero p {
        font-size: 12.5px;
    }

    .about-title {
        font-size: 27px;
    }

    .about-section-title {
        font-size: 26px;
    }

    .about-statistics {
        padding: 35px 0;
    }

    .about-stat-item {
        min-height: 100px;
    }

    .about-stat-item strong {
        font-size: 17px;
    }

    .about-stat-item span {
        font-size: 11px;
    }

    .about-facility-image {
        height: 220px;
    }

    .about-cta-box h3 {
        font-size: 18px;
    }

    .about-cta-box p {
        font-size: 12px;
    }

}

</style>