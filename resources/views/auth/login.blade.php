<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - MediCare Hospital</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           FOTO KIRI
        ========================= */

        .login-image {
            width: 55%;
            min-height: 100vh;

            background-image:
                linear-gradient(
                    rgba(255,255,255,0.05),
                    rgba(255,255,255,0.05)
                ),
                url("{{ asset('images/hospital.jpg') }}");

            background-size: cover;
            background-position: center;
        }


        /* =========================
           BAGIAN KANAN
        ========================= */

        .login-content {
            width: 45%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }


        /* =========================
           CARD LOGIN
        ========================= */

        .login-card {
            width: 100%;
            max-width: 430px;

            background: #ffffff;

            border-radius: 6px;

            padding: 35px 38px;

            box-shadow:
                0 2px 10px rgba(0, 0, 0, 0.08);
        }


        /* =========================
           LOGO
        ========================= */

        .login-logo {
            width: 70px;
            height: 70px;

            border-radius: 50%;

            background: #eaf2ff;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 18px;

            color: #0b5ed7;

            font-size: 34px;
        }


        .login-title {
            text-align: center;

            font-size: 22px;
            font-weight: 700;

            margin-bottom: 5px;
        }

        .login-subtitle {
            text-align: center;

            color: #666;

            font-size: 11px;

            margin-bottom: 28px;
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-size: 12px;
            font-weight: 500;

            margin-bottom: 6px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group-text {
            background: #fff;

            border-color: #aebbd0;

            color: #718096;

            font-size: 14px;
        }

        .form-control {
            border-color: #aebbd0;

            height: 38px;

            font-size: 12px;
        }

        .form-control:focus {
            border-color: #0b5ed7;

            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .1);
        }


        /* =========================
           PASSWORD
        ========================= */

        .password-toggle {
            cursor: pointer;

            background: #fff;

            border-color: #aebbd0;

            color: #718096;
        }


        /* =========================
           CHECKBOX
        ========================= */

        .remember {
            font-size: 11px;

            color: #555;

            margin-bottom: 18px;
        }

        .remember input {
            margin-right: 6px;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-login {
            width: 100%;

            height: 38px;

            border: none;

            border-radius: 4px;

            background: #075bea;

            color: white;

            font-size: 12px;

            transition: .2s;
        }

        .btn-login:hover {
            background: #064dcc;

            color: white;
        }


        /* =========================
           BACK TO WEBSITE
        ========================= */

        .back-website {
            border-top: 1px solid #d8dee8;

            margin-top: 18px;

            padding-top: 14px;

            text-align: center;
        }

        .back-website a {
            color: #075bea;

            text-decoration: none;

            font-size: 10px;
        }

        .back-website a:hover {
            text-decoration: underline;
        }


        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            text-align: center;

            font-size: 9px;

            color: #8993a3;

            margin-top: 20px;
        }


        /* =========================
           ERROR
        ========================= */

        .login-error {
            background: #fff1f1;

            color: #c0392b;

            border-radius: 4px;

            padding: 8px 10px;

            font-size: 11px;

            margin-bottom: 15px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .login-image {
                display: none;
            }

            .login-content {
                width: 100%;
                padding: 20px;
            }

            .login-card {
                max-width: 420px;
            }

        }

    </style>

</head>


<body>

<div class="login-wrapper">


    {{-- FOTO RUMAH SAKIT --}}

    <div class="login-image"></div>


    {{-- LOGIN --}}

    <div class="login-content">

        <div class="login-card">


            {{-- LOGO --}}

            <div class="login-logo">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>


            {{-- TITLE --}}

            <h1 class="login-title">
                Login Admin
            </h1>

            <p class="login-subtitle">
                Silahkan masuk untuk melanjutkan ke dashboard admin
                <br>
                MediCare Hospital
            </p>


            {{-- ERROR --}}

            @if ($errors->any())

                <div class="login-error">

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- FORM --}}

            <form method="POST" action="{{ route('login') }}">

                @csrf


                {{-- USERNAME --}}

                <label class="form-label">
                    Username
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        placeholder="Masukan username Anda"
                        required
                        autofocus
                    >

                </div>


                {{-- PASSWORD --}}

                <label class="form-label">
                    Password
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukan password Anda"
                        required
                    >

                    <button
                        type="button"
                        class="input-group-text password-toggle"
                        onclick="togglePassword()"
                    >
                        <i
                            class="bi bi-eye"
                            id="passwordIcon"
                        ></i>
                    </button>

                </div>


                {{-- REMEMBER --}}

                <div class="remember">

                    <label>
                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Ingat saya

                    </label>

                </div>


                {{-- LOGIN BUTTON --}}

                <button
                    type="submit"
                    class="btn-login"
                >

                    <i class="bi bi-lock me-1"></i>

                    Masuk

                </button>


                {{-- BACK --}}

                <div class="back-website">

                    <a href="{{ route('home') }}">

                        ← &nbsp; Kembali ke Website

                    </a>

                </div>


            </form>


            {{-- FOOTER --}}

            <div class="login-footer">

                © 2024 MediCare Hospital. All rights reserved

            </div>


        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password = document.getElementById('password');

    const icon = document.getElementById('passwordIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }

}

</script>


</body>

</html>