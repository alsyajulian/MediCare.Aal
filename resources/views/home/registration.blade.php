<section class="section registration-section">
    <div class="container">

        <div class="registration-box">

            <div class="registration-content">
                <span class="registration-label">
                    PENDAFTARAN RAWAT JALAN
                </span>

                <h2>
                    Siap Mendapatkan Pelayanan Kesehatan?
                </h2>

                <p>
                    Daftarkan diri Anda secara online dan pilih
                    dokter sesuai kebutuhan Anda.
                </p>
            </div>

            <div class="registration-actions">

                <a href="{{ route('registration.create') }}"
                   class="registration-btn primary">
                    <i class="bi bi-calendar-check"></i>
                    Daftar Sekarang
                </a>

                <a href="{{ route('registration.checkStatus') }}"
                   class="registration-btn secondary">
                    <i class="bi bi-search"></i>
                    Cek Status Pendaftaran
                </a>

            </div>

        </div>

    </div>
</section>