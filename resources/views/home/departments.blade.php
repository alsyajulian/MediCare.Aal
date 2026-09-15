<section class="section department-home-section">

    <div class="container">

        {{-- HEADER --}}
        <div class="department-heading text-center">

            <small>DEPARTEMEN KAMI</small>

            <h2>Departemen <span>Medis Kami</span></h2>

            <p>
                Departemen-departemen khusus kami siap memberikan layanan
                kesehatan terbaik untuk Anda dan keluarga.
            </p>

        </div>


        {{-- DEPARTMENT GRID --}}
            <div class="department-grid">

                @forelse ($departments as $index => $department)

                    {{-- CARD DEPARTEMEN --}}
                    <article class="department-card">

                        {{-- IMAGE --}}
                        @if ($department->image)

                            <div class="dept-featured-img">

                                <img
                                    src="{{ asset('storage/' . $department->image) }}"
                                    alt="{{ $department->name }}"
                                >

                                {{-- Overlay hanya untuk card pertama --}}
                                @if ($index === 0)
                                    <div class="dept-featured-overlay"></div>
                                @endif

                            </div>

                        @else

                            <div class="dept-featured-img dept-image-placeholder">

                                <i class="bi bi-building"></i>

                            </div>

                        @endif


                        {{-- CONTENT --}}
                        <div class="dept-featured-body">

                            <h4>
                                {{ $department->name }}
                            </h4>

                            <p>
                                {{ Str::limit($department->description, 85) }}
                            </p>

                            {{-- TOMBOL DETAIL --}}
                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#departmentModal{{ $department->id }}"
                            >
                                Pelajari selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>


                    {{-- ==========================================
                        POPUP / MODAL DETAIL DEPARTEMEN
                    =========================================== --}}

                    <div
                        class="modal fade"
                        id="departmentModal{{ $department->id }}"
                        tabindex="-1"
                        aria-labelledby="departmentModalLabel{{ $department->id }}"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content department-modal">

                                {{-- FOTO --}}
                                @if ($department->image)

                                    <img
                                        src="{{ asset('storage/' . $department->image) }}"
                                        alt="{{ $department->name }}"
                                        class="department-modal-image"
                                    >

                                @endif


                                {{-- TOMBOL CLOSE --}}
                                <div class="modal-header border-0">

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>

                                </div>


                                {{-- ISI --}}
                                <div class="modal-body">

                                    <span class="department-modal-label">
                                        DEPARTEMEN MEDIS
                                    </span>

                                    <h3 id="departmentModalLabel{{ $department->id }}">
                                        {{ $department->name }}
                                    </h3>

                                    <p>
                                        {{ $department->description }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                @empty

                    <div class="department-empty">

                        <i class="bi bi-building"></i>

                        <p>
                            Belum ada departemen.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</section>

