<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #3E2D5E;
            overflow-x: hidden;
        }

        .auth-screen {
            position: relative;
            isolation: isolate;
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .auth-screen::before {
            position: fixed;
            inset: 0;
            z-index: -2;
            background-image: url("{{ asset('images/profil-bapelkes.jpeg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: saturate(0.82) contrast(1.03);
            content: "";
        }

        .auth-screen::after {
            position: fixed;
            inset: 0;
            z-index: -1;
            background:
                radial-gradient(circle at 82% 14%, rgba(179, 90, 138, 0.24) 0%, rgba(179, 90, 138, 0) 48%),
                radial-gradient(circle at 18% 88%, rgba(103, 83, 138, 0.3) 0%, rgba(103, 83, 138, 0) 52%),
                linear-gradient(
                    150deg,
                    rgba(52, 37, 80, 0.72) 0%,
                    rgba(82, 63, 119, 0.58) 50%,
                    rgba(44, 31, 70, 0.78) 100%
                );
            content: "";
        }

        .auth-glass-card {
            width: 100%;
            max-width: 560px;
            padding: 28px 36px 24px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-top: 3px solid rgba(246, 183, 199, 0.72);
            border-radius: 20px;
            background: rgba(54, 39, 84, 0.66);
            box-shadow: 0 24px 54px rgba(20, 12, 36, 0.42), inset 0 1px 0 rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(16px) saturate(135%);
            -webkit-backdrop-filter: blur(16px) saturate(135%);
            color: #FFFFFF;
        }

        @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
            .auth-glass-card {
                background: rgba(54, 39, 84, 0.92);
            }
        }

        .auth-identity {
            text-align: center;
            margin-bottom: 18px;
        }

        .auth-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-bottom: 8px;
            padding: 4px 13px;
            border: 1px solid rgba(246, 183, 199, 0.38);
            border-radius: 999px;
            background: rgba(179, 90, 138, 0.22);
            color: #FCE6EE;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .auth-badge i {
            color: var(--pink);
            font-size: 13px;
        }

        .auth-identity h1 {
            margin: 0 0 6px;
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.01em;
            line-height: 1.28;
        }

        .auth-identity p {
            margin: 0 auto;
            max-width: 480px;
            color: #E7DFF3;
            font-size: 13px;
            line-height: 1.55;
        }

        .auth-field {
            margin-bottom: 14px;
        }

        .auth-glass-card .app-form-label {
            color: #F4EFFA;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .auth-glass-card .form-control {
            width: 100%;
            min-height: 43px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.94);
            color: var(--text-primary);
            font-size: 13.5px;
            padding: 9px 14px;
        }

        .auth-glass-card .form-control::placeholder {
            color: var(--text-muted);
        }

        .auth-glass-card .form-control:focus {
            border-color: var(--pink);
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(246, 183, 199, 0.28);
        }

        .auth-glass-card .input-group {
            width: 100%;
        }

        .auth-glass-card .input-group .form-control {
            width: 1%;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .password-toggle-btn {
            min-width: 46px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-left: 1px solid var(--border);
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            background: rgba(248, 246, 250, 0.96);
            color: var(--purple-medium);
        }

        .password-toggle-btn:hover,
        .password-toggle-btn:focus {
            background: #FFFFFF;
            color: var(--purple-dark);
            border-color: rgba(255, 255, 255, 0.45);
        }

        .auth-remember-check {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .auth-remember-check .form-check-input {
            margin-top: 0;
            border-color: rgba(255, 255, 255, 0.45);
            background-color: rgba(255, 255, 255, 0.14);
            cursor: pointer;
        }

        .auth-remember-check .form-check-input:checked {
            border-color: var(--berry);
            background-color: var(--berry);
        }

        .auth-remember-check .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(246, 183, 199, 0.26);
        }

        .auth-remember-check .form-check-label {
            color: #EDE6F7;
            font-size: 13px;
            cursor: pointer;
        }

        .auth-submit-btn {
            min-height: 44px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 10px;
            background: linear-gradient(135deg, #B35A8A 0%, #984673 100%);
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(32, 16, 48, 0.28);
        }

        .auth-submit-btn:hover {
            border-color: rgba(255, 255, 255, 0.28);
            background: linear-gradient(135deg, #BF6595 0%, #A34D7C 100%);
            color: #FFFFFF;
            box-shadow: 0 10px 24px rgba(32, 16, 48, 0.34);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 18px 0 14px;
            color: #D8CCE9;
            font-size: 12px;
            font-weight: 500;
        }

        .auth-divider::before,
        .auth-divider::after {
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
            content: "";
        }

        .auth-register-box {
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            text-align: center;
        }

        .auth-register-box p {
            margin: 0 0 10px;
            color: #EDE6F7;
            font-size: 12.5px;
            line-height: 1.5;
        }

        .auth-register-btn {
            min-height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.38);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
            font-size: 13.5px;
            font-weight: 600;
        }

        .auth-register-btn:hover {
            border-color: #FFFFFF;
            background: #FFFFFF;
            color: var(--purple-dark);
        }

        .auth-register-note {
            margin-top: 8px;
            color: #D5C8E8;
            font-size: 12px;
            line-height: 1.45;
        }

        .auth-copyright {
            margin-top: 14px;
            color: rgba(242, 236, 249, 0.88);
            font-size: 12px;
            text-align: center;
            text-shadow: 0 1px 6px rgba(24, 14, 42, 0.45);
        }

        @media (max-width: 767.98px) {
            .auth-glass-card {
                max-width: 500px;
                padding: 26px 26px 22px;
            }
        }

        @media (max-width: 575.98px) {
            .auth-screen {
                padding: 18px 14px;
            }

            .auth-glass-card {
                padding: 24px 18px 20px;
                border-radius: 16px;
            }

            .auth-identity h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <main class="auth-screen">
        <section class="auth-glass-card" aria-label="Formulir Masuk Sistem">
            <div class="auth-identity">
                <div class="auth-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>BAPELKES</span>
                </div>
                <h1>Ruang Pengendalian Mutu</h1>
                <p>
                    Sistem informasi internal untuk pengelolaan kegiatan pelatihan, pemeriksaan dokumen, pelaporan, dan pemantauan mutu secara terintegrasi.
                </p>
            </div>

            @if ($errors->any())
                <div class="alert app-alert app-alert-danger">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>{{ $errors->first() }}</div>
                </div>
            @endif

            @if (session('status'))
                <div class="alert app-alert app-alert-success">
                    <i class="bi bi-check-circle-fill mt-1"></i>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="auth-field">
                    <label for="email" class="app-form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@instansi.go.id"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="auth-field">
                    <label for="password" class="app-form-label">Kata Sandi</label>
                    <div class="input-group">
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Masukkan kata sandi"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            class="btn password-toggle-btn"
                            type="button"
                            id="togglePassword"
                            aria-label="Tampilkan kata sandi"
                            aria-pressed="false"
                        >
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-check auth-remember-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        value="1"
                    >
                    <label class="form-check-label" for="remember">
                        Ingat sesi saya di perangkat ini
                    </label>
                </div>

                <button type="submit" class="app-btn auth-submit-btn w-100">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk ke Sistem
                </button>
            </form>

            <div class="auth-divider">Belum memiliki akun?</div>

            <div class="auth-register-box">
                <p>Ajukan pendaftaran akun untuk mendapatkan akses ke Ruang Pengendalian Mutu Bapelkes.</p>

                <a href="{{ route('register') }}" class="app-btn auth-register-btn w-100">
                    <i class="bi bi-person-plus"></i>
                    Daftar Akun Baru
                </a>

                <div class="auth-register-note">
                    Setiap pendaftaran akun memerlukan persetujuan Admin Bapelkes sebelum dapat digunakan.
                </div>
            </div>
        </section>

        <div class="auth-copyright">
            © {{ date('Y') }} Sistem Informasi Internal Bapelkes
        </div>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            eyeIcon.classList.toggle('bi-eye', !isHidden);
            eyeIcon.classList.toggle('bi-eye-slash', isHidden);
            togglePassword.setAttribute('aria-label', isHidden ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            togglePassword.setAttribute('aria-pressed', String(isHidden));
        });
    </script>

</body>
</html>
