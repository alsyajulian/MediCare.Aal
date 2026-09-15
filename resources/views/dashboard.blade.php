<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - MediCare</title>

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
           MAIN
        ========================= */

        .admin-content {
            min-height: 100vh;
            margin-left: 250px;
            padding: 30px 34px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .page-label {
            display: inline-block;
            margin-bottom: 6px;
            color: var(--primary-light);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .page-title {
            margin: 0;
            color: var(--primary);
            font-size: 27px;
            font-weight: 700;
        }

        .page-subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .admin-profile-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--soft-blue);
            color: var(--primary-light);
            font-size: 17px;
        }

        .admin-profile small {
            display: block;
            color: var(--muted);
            font-size: 10px;
        }

        .admin-profile strong {
            font-size: 12px;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stat-card {
            height: 100%;
            padding: 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(15, 59, 115, .04);
            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(15, 59, 115, .08);
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }

        .stat-number {
            margin: 8px 0 0;
            color: var(--primary);
            font-size: 28px;
            font-weight: 700;
            line-height: 1;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: var(--soft-blue);
            color: var(--primary-light);
            font-size: 19px;
        }

        .stat-link {
            display: inline-block;
            margin-top: 18px;
            color: var(--primary-light);
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .stat-link:hover {
            color: var(--primary);
        }

        /* =========================
           SECTION CARD
        ========================= */

        .content-card {
            height: 100%;
            padding: 22px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(15, 59, 115, .04);
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .section-heading h5 {
            margin: 0;
            color: var(--primary);
            font-size: 16px;
            font-weight: 700;
        }

        .section-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .section-heading a {
            color: var(--primary-light);
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        /* =========================
           WELCOME
        ========================= */

        .welcome-card {
            position: relative;
            overflow: hidden;
            padding: 23px 26px;
            background: linear-gradient(135deg, #eef6ff, #ffffff);
            border: 1px solid #dceafb;
            border-radius: 14px;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            right: -60px;
            top: -70px;
            border-radius: 50%;
            background: rgba(18,100,196,.06);
        }

        .welcome-card h5 {
            position: relative;
            z-index: 1;
            margin-bottom: 6px;
            color: var(--primary);
            font-size: 16px;
            font-weight: 700;
        }

        .welcome-card p {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        /* =========================
           ACTIVITY
        ========================= */

        .activity-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #edf2f7;
        }

        .activity-item:last-child {
            border-bottom: 0;
        }

        .activity-icon {
            flex: 0 0 40px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--soft-blue);
            color: var(--primary-light);
        }

        .activity-main {
            min-width: 0;
            flex: 1;
        }

        .activity-name {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 3px;
            font-size: 12px;
            font-weight: 700;
        }

        .activity-subject {
            margin-bottom: 2px;
            color: #334155;
            font-size: 11px;
            font-weight: 600;
        }

        .activity-message {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.4;
        }

        .activity-date {
            color: var(--muted);
            font-size: 10px;
            white-space: nowrap;
        }

        .new-badge {
            padding: 3px 7px;
            border-radius: 20px;
            background: #eaf3ff;
            color: var(--primary-light);
            font-size: 9px;
            font-weight: 700;
        }

        /* =========================
           ADMIN INFO
        ========================= */

        .info-row {
            padding: 13px 0;
            border-bottom: 1px solid #edf2f7;
        }

        .info-row:last-child {
            border-bottom: 0;
        }

        .info-row small {
            display: block;
            margin-bottom: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .info-row strong {
            color: var(--text);
            font-size: 12px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #eaf8ef;
            color: #198754;
            font-size: 9px;
            font-weight: 700;
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

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .admin-profile {
                display: none;
            }

            .page-title {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar">

        <div class="admin-logo">
            <i class="bi bi-plus-lg"></i>
            MediCare
            <span>HOSPITAL</span>
        </div>

        <div class="sidebar-title">
            Menu Utama
        </div>

        <a href="{{ route('dashboard') }}" class="sidebar-link active">
            <i class="bi bi-grid"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.doctors.index') }}" class="sidebar-link">
            <i class="bi bi-person-badge"></i>
            Dokter
        </a>

        <a href="{{ route('admin.doctor-schedules.index') }}" class="sidebar-link">
            <i class="bi bi-calendar3"></i>
            Jadwal Dokter
        </a>

        <a href="{{ route('admin.departments.index') }}" class="sidebar-link">
            <i class="bi bi-building"></i>
            Departemen
        </a>

        <a href="{{ route('admin.services.index') }}" class="sidebar-link">
            <i class="bi bi-heart-pulse"></i>
            Layanan
        </a>

        <a href="{{ route('admin.registrations.index') }}" class="sidebar-link">
            <i class="bi bi-clipboard-check"></i>
            Pendaftaran Pasien
        </a>

        <a href="{{ route('admin.articles.index') }}" class="sidebar-link">
            <i class="bi bi-newspaper"></i>
            Artikel
        </a>

        <a href="{{ route('galleries.index') }}" class="sidebar-link">
            <i class="bi bi-images"></i>
            Galeri
        </a>

        <div class="sidebar-divider"></div>

        <div class="sidebar-title">
            Komunikasi
        </div>

        <a href="{{ route('admin.contact-messages.index') }}" class="sidebar-link">
            <i class="bi bi-envelope"></i>
            Pesan Kontak

            @if ($unreadMessages > 0)
                <span class="badge bg-danger ms-auto">
                    {{ $unreadMessages }}
                </span>
            @endif
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
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


    {{-- MAIN CONTENT --}}
    <main class="admin-content">

        {{-- HEADER --}}
        <div class="topbar">

            <div>
                <span class="page-label">
                    Admin Panel
                </span>

                <h1 class="page-title">
                    Dashboard
                </h1>

                <p class="page-subtitle">
                    Kelola sistem MediCare Hospital dengan mudah.
                </p>
            </div>

            <div class="admin-profile">

                <div class="admin-profile-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>
                    <small>
                        Login sebagai
                    </small>

                    <strong>
                        Administrator
                    </strong>
                </div>

            </div>

        </div>


        {{-- STATISTICS --}}
        <div class="row g-3 mb-4">

            {{-- PESAN --}}
            <div class="col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>
                            <div class="stat-label">
                                Pesan Belum Dibaca
                            </div>

                            <div class="stat-number">
                                {{ $unreadMessages }}
                            </div>
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                    </div>

                    <a
                        href="{{ route('admin.contact-messages.index') }}"
                        class="stat-link"
                    >
                        Lihat Pesan →
                    </a>

                </div>

            </div>


            {{-- DOKTER --}}
            <div class="col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>
                            <div class="stat-label">
                                Total Dokter
                            </div>

                            <div class="stat-number">
                                {{ $totalDoctors }}
                            </div>
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>

                    </div>

                    <a
                        href="{{ route('admin.doctors.index') }}"
                        class="stat-link"
                    >
                        Kelola Dokter →
                    </a>

                </div>

            </div>


            {{-- DEPARTEMEN --}}
            <div class="col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>
                            <div class="stat-label">
                                Total Departemen
                            </div>

                            <div class="stat-number">
                                {{ $totalDepartments }}
                            </div>
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-building"></i>
                        </div>

                    </div>

                    <a
                        href="{{ route('admin.departments.index') }}"
                        class="stat-link"
                    >
                        Kelola Departemen →
                    </a>

                </div>

            </div>


            {{-- LAYANAN --}}
            <div class="col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-top">

                        <div>
                            <div class="stat-label">
                                Total Layanan
                            </div>

                            <div class="stat-number">
                                {{ $totalServices }}
                            </div>
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>

                    </div>

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="stat-link"
                    >
                        Kelola Layanan →
                    </a>

                </div>

            </div>

        </div>


        {{-- WELCOME --}}
        <div class="welcome-card mb-4">

            <h5>
                Selamat datang di Admin MediCare 👋
            </h5>

            <p>
                Kelola data dokter, jadwal praktik, departemen,
                layanan, artikel kesehatan, pendaftaran pasien,
                galeri, dan pesan dari pengunjung melalui dashboard ini.
            </p>

        </div>


        {{-- AKTIVITAS --}}
        <div class="row g-4">

            {{-- PESAN TERBARU --}}
            <div class="col-lg-8">

                <div class="content-card">

                    <div class="section-heading">

                        <div>
                            <h5>
                                Pesan Terbaru
                            </h5>

                            <p>
                                Pesan terbaru dari pengunjung MediCare
                            </p>
                        </div>

                        <a href="{{ route('admin.contact-messages.index') }}">
                            Lihat Semua →
                        </a>

                    </div>


                    @forelse ($latestMessages as $message)

                        <div class="activity-item">

                            <div class="activity-icon">
                                <i class="bi bi-envelope"></i>
                            </div>

                            <div class="activity-main">

                                <div class="activity-name">

                                    {{ $message->name }}

                                    @if (!$message->is_read)
                                        <span class="new-badge">
                                            BARU
                                        </span>
                                    @endif

                                </div>

                                <div class="activity-subject">
                                    {{ $message->subject }}
                                </div>

                                <div class="activity-message">
                                    {{ \Illuminate\Support\Str::limit($message->message, 70) }}
                                </div>

                            </div>

                            <div class="activity-date">
                                {{ $message->created_at->format('d M') }}
                            </div>

                        </div>

                    @empty

                        <div class="text-center py-4">

                            <i class="bi bi-envelope-open fs-2 text-muted"></i>

                            <p class="text-muted mt-2 mb-0 small">
                                Belum ada pesan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- INFORMASI ADMIN --}}
            <div class="col-lg-4">

                <div class="content-card">

                    <div class="section-heading">

                        <div>
                            <h5>
                                Informasi Admin
                            </h5>

                            <p>
                                Informasi sistem
                            </p>
                        </div>

                    </div>


                    <div class="info-row">

                        <small>
                            Sistem
                        </small>

                        <strong>
                            MediCare Hospital
                        </strong>

                    </div>


                    <div class="info-row">

                        <small>
                            Status
                        </small>

                        <span class="status-badge">
                            <i class="bi bi-check-circle me-1"></i>
                            Sistem Aktif
                        </span>

                    </div>


                    <div class="info-row">

                        <small>
                            Akses
                        </small>

                        <strong>
                            Administrator
                        </strong>

                    </div>

                </div>

            </div>

        </div>


        {{-- PENDAFTARAN PASIEN --}}
        <div class="content-card mt-4">

            <div class="section-heading">

                <div>
                    <h5>
                        Pendaftaran Pasien Terbaru
                    </h5>

                    <p>
                        Daftar pasien yang baru melakukan pendaftaran
                    </p>
                </div>

                <a href="{{ route('admin.registrations.index') }}">
                    Lihat Semua →
                </a>

            </div>


            @forelse ($latestRegistrations as $registration)

                <div class="activity-item">

                    <div class="activity-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>

                    <div class="activity-main">

                        <div class="activity-name">
                            {{ $registration->name }}
                        </div>

                        <div class="activity-message">

                            {{ $registration->phone }}

                            @if ($registration->service)
                                · {{ $registration->service->name }}
                            @endif

                        </div>

                    </div>

                    <div class="activity-date">
                        {{ $registration->created_at->format('d M Y') }}
                    </div>

                </div>

            @empty

                <div class="text-center py-4">

                    <i class="bi bi-clipboard fs-2 text-muted"></i>

                    <p class="text-muted mt-2 mb-0 small">
                        Belum ada pendaftaran pasien.
                    </p>

                </div>

            @endforelse

        </div>

    </main>

</body>

</html>

