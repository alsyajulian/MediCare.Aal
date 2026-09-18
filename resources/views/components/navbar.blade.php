<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <!-- <a class="navbar-brand" href="/">
            <i class="bi bi-heart-pulse-fill"></i>
            Medi<span>Care</span>
        </a> -->

        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo2.png') }}" alt="MediCare Hospital">
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav mx-auto">

                {{-- BERANDA --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        Beranda
                    </a>
                </li>


                {{-- TENTANG --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}"
                    >
                        Tentang
                    </a>
                </li>


                {{-- JADWAL DOKTER --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('doctors.schedule') ? 'active' : '' }}"
                        href="{{ route('doctors.schedule') }}"
                    >
                        Jadwal Dokter
                    </a>
                </li>


                {{-- DEPARTEMEN --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}"
                        href="{{ route('departments.index') }}"
                    >
                        Departemen
                    </a>
                </li>


                {{-- LAYANAN --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}"
                        href="{{ route('services.index') }}"
                    >
                        Layanan
                    </a>
                </li>


                {{-- ARTIKEL --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}"
                        href="{{ route('articles.index') }}"
                    >
                        Artikel
                    </a>
                </li>


                {{-- GALERI --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}"
                    >
                        Galeri
                    </a>
                </li>


                {{-- KONTAK --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}"
                        href="{{ route('contact.index') }}"
                    >
                        Kontak
                    </a>
                </li>

            </ul>

            <!-- <a href="{{ route('login') }}" class="btn btn-primary">
                Masuk
            </a> -->

        </div>
    </div>

</nav>

<style>
.navbar .btn-primary {

    padding: 8px 20px;
    font-size: 15px;
    line-height: 1.5;
    height: auto;
}

.navbar-brand img {
    height: 42px;
    width: auto;
    display: block;
}
</style>