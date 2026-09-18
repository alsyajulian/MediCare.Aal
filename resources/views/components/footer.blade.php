<footer class="medicare-footer">

    <div class="container">

        <div class="row g-4">

            <!-- Brand -->
            <div class="col-lg-4">

                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo2.png') }}" alt="MediCare Hospital">
                </a>

                <p class="footer-description">
                    Memberikan pelayanan kesehatan berkualitas
                    dengan tenaga profesional dan fasilitas
                    yang mendukung kebutuhan pasien.
                </p>

                <div class="footer-social">

                    <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/smkn4kotabogor/?hl=en" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://x.com/IKA_SMKN4Bogor" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="https://www.youtube.com/@smknegeri4bogor905" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>


            <!-- Quick Links -->
            <div class="col-6 col-lg-2">

                <h6>Tautan Cepat</h6>

                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('doctors.schedule') }}">Jadwal Dokter</a></li>
                    <li><a href="{{ route('departments.index') }}">Departemen</a></li>
                    <li><a href="{{ route('services.index') }}">Layanan</a></li>
                    <li><a href="{{ route('articles.index') }}">Artikel</a></li>
                    <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
                    <li><a href="{{ route('contact.index') }}">Kontak Kami</a></li>
                </ul>

            </div>


            <!-- Services -->
            <div class="col-6 col-lg-3">

                <h6>Pelayanan Kami</h6>

                <ul>
                    <li><a href="{{ route('services.index') }}">Poli Gigi</a></li>
                    <li><a href="{{ route('services.index') }}">Medical Check Up</a></li>
                    <li><a href="{{ route('services.index') }}">Farmasi</a></li>
                    <li><a href="{{ route('services.index') }}">Radiologi</a></li>
                    <li><a href="{{ route('services.index') }}">Laboratorium</a></li>
                    <li><a href="{{ route('services.index') }}">Rawat Inap</a></li>
                    <li><a href="{{ route('services.index') }}">IGD 24 Jam</a></li>
                </ul>

            </div>


            <!-- Contact -->
            <div class="col-lg-3">

                <h6>Kontak</h6>

                <ul class="footer-contact">

                    <li>
                        <i class="bi bi-geo-alt"></i>
                        <span>
                            Jl. Kesehatan No. 10,
                            Bogor, Jawa Barat
                        </span>
                    </li>

                    <li>
                        <i class="bi bi-telephone"></i>
                        <span>
                            (0251) 123456
                        </span>
                    </li>

                    <li>
                        <i class="bi bi-envelope"></i>
                        <span>
                            info@medicare.id
                        </span>
                    </li>

                    <li>
                        <i class="bi bi-clock"></i>
                        <span>
                            Senin - Sabtu<br>
                            08.00 - 20.00
                        </span>
                    </li>

                </ul>

            </div>

        </div>

    </div>


    <!-- Bottom -->
    <div class="footer-bottom">

        <div class="container">

            <div class="d-flex flex-column flex-md-row
                        justify-content-between align-items-center gap-2">

                <span>
                    © 2026 MediCare Hospital. All rights reserved.
                </span>

                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Sitemap</a>
                </div>

                <span>
                    Pihak Terkait
                </span>

            </div>

        </div>

    </div>

</footer>