@extends('layouts.app')

@section('title', 'Kontak - MediCare')

@section('content')

    {{-- HERO --}}
    <section class="contact-hero">

        <div class="contact-hero-overlay"></div>

            <div class="container position-relative">

                <div class="contact-hero-content">

                    <small>
                        HUBUNGI KAMI
                    </small>

                    <h1 class="section-title mt-2">
                        Kontak <span>MediCare</span>
                    </h1>

                    <p>
                        Hubungi kami untuk mendapatkan informasi mengenai
                        layanan dan pelayanan kesehatan MediCare Hospital.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <section class="section contact-info-section">

        <div class="container">

        <!-- Contact Info -->
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <div>
                        <h6>Alamat</h6>
                        <p>
                            Jl. Kesehatan No. 10,
                            Bogor, Jawa Barat
                        </p>
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>

                    <div>
                        <h6>Telepon</h6>
                        <p>
                            (0251) 123456
                            <br>
                            0812-3456-7890
                        </p>
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <div>
                        <h6>Email</h6>
                        <p>
                            info@medicare.id
                            <br>
                            admin@medicare.id
                        </p>
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-clock"></i>
                    </div>

                    <div>
                        <h6>Jam Operasional</h6>
                        <p>
                            Senin - Sabtu
                            <br>
                            08.00 - 20.00
                        </p>
                    </div>

                </div>
            </div>

        </div>


        <!-- Map + Form -->
        <div class="row g-4">

            <!-- MAP -->
            <div class="col-lg-6">

                <div class="contact-box">

                    <h6 class="contact-box-title">
                        Lokasi Kami
                    </h6>

                    <div class="map-placeholder">

                        <div class="map-placeholder">

                            <iframe
                                src="https://www.google.com/maps?q=SMKN+4+Bogor&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                        </div>

                    </div>

                    <div class="location-address">

                        <i class="bi bi-geo-alt"></i>

                        <div>
                            <strong>
                                Rumah Sakit MediCare
                            </strong>

                            <p>
                                Jl. Kesehatan No. 10,
                                Bogor, Jawa Barat
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- FORM -->
            <div class="col-lg-6">

                <div class="contact-box">

                    <h6 class="contact-box-title">
                        Kirim pesan kepada kami
                    </h6>

                    <form>

                        <div class="row g-2">

                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Nama"
                                >
                            </div>

                            <div class="col-md-6">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                >
                            </div>

                            <div class="col-12">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Subjek"
                                >
                            </div>

                            <div class="col-12">
                                <textarea
                                    class="form-control"
                                    rows="5"
                                    placeholder="Pesan"
                                ></textarea>
                            </div>

                            <div class="col-12">

                                <button
                                    type="button"
                                    class="btn btn-contact-submit"
                                >
                                    <i class="bi bi-send me-2"></i>
                                    Kirim Pesan
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- Emergency -->
        <div class="emergency-box mt-4">

            <div class="emergency-icon">
                <i class="bi bi-telephone-plus"></i>
            </div>

            <div>

                <h6>
                    Butuh bantuan?
                </h6>

                <p>
                    Hubungi layanan kami untuk mendapatkan
                    informasi dan bantuan lebih lanjut.
                </p>

            </div>

            <a href="#" class="btn btn-light btn-sm ms-auto">
                Hubungi Rumah Sakit
            </a>

        </div>

    </div>

</section>

@endsection


<style>

/* =================================
   DEPARTMENT HERO
================================= */

.contact-hero {
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

.contact-hero-content {
    max-width: 650px;
    padding: 75px 0;
}

.contact-hero-content small {
    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}

.contact-hero-content h1 {
    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}

.contact-hero-content h1 span {
    color: #b13c68;
}

.contact-hero-content p {
    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}
</style>