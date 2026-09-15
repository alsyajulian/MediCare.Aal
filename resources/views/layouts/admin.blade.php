<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin MediCare')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --primary: #063b78;
            --primary-light: #1264c4;
            --soft-blue: #eef6ff;
            --background: #f6f9fd;
            --border: #e5edf6;
            --text: #172b4d;
            --muted: #718096;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: Arial, sans-serif;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .admin-sidebar {

            position: fixed;

            inset: 0 auto 0 0;

            width: 250px;

            height: 100vh;

            padding: 24px 16px;

            background: var(--primary);

            color: white;

            overflow-y: auto;

            z-index: 1000;
        }


        .admin-logo {

            display: flex;

            align-items: center;

            gap: 8px;

            margin: 0 10px 35px;

            font-size: 22px;

            font-weight: 700;

            position: relative;
        }


        .admin-logo i {
            font-size: 25px;
        }


        .admin-logo span {

            display: block;

            position: absolute;

            margin-top: 38px;

            margin-left: 34px;

            font-size: 8px;

            letter-spacing: 2.5px;

            opacity: .65;
        }


        .sidebar-title {

            margin: 0 12px 8px;

            color: rgba(255,255,255,.45);

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .sidebar-link {

            display: flex;

            align-items: center;

            gap: 12px;

            width: 100%;

            padding: 11px 13px;

            margin-bottom: 4px;

            border: 0;

            border-radius: 9px;

            background: transparent;

            color: rgba(255,255,255,.82);

            text-decoration: none;

            font-size: 13px;

            transition: .2s ease;
        }


        .sidebar-link i {

            width: 20px;

            text-align: center;

            font-size: 16px;
        }


        .sidebar-link:hover,
        .sidebar-link.active {

            background: var(--primary-light);

            color: white;
        }


        .sidebar-divider {

            height: 1px;

            margin: 18px 8px;

            background: rgba(255,255,255,.1);
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .admin-content {

            min-height: 100vh;

            margin-left: 250px;

            padding: 30px 34px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 992px) {

            .admin-sidebar {
                width: 220px;
            }

            .admin-content {

                margin-left: 220px;

                padding: 25px;
            }

        }


        @media (max-width: 768px) {

            .admin-sidebar {

                position: relative;

                width: 100%;

                height: auto;
            }


            .admin-content {

                margin-left: 0;

                padding: 20px 15px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


    {{-- =========================
         SIDEBAR
    ========================= --}}

    <aside class="admin-sidebar">


        {{-- LOGO --}}

        <div class="admin-logo">

            <i class="bi bi-plus-lg"></i>

            MediCare

            <span>
                HOSPITAL
            </span>

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