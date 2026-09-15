@extends('layouts.admin')

@section('title', 'Detail Pesan - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <a
            href="{{ route('admin.contact-messages.index') }}"
            class="text-decoration-none"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Pesan Kontak
        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-start mb-4">

                <div>

                    <span class="section-label">
                        PESAN KONTAK
                    </span>

                    <h2 class="mt-2 mb-1">
                        {{ $contactMessage->subject }}
                    </h2>

                    <p class="text-muted mb-0">
                        {{ $contactMessage->created_at->format(
                            'd M Y, H:i'
                        ) }}
                    </p>

                </div>

                <span class="badge bg-success">
                    Sudah dibaca
                </span>

            </div>


            <hr>


            <div class="mb-4">

                <h6 class="text-muted">
                    Pengirim
                </h6>

                <p class="mb-1 fw-semibold">
                    {{ $contactMessage->name }}
                </p>

                <p class="mb-0">
                    <i class="bi bi-envelope me-1"></i>
                    {{ $contactMessage->email }}
                </p>

            </div>


            <div>

                <h6 class="text-muted">
                    Pesan
                </h6>

                <p style="white-space: pre-line;">
                    {{ $contactMessage->message }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection