<section class="section pt-0">

    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4">

            <div>

                <small class="section-label">
                    ARTIKEL
                </small>

                <h2 class="section-title mb-2">
                    Artikel <span>Kesehatan</span>
                </h2>

                <p class="section-subtitle mb-0">
                    Informasi kesehatan terbaru dan tips hidup sehat
                    untuk membantu Anda menjaga kesehatan.
                </p>

            </div>

            <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-sm">
                Lihat Semua Artikel
            </a>

        </div>


        <div class="row g-3">

            @forelse ($articles as $article)

                <div class="col-6 col-lg-3">

                    <article class="article-card">

                        {{-- GAMBAR --}}

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


                        <div class="article-info">

                            <small>
                                {{ $article->category }}
                            </small>


                            <h6>
                                {{ $article->title }}
                            </h6>


                            <p>
                                {{ Str::limit($article->excerpt, 100) }}
                            </p>


                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#articleModal{{ $article->id }}"
                            >
                                Baca Selengkapnya →
                            </a>

                        </div>

                    </article>

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

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <p class="text-muted mb-0">
                            Belum ada artikel kesehatan.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>
