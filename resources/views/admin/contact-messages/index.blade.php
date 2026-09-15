@extends('layouts.admin')

@section('title', 'Pesan Kontak - Admin MediCare')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <span class="section-label">
            ADMIN
        </span>

        <h1 class="section-title mt-2">
            Pesan Kontak
        </h1>

        <p class="text-muted">
            Kelola pesan yang dikirim oleh pengunjung MediCare.
        </p>

    </div>


    @if (session('success'))

        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>

    @endif


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            @forelse ($messages as $message)

                <div class="p-4 border-bottom">

                    <div class="row align-items-center">

                        <div class="col-lg-9">

                            <div class="d-flex align-items-center gap-2 mb-1">

                                <h5 class="mb-0">
                                    {{ $message->name }}
                                </h5>

                                @if (!$message->is_read)

                                    <span class="badge bg-primary">
                                        Baru
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Sudah dibaca
                                    </span>

                                @endif

                            </div>


                            <p class="mb-1 fw-semibold">
                                {{ $message->subject }}
                            </p>


                            <small class="text-muted">
                                {{ $message->email }}
                                ·
                                {{ $message->created_at->format('d M Y, H:i') }}
                            </small>


                            <p class="text-muted mt-2 mb-0">

                                {{ \Illuminate\Support\Str::limit(
                                    $message->message,
                                    120
                                ) }}

                            </p>

                        </div>


                        <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">

                            <a
                                href="{{ route(
                                    'admin.contact-messages.show',
                                    $message
                                ) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                <i class="bi bi-eye me-1"></i>
                                Lihat
                            </a>


                            <form
                                action="{{ route(
                                    'admin.contact-messages.destroy',
                                    $message
                                ) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm(
                                    'Yakin ingin menghapus pesan ini?'
                                );"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">

                    <i class="bi bi-envelope fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        Belum ada pesan.
                    </h5>

                    <p class="text-muted mb-0">
                        Pesan dari pengunjung akan muncul di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection