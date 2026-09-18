@extends('layouts.app')

@section('title', 'Artikel Kesehatan - MediCare')

@section('content')


{{-- =========================================
     HERO
========================================= --}}
@if (!request('category'))
<section class="article-hero">

    <div class="article-hero-overlay"></div>

    <div class="container position-relative">

        <div class="article-hero-content">

            <small>
                ARTIKEL KESEHATAN
            </small>

            <h1>
                Informasi & <span>Artikel Kesehatan</span>
            </h1>

            <p>
                Temukan informasi dan tips kesehatan untuk membantu
                Anda menjaga kesehatan setiap hari.
            </p>

        </div>

    </div>

</section>
@endif


{{-- =========================================
     DAFTAR ARTIKEL
========================================= --}}

<section class="section articles-page">

    <div class="container">

        @if ($articles->count())


            {{-- =================================
                 AREA UTAMA
            ================================= --}}

            <div class="articles-layout">


                {{-- =================================
                     KOLOM ARTIKEL
                ================================= --}}

                <div class="articles-main">


                    {{-- =================================
                         FEATURED ARTICLE
                    ================================= --}}

                    @php
                        $featuredArticle = $articles->first();
                    @endphp

                    <article class="featured-article">


                        {{-- GAMBAR --}}

                        <div class="featured-image">

                            @if ($featuredArticle->image)

                                <img
                                    src="{{ asset('storage/' . $featuredArticle->image) }}"
                                    alt="{{ $featuredArticle->title }}"
                                >

                            @else

                                <img
                                    src="{{ asset('images/articles/article-1.jpg') }}"
                                    alt="{{ $featuredArticle->title }}"
                                >

                            @endif

                        </div>


                        {{-- CONTENT --}}

                        <div class="featured-content">

                            <span class="article-category">
                                {{ $featuredArticle->category }}
                            </span>

                            <h2>
                                {{ $featuredArticle->title }}
                            </h2>

                            <p>
                                {{ Str::limit($featuredArticle->excerpt, 150) }}
                            </p>

                            <a
                                href="#"
                                class="article-link"
                                data-bs-toggle="modal"
                                data-bs-target="#articleModal{{ $featuredArticle->id }}"
                            >
                                Baca selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>



                    {{-- =================================
                         ARTIKEL LAINNYA
                    ================================= --}}

                    @if ($articles->count() > 1)

                        <div class="articles-grid">

                            @foreach ($articles->skip(1) as $article)

                                <article class="article-page-card">


                                    {{-- GAMBAR --}}

                                    <div class="article-card-image">

                                        @if ($article->image)

                                            <img
                                                src="{{ asset('storage/' . $article->image) }}"
                                                alt="{{ $article->title }}"
                                            >

                                        @else

                                            <img
                                                src="{{ asset('images/articles/article-1.jpg') }}"
                                                alt="{{ $article->title }}"
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
                                            {{ Str::limit($article->excerpt, 100) }}
                                        </p>

                                        <a
                                            href="#"
                                            class="article-link"
                                            data-bs-toggle="modal"
                                            data-bs-target="#articleModal{{ $article->id }}"
                                        >
                                            Baca selengkapnya
                                            <i class="bi bi-arrow-right"></i>
                                        </a>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @endif

                </div>



                {{-- =================================
                     SIDEBAR KATEGORI
                ================================= --}}

                <aside class="article-sidebar">

                    <div class="category-box">

                        <h4>
                            Kategori
                        </h4>


                        {{-- SEMUA ARTIKEL --}}

                        <a
                            href="{{ route('articles.index') }}"
                            class="category-item {{ !request('category') ? 'active' : '' }}"
                        >

                            <div class="category-name">

                                <i class="bi bi-newspaper"></i>

                                <span>
                                    Semua Artikel
                                </span>

                            </div>

                            <span class="category-count">
                                {{ $articles->count() }}
                            </span>

                        </a>

                        {{-- KATEGORI ARTIKEL --}}

                        @foreach ($categoryCounts as $category => $count)

                            <a
                                href="{{ route('articles.index', ['category' => $category]) }}"
                                class="category-item {{ request('category') === $category ? 'active' : '' }}"
                            >

                                <div class="category-name">

                                    <i class="bi bi-heart-pulse"></i>

                                    <span>
                                        {{ $category }}
                                    </span>

                                </div>

                                <span class="category-count">
                                    {{ $count }}
                                </span>

                            </a>

                        @endforeach

                    </div>

                </aside>

            </div>


        @else


            {{-- =================================
                 BELUM ADA ARTIKEL
            ================================= --}}

            <div class="empty-articles">

                <i class="bi bi-newspaper"></i>

                <h5>
                    Belum ada artikel
                </h5>

                <p>
                    Artikel kesehatan belum tersedia.
                </p>

            </div>


        @endif

    </div>

</section>



{{-- =========================================
     MODAL SEMUA ARTIKEL
========================================= --}}

@foreach ($articles as $article)

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

                        <small class="article-date">

                            <i class="bi bi-calendar3"></i>

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

@endforeach



@endsection



<style>

/* =========================================
   ARTICLE HERO
========================================= */

.article-hero {

    min-height: 460px;

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


.article-hero-content {

    max-width: 650px;

    padding: 75px 0;
}


.article-hero-content small {

    display: inline-block;

    font-size: 11px;
    font-weight: 700;

    color: #1264c4;

    letter-spacing: 1.2px;

    margin-bottom: 10px;
}


.article-hero-content h1 {

    font-size: 20px;
    line-height: 1.15;

    font-weight: 700;

    color: #063b78;

    margin: 0 0 15px;
}


.article-hero-content h1 span {

    color: #b13c68;
}


.article-hero-content p {

    max-width: 570px;

    font-size: 14px;
    line-height: 1.7;

    color: #475569;

    margin: 0;
}



/* =========================================
   ARTICLE LAYOUT
========================================= */

.articles-page {

    padding-top: 65px;
    padding-bottom: 80px;
}


.articles-layout {

    display: grid;

    grid-template-columns: minmax(0, 1fr) 220px;

    gap: 28px;

    align-items: start;
}


.articles-main {

    min-width: 0;
}



/* =========================================
   FEATURED ARTICLE
========================================= */

.featured-article {

    display: grid;

    grid-template-columns: 46% 54%;

    min-height: 270px;

    background: #ffffff;

    border: 1px solid #e7ebf1;

    border-radius: 9px;

    overflow: hidden;

    margin-bottom: 30px;

    box-shadow: 0 5px 20px rgba(15, 29, 51, 0.04);
}


.featured-image {

    width: 100%;
    height: 100%;

    min-height: 270px;

    overflow: hidden;
}


.featured-image img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform 0.3s ease;
}


.featured-article:hover .featured-image img {

    transform: scale(1.03);
}


.featured-content {

    padding: 28px 26px;

    display: flex;

    flex-direction: column;

    justify-content: center;
}


.featured-content h2 {

    color: #17233c;

    font-size: 18px;

    font-weight: 700;

    line-height: 1.3;

    margin: 8px 0 12px;
}


.featured-content p {

    color: #64748b;

    font-size: 11px;

    line-height: 1.7;

    margin: 0 0 20px;
}



/* =========================================
   ARTICLE CATEGORY
========================================= */

.article-category {

    display: inline-block;

    width: fit-content;

    background: #eaf2ff;

    color: #1264c4;

    padding: 4px 8px;

    border-radius: 3px;

    font-size: 9px;

    font-weight: 600;

    line-height: 1.2;
}



/* =========================================
   ARTICLE GRID
========================================= */

.articles-grid {

    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 18px;
}


.article-page-card {

    background: #ffffff;

    border: 1px solid #e7ebf1;

    border-radius: 8px;

    overflow: hidden;

    box-shadow: 0 4px 15px rgba(15, 29, 51, 0.04);

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}


.article-page-card:hover {

    transform: translateY(-3px);

    box-shadow: 0 10px 25px rgba(15, 29, 51, 0.08);
}


.article-card-image {

    width: 100%;

    height: 125px;

    overflow: hidden;
}


.article-card-image img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform 0.3s ease;
}


.article-page-card:hover .article-card-image img {

    transform: scale(1.03);
}


.article-content {

    padding: 14px 15px 16px;
}


.article-content h4 {

    color: #17233c;

    font-size: 12px;

    font-weight: 700;

    line-height: 1.4;

    margin: 8px 0 7px;
}


.article-content p {

    color: #64748b;

    font-size: 10px;

    line-height: 1.6;

    margin: 0 0 13px;
}



/* =========================================
   ARTICLE LINK
========================================= */

