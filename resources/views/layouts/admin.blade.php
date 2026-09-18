<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin MediCare')
    </title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    @vite('resources/css/admin.css')

    

</head>


<body>


    {{-- =========================
         SIDEBAR
    ========================= --}}

    <aside class="admin-sidebar">


        {{-- LOGO --}}

        <div class="admin-logo">
            <img src="{{ asset('images/logo5.png') }}" alt="MediCare Hospital">
        </div>


        {{-- MENU UTAMA --}}

        <div class="sidebar-title">
            Menu Utama
        </div>


        {{-- DASHBOARD --}}

        <a
            href="{{ route('dashboard') }}"
            class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >

            <i class="bi bi-grid"></i>

            Dashboard

        </a>


        {{-- DOKTER --}}

        <a
            href="{{ route('admin.doctors.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}"
        >

            <i class="bi bi-person-badge"></i>

            Dokter

        </a>


        {{-- JADWAL DOKTER --}}

        <a
            href="{{ route('admin.doctor-schedules.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.doctor-schedules.*') ? 'active' : '' }}"
        >

            <i class="bi bi-calendar3"></i>

            Jadwal Dokter

        </a>


        {{-- DEPARTEMEN --}}

        <a
            href="{{ route('admin.departments.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}"
        >

            <i class="bi bi-building"></i>

            Departemen

        </a>


        {{-- LAYANAN --}}

        <a
            href="{{ route('admin.services.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
        >

            <i class="bi bi-heart-pulse"></i>

            Layanan

        </a>


        {{-- PENDAFTARAN PASIEN --}}

        <a
            href="{{ route('admin.registrations.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}"
        >

            <i class="bi bi-clipboard-check"></i>

            Pendaftaran Pasien

        </a>


        {{-- ARTIKEL --}}

        <a
            href="{{ route('admin.articles.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
        >

            <i class="bi bi-newspaper"></i>

            Artikel

        </a>


        {{-- GALERI --}}

        <a
            href="{{ route('galleries.index') }}"
            class="sidebar-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}"
        >

            <i class="bi bi-images"></i>

            Galeri

        </a>


        {{-- PEMBATAS --}}

        <div class="sidebar-divider"></div>


        {{-- KOMUNIKASI --}}

        <div class="sidebar-title">
            Komunikasi
        </div>


        {{-- PESAN KONTAK --}}

        <a
            href="{{ route('admin.contact-messages.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}"
        >

            <i class="bi bi-envelope"></i>

            Pesan Kontak

            @if(isset($unreadMessages) && $unreadMessages > 0)

                <span class="badge bg-danger ms-auto">

                    {{ $unreadMessages }}

                </span>

            @endif

        </a>


        {{-- LOGOUT --}}

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="mt-4"
        >

            @csrf

            <button
                type="submit"
                class="sidebar-link"
            >

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>

        </form>


    </aside>


    {{-- =========================
         MAIN CONTENT
    ========================= --}}

    <main class="admin-content">

        @yield('content')

    </main>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


    @stack('scripts')

</body>

</html>