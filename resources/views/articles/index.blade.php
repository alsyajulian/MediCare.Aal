@extends('layouts.app')

@section('title', 'Artikel Kesehatan - MediCare')

@section('content')


{{-- =========================================
     HERO
========================================= --}}

<section class="department-hero">

    <div class="department-hero-overlay"></div>

    <div class="container position-relative">

        <div class="department-hero-content">

            <small>
                ARTIKEL KESEHATAN
            </small>

            <h1 class="section-title mt-2">
                Informasi & <span>Artikel Kesehatan</span>
            </h1>

            <p>
                Temukan informasi dan tips kesehatan untuk membantu
                Anda menjaga kesehatan setiap hari.
            </p>

        </div>

    </div>

</section>



{{-- =========================================
     DAFTAR ARTIKEL
========================================= --}}

<section class="section articles-page">

    <div class="container">

        <div class="row g-4">

            @forelse ($articles as $article)

                <div class="col-md-6 col-lg-4">

                    <article class="article-page-card">


                        {{-- GAMBAR --}}

                        <div class="article-image">

                            @if ($article->image)

                                <img
                                    src="{{ asset('storage/' . $article->image) }}"
                                    alt="{{ $article->title }}"
                                    class="article-image"
                                >

                            @else

                                <img
                                    src="{{ asset('images/articles/article-1.jpg') }}"
                                    alt="{{ $article->title }}"
                                    class="article-image"
                                >

                            @endif

                        </div>



                        {{-- CONTENT --}}

                        <div class="article-content">

                            <span class="article-category">
                                {{ $article->category }}
                            </span>


                            <h4>
                                {{ $article->title }}
                            </h4>


                            <p>
                                {{ Str::limit($article->excerpt, 120) }}
                            </p>


                            {{-- BUKA MODAL --}}

                            <a
                                href="#"
                                class="article-link"
                                data-bs-toggle="modal"
                                data-bs-target="#articleModal{{ $article->id }}"
                            >
                                Baca Selengkapnya

                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                </div>



                {{-- =================================
                     MODAL ARTIKEL
                ================================= --}}

                    <div
                        class="modal fade"
                        id="articleModal{{ $article->id }}"
                        tabindex="-1"
                        aria-labelledby="articleModalLabel{{ $article->id }}"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog article-modal-dialog modal-dialog-centered">

                            <div class="modal-content article-modal">

                                {{-- CLOSE --}}
                                <div class="modal-header border-0">

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>

                                </div>


                                {{-- GAMBAR --}}
                                @if ($article->image)

                                    <img
                                        src="{{ asset('storage/' . $article->image) }}"
                                        alt="{{ $article->title }}"
                                        class="article-modal-image"
                                    >

                                @else

                                    <img
                                        src="{{ asset('images/articles/article-1.jpg') }}"
                                        alt="{{ $article->title }}"
                                        class="article-modal-image"
                                    >

                                @endif


                                {{-- CONTENT --}}
                                <div class="modal-body">

                                    <span class="article-modal-label">
                                        {{ strtoupper($article->category) }}
                                    </span>

                                    <h3 id="articleModalLabel{{ $article->id }}">
                                        {{ $article->title }}
                                    </h3>

                                    @if ($article->published_at)

                                        <small class="text-muted d-block mb-3">

                                            <i class="bi bi-calendar3 me-1"></i>

                                            {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}

                                        </small>

                                    @endif

                                    <p class="article-modal-text">
                                        {!! nl2br(e($article->content)) !!}
                                    </p>

                                </div>

                            </div>

                        </div>
                        
                    </div>

                @empty


                {{-- BELUM ADA ARTIKEL --}}

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="bi bi-newspaper fs-1 text-secondary"></i>

                        <h5 class="mt-3">
                            Belum ada artikel
                        </h5>

                        <p class="text-muted mb-0">
                            Artikel kesehatan belum tersedia.
                        </p>

                    </div>

                </div>


            @endforelse

        </div>

    </div>

</section>


@endsection



<style>

/* =================================
   ARTICLE HERO
================================= */

.department-hero {
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


.department-hero-content {
    max-width: 650px;

    padding: 75px 0;
}


.department-hero-content small {
    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}


.department-hero-content h1 {
    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}


.department-hero-content h1 span {
    color: #b13c68;
}


.department-hero-content p {
    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}


/* =================================
   ARTICLE MODAL
================================= */

.article-modal-dialog {
        width: 700px ;
        margin: 1.75rem auto ;
    }

    .article-modal {
        border: none ;
        border-radius: 16px ;
        overflow: hidden ;
        box-shadow: 0 20px 60px rgba(6, 59, 120, 0.20) ;
    }

    .article-modal-image {
        width: 100% ;
        height: 220px ;
        object-fit: cover ;
        display: block ;
    }

    .article-modal .modal-header {
        position: absolute ;
        top: 0 ;
        right: 0 ;
        z-index: 10 ;
        padding: 0 ;
        border: 0 ;
    }

    .article-modal .modal-header {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 10;

        padding: 0 !important;
        border: none !important;
    }

    .article-modal .btn-close {
        width: 38px !important;
        height: 38px !important;

        padding: 0 !important;
        margin: 10px !important;

        background-color: #ffffff !important;
        border-radius: 50% !important;

        opacity: 1 !important;

        background-size: 14px 14px !important;
        background-position: center !important;
        background-repeat: no-repeat !important;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);

        display: flex !important;
        align-items: center;
        justify-content: center;

        border: none !important;
    }

    .article-modal .modal-body {
        padding: 25px 28px 30px;
    }

    .article-modal-label {
        display: block ;
        font-size: 10px ;
        font-weight: 700 ;
        letter-spacing: 1px ;
        color: #1264c4 ;
    }

    .article-modal h3 {
        color: #063b78 ;
        font-size: 24px ;
        font-weight: 700 ;
        margin: 8px 0 12px ;
    }

    .article-modal-text {
        color: #64748b ;
        font-size: 13px ;
        line-height: 1.7 ;
        margin: 0 ;
    }

    @media (max-width: 576px) {
        .article-modal-dialog {
            width: auto ;
            max-width: calc(100% - 24px) ;
            margin: 12px auto ;
        }

        .article-modal-image {
            height: 190px ;
            max-height: 190px ;
        }

        .article-modal .modal-body {
            padding: 20px ;
        }
    }

/* RESPONSIVE */

@media (max-width: 576px) {

    .article-modal-dialog {
        max-width: calc(100% - 24px);
        margin: 12px auto;
    }

    .article-modal-image {
        height: 200px;
    }

    .article-modal .modal-body {
        padding: 20px;
    }

    .article-modal h3 {
        font-size: 21px;
    }

}

</style>