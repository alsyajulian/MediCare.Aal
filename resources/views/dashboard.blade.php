@extends('layouts.admin')

@section('title', 'Dashboard Admin - MediCare')

@section('content')
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

@endsection

