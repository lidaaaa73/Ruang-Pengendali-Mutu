<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple-dark: #523F77;
            --purple-medium: #67538A;
            --berry: #B35A8A;
            --pink: #F6B7C7;
            --lavender: #B6A5CE;
            --periwinkle: #7880AE;
            --powder-blue: #A3BBD7;
            --background: #F8F6FA;
            --surface: #FFFFFF;
            --border: #E9E3EF;
            --text-primary: #352D40;
            --text-secondary: #71697B;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 5% 10%, rgba(182,165,206,.19), transparent 30%),
                radial-gradient(circle at 95% 90%, rgba(246,183,199,.2), transparent 30%),
                var(--background);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
        }

        .login-panel {
            width: 100%;
            max-width: 1000px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 18px 55px rgba(82,63,119,.12);
        }

        .login-brand {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100%;
            padding: 48px 38px;
            overflow: hidden;
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.3), transparent 38%),
                linear-gradient(145deg, #523F77 0%, #67538A 62%, #B35A8A 115%);
            color: #fff;
        }

        .login-brand::before {
            position: absolute;
            z-index: -1;
            right: -85px;
            bottom: -105px;
            width: 290px;
            height: 290px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 50%;
            content: "";
        }

        .login-brand::after {
            position: absolute;
            z-index: -1;
            right: -45px;
            bottom: -65px;
            width: 210px;
            height: 210px;
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
            content: "";
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 90px;
            height: 90px;
            margin-bottom: 28px;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,.65);
            border-radius: 18px;
            background: rgba(255,255,255,.15);
            box-shadow: 0 7px 20px rgba(36,22,59,.18);
        }

        .profil-bapelkes {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-label {
            margin-bottom: 12px;
            color: #F6DCE7;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .login-brand h2 {
            max-width: 350px;
            margin-bottom: 17px;
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.4;
        }

        .brand-description {
            margin-bottom: 24px;
            color: #EFE5F2;
            font-size: 14px;
            line-height: 1.9;
        }

        .brand-footer {
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,.25);
            color: #E5D9EB;
            font-size: 12px;
        }

        .brand-decoration {
            position: absolute;
            top: 45px;
            right: 30px;
            color: white;
            font-size: 40px;
            opacity: .13;
        }

        .login-form {
            padding: 48px 42px;
        }

        .form-heading {
            margin-bottom: 29px;
        }

        .form-heading h3 {
            margin-bottom: 9px;
            color: var(--purple-dark);
            font-size: 27px;
            font-weight: 700;
        }

        .form-heading p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .form-label {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            min-height: 49px;
            padding: 12px 14px;
            border: 1px solid #DCD2E7;
            border-radius: 10px;
            background: #FCFAFD;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: #A096AC;
        }

        .form-control:focus {
            border-color: var(--berry);
            background: #fff;
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
        }

        .password-input {
            border-radius: 10px 0 0 10px !important;
        }

        .toggle-password {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            border: 1px solid #DCD2E7;
            border-radius: 0 10px 10px 0 !important;
            background: #fff;
            color: var(--purple-medium);
            transition: .2s ease;
        }

        .toggle-password:hover {
            background: #F3EEF8;
            color: var(--berry);
        }

        .toggle-password:focus {
            border-color: var(--berry);
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
            z-index: 3;
        }

        .form-check-input {
            width: 17px;
            height: 17px;
            margin-top: .2rem;
            border-color: #CBBED9;
            cursor: pointer;
        }

        .form-check-input:checked {
            border-color: var(--purple-dark);
            background-color: var(--purple-dark);
        }

        .form-check-input:focus {
            border-color: var(--berry);
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
        }

        .form-check-label {
            padding-left: 4px;
            color: var(--text-secondary);
            font-size: 13px;
            cursor: pointer;
        }

        .btn-login {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            min-height: 49px;
            padding: 12px;
            border: 1px solid var(--purple-dark);
            border-radius: 10px;
            background: linear-gradient(110deg, #523F77, #67538A);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-login:hover {
            border-color: var(--berry);
            background: linear-gradient(110deg, #67538A, #B35A8A);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 7px 17px rgba(82,63,119,.17);
        }

        .btn-login:focus {
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.2);
        }

        .register-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 25px 0 19px;
            color: #A096AC;
            font-size: 12px;
        }

        .register-divider::before,
        .register-divider::after {
            flex: 1;
            height: 1px;
            background: var(--border);
            content: "";
        }

        .register-section {
            padding: 18px;
            border: 1px solid #E8DDED;
            border-radius: 12px;
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.15), transparent 40%),
                linear-gradient(135deg, #F6F1FA, #FCF1F5);
            text-align: center;
        }

        .register-section p {
            margin-bottom: 12px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .btn-register {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 44px;
            padding: 10px 16px;
            border: 1px solid var(--berry);
            border-radius: 9px;
            background: #fff;
            color: var(--berry);
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn-register:hover {
            border-color: var(--berry);
            background: linear-gradient(110deg, #B35A8A, #923D70);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 5px 13px rgba(179,90,138,.13);
        }

        .register-note {
            margin-top: 15px;
            color: var(--text-secondary);
            font-size: 11px;
            line-height: 1.7;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.8;
        }

        .alert-success {
            border-color: #CFE3D5;
            background: #EAF3ED;
            color: #356B4B;
        }

        .alert-danger {
            border-color: #EECAD6;
            background: #FCEBF0;
            color: #963F5A;
        }

        @media (max-width: 767px) {
            .login-wrapper {
                padding: 16px 12px !important;
            }

            .login-panel {
                border-radius: 16px;
            }

            .login-brand {
                padding: 29px 25px;
            }

            .brand-icon {
                width: 72px;
                height: 72px;
                margin-bottom: 19px;
            }

            .login-brand h2 {
                max-width: 100%;
                font-size: 23px;
            }

            .brand-description {
                margin-bottom: 19px;
                font-size: 13px;
            }

            .login-form {
                padding: 30px 23px;
            }

            .form-heading {
                margin-bottom: 24px;
            }

            .form-heading h3 {
                font-size: 24px;
            }

            .brand-decoration {
                top: 22px;
                right: 22px;
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="container login-wrapper d-flex align-items-center justify-content-center py-4">
        <div class="login-panel row g-0">

            <div class="col-md-5">
                <div class="login-brand">

                    <i class="bi bi-buildings brand-decoration"></i>

                    <div class="brand-icon">
                        <img
                            src="{{ asset('images/profil-bapelkes.jpeg') }}"
                            alt="Gedung Bapelkes"
                            class="profil-bapelkes"
                        >
                    </div>

                    <p class="brand-label">BAPELKES</p>

                    <h2>Ruang Pengendalian Mutu</h2>

                    <p class="brand-description">
                        Sistem informasi untuk pengelolaan kegiatan pelatihan,
                        pemeriksaan dokumen, dan pemantauan mutu secara terintegrasi.
                    </p>

                    <div class="brand-footer">
                        Sistem Informasi Internal Bapelkes
                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="login-form">

                    <div class="form-heading">
                        <h3>Selamat Datang!</h3>
                        <p>
                            Silakan masuk menggunakan akun yang sudah terdaftar.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                autocomplete="username"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    class="form-control password-input"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    class="btn toggle-password"
                                    type="button"
                                    id="togglePassword"
                                    aria-label="Tampilkan password"
                                    aria-pressed="false"
                                >
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                            >

                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Masuk ke Sistem
                        </button>

                    </form>

                    <div class="register-divider">
                        Belum punya akun?
                    </div>

                    <div class="register-section">
                        <p>
                            Daftarkan akun untuk mendapatkan akses ke Ruang Pengendalian Mutu Bapelkes.
                        </p>

                        <a href="{{ route('register') }}" class="btn-register">
                            <i class="bi bi-person-plus"></i>
                            Daftar Akun Sekarang
                        </a>

                        <div class="register-note">
                            Pendaftaran akun akan melalui proses persetujuan Admin Bapelkes sebelum dapat digunakan.
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';

            eyeIcon.classList.toggle('bi-eye', !isHidden);
            eyeIcon.classList.toggle('bi-eye-slash', isHidden);

            togglePassword.setAttribute(
                'aria-label',
                isHidden ? 'Sembunyikan password' : 'Tampilkan password'
            );

            togglePassword.setAttribute('aria-pressed', String(isHidden));
        });
    </script>

</body>
</html>
