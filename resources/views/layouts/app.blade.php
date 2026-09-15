<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MediCare Hospital')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <style>


    /* HERO */

.hero {
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
.hero-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}
/* TEXT */
.hero-text small {
    display: inline-block;
    background: #063b78;
    color: #ffffff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.5px;
    padding: 6px 18px;
    border-radius: 50px;
    margin-bottom: 6px;
}
.hero-text h1 {
    color: #0f1d33;
    font-size: 28px;
    font-weight: 800;
    line-height: 1.15;
    margin: 6px 0 8px;
}

.hero-text h1 span {
    color: #b13c68;
}

.hero-text p {
    color: #64748b;
    font-size: 11px;
    line-height: 1.6;
    margin: 0 0 18px;
    max-width: 360px;
}
.hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #063b78;
    color: #ffffff;
    padding: 13px 28px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s ease;
    margin-top: 72px;
}
.hero-btn i {
    font-size: 14px;
    transition: transform .2s ease;
}
.hero-btn:hover {
    background: #0a4d9e;
    color: #ffffff;
}
.hero-btn:hover i {
    transform: translateX(3px);
}

    </style>

    @vite('resources/css/app.css')

    @stack('styles')
</head>

<body>

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>