.article-link {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    color: #063b78;

    font-size: 10px;

    font-weight: 600;

    text-decoration: none;
}


.article-link i {

    font-size: 11px;

    transition: transform 0.2s ease;
}


.article-link:hover {

    color: #b13c68;
}


.article-link:hover i {

    transform: translateX(3px);
}



/* =========================================
   CATEGORY SIDEBAR
========================================= */

.article-sidebar {
    width: 100%;
}

.category-box {
    background: #f8f9fc;
    border-radius: 8px;
    padding: 20px 15px;
    border: 1px solid #f0f2f6;
}


.category-box h4 {
    color: #17233c;
    font-size: 13px;
    font-weight: 700;
    margin: 0 0 15px;
    padding-left: 4px;
}


.category-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding: 9px 5px;
    border-radius: 5px;
    margin-bottom: 3px;
}


.category-item.active {
    background: #eef4ff;
}


.category-name {
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 0;
}


.category-name i {
    flex-shrink: 0;
    color: #1264c4;
    font-size: 12px;
}


.category-name span {
    color: #334155;
    font-size: 9px;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.category-count {
    flex-shrink: 0;
    min-width: 21px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e3ecfb;
    color: #1264c4;
    border-radius: 10px;
    font-size: 8px;
    font-weight: 600;
}



/* =========================================
   EMPTY ARTICLE
========================================= */

.empty-articles {
    text-align: center;
    padding: 70px 20px;
}

.empty-articles i {
    font-size: 45px;
    color: #cbd5e1;
}


.empty-articles h5 {
    color: #334155;
    font-size: 16px;
    margin-top: 15px;
    margin-bottom: 5px;
}

.empty-articles p {
    color: #94a3b8;
    font-size: 12px;
    margin: 0;
}



/* =========================================
   ARTICLE MODAL
========================================= */

.article-modal-dialog {
    width: 700px;
    max-width: calc(100% - 30px);
    margin: 1.75rem auto;
}


.article-modal {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(6, 59, 120, 0.20);
}

.article-modal-image {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
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
    display: block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #1264c4;
}

.article-modal h3 {
    color: #063b78;
    font-size: 24px;
    font-weight: 700;
    line-height: 1.3;
    margin: 8px 0 10px;
}

.article-date {
    display: block;
    color: #94a3b8;
    font-size: 10px;
    margin-bottom: 18px;
}

.article-date i {
    margin-right: 4px;
}

.article-modal-text {
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
    margin: 0;
}



/* =========================================
   RESPONSIVE TABLET
========================================= */

@media (max-width: 992px) {

    .articles-layout {
        grid-template-columns: 1fr 200px;
        gap: 20px;
    }

    .featured-article {
        grid-template-columns: 45% 55%;
    }

    .articles-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}



/* =========================================
   RESPONSIVE MOBILE
========================================= */

@media (max-width: 768px) {

    .articles-layout {
        grid-template-columns: 1fr;
    }

    .article-sidebar {
        order: -1;
    }

    .category-box {
        padding: 15px;
    }

    .category-box h4 {
        margin-bottom: 10px;
    }

    .category-item {
        display: inline-flex;
        width: auto;
        margin-right: 5px;
        margin-bottom: 5px;
        padding: 7px 9px;
    }

    .category-box {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 3px;
    }

    .category-box h4 {
        width: 100%;
    }

    .featured-article {
        grid-template-columns: 1fr;
    }

    .featured-image {
        height: 220px;
        min-height: 220px;
    }

    .featured-content {
        padding: 22px 20px;
    }

    .articles-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

}



/* =========================================
   RESPONSIVE SMALL MOBILE
========================================= */

@media (max-width: 576px) {

    .department-hero {
        min-height: 350px;
    }

    .department-hero-content {

        padding: 50px 0;
    }

    .department-hero-content h1 {
        font-size: 24px;
        line-height: 1.25;
    }

    .department-hero-content p {
        font-size: 12px;
    }

    .articles-page {
        padding-top: 45px;
    }

    .featured-image {
        height: 190px;
        min-height: 190px;
    }

    .featured-content h2 {
        font-size: 16px;
    }

    .articles-grid {
        grid-template-columns: 1fr;
    }

    .article-card-image {
        height: 180px;
    }

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

.category-item {
    text-decoration: none;
    color: inherit;
}

.category-item:hover {
    text-decoration: none;
}

</style>