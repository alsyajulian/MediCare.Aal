<!-- CTA -->
<section class="contact-cta">

    <div class="container text-center">

        <h3>Hubungi kami</h3>

        <p>
            Kami siap membantu memberikan informasi dan pelayanan
            kesehatan yang Anda butuhkan.
        </p>

    </div>

</section>


<!-- CONTACT -->
<section class="section contact-section">

    <div class="container">

        {{-- Pesan berhasil --}}
        @if (session('success'))

            <div class="alert alert-success mb-4">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>

        @endif


        {{-- Pesan error --}}
        @if ($errors->any())

            <div class="alert alert-danger mb-4">

                <strong>
                    Mohon periksa kembali data yang diisi.
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


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


                    <form
                        action="{{ route('contact.store') }}"
                        method="POST"
                    >

                        @csrf


                        <div class="row g-2">


                            <!-- NAMA -->
                            <div class="col-md-6">

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Nama"
                                    value="{{ old('name') }}"
                                    required
                                >

                            </div>


                            <!-- EMAIL -->
                            <div class="col-md-6">

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    required
                                >

                            </div>


                            <!-- SUBJEK -->
                            <div class="col-12">

                                <input
                                    type="text"
                                    name="subject"
                                    class="form-control"
                                    placeholder="Subjek"
                                    value="{{ old('subject') }}"
                                    required
                                >

                            </div>


                            <!-- PESAN -->
                            <div class="col-12">

                                <textarea
                                    name="message"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Pesan"
                                    required
                                >{{ old('message') }}</textarea>

                            </div>


                            <!-- BUTTON -->
                            <div class="col-12">

                                <button
                                    type="submit"
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


            <a
                href="tel:0251123456"
                class="btn btn-light btn-sm ms-auto"
            >
                Hubungi Rumah Sakit
            </a>

        </div>

    </div>

</section>