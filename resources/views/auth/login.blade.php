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
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            background: var(--bg-canvas);
        }

        .auth-panel {
            width: 100%;
            max-width: 940px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .auth-brand {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 40px 34px;
            background: linear-gradient(160deg, #523F77 0%, #443365 100%);
            border-top: 4px solid var(--berry);
            color: #FFFFFF;
        }

        .auth-logo {
            width: 72px;
            height: 72px;
            margin-bottom: 24px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.45);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.12);
        }

        .auth-logo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-brand-eyebrow {
            margin: 0 0 8px;
            color: var(--pink);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .auth-brand h2 {
            margin: 0 0 12px;
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 700;
            line-height: 1.35;
        }

        .auth-brand p {
            margin: 0;
            color: #E3DAF0;
            font-size: 13.5px;
            line-height: 1.75;
        }

        .auth-brand-footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.16);
            color: #D2C6E5;
            font-size: 12px;
        }

        .auth-form-pane {
            padding: 40px 38px;
        }

        .auth-form-heading {
            margin-bottom: 24px;
        }

        .auth-form-heading h1 {
            margin: 0 0 6px;
            color: var(--purple-dark);
            font-size: 22px;
            font-weight: 700;
        }

        .auth-form-heading p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13.5px;
        }

        .password-toggle-btn {
            border: 1px solid var(--border-strong);
            border-left: 0;
            background: var(--surface-subtle);
            color: var(--purple-medium);
            min-width: 44px;
        }

        .password-toggle-btn:hover {
            background: var(--surface-tint);
            color: var(--purple-dark);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 22px 0 16px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .auth-divider::before,
        .auth-divider::after {
            flex: 1;
            height: 1px;
            background: var(--border);
            content: "";
        }

        .auth-register-box {
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
            text-align: center;
        }

        .auth-register-box p {
            margin: 0 0 10px;
            color: var(--text-secondary);
            font-size: 13px;
        }

        .auth-register-note {
            margin-top: 10px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .form-check-input:checked {
            border-color: var(--purple-dark);
            background-color: var(--purple-dark);
        }

        @media (max-width: 767.98px) {
            .auth-brand,
            .auth-form-pane {
                padding: 26px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-wrapper">
        <div class="auth-panel row g-0">
            <div class="col-md-5">
                <div class="auth-brand">
                    <div>
                        <div class="auth-logo">
                            <img src="{{ asset('images/profil-bapelkes.jpeg') }}" alt="Gedung Bapelkes">
                        </div>

                        <p class="auth-brand-eyebrow">Bapelkes</p>
                        <h2>Ruang Pengendalian Mutu</h2>
                        <p>
                            Sistem informasi internal untuk pengelolaan kegiatan pelatihan, pemeriksaan dokumen, pelaporan, dan pemantauan mutu secara terintegrasi.
                        </p>
                    </div>

                    <div class="auth-brand-footer">
                        © {{ date('Y') }} Sistem Informasi Internal Bapelkes
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="auth-form-pane">
                    <div class="auth-form-heading">
                        <h1>Masuk ke Sistem</h1>
                        <p>Silakan masuk menggunakan akun internal Bapelkes yang telah disetujui.</p>
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

                        <div class="mb-3">
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

                        <div class="mb-3">
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

                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                            >
                            <label class="form-check-label text-secondary" for="remember" style="font-size: 13px;">
                                Ingat sesi saya di perangkat ini
                            </label>
                        </div>

                        <button type="submit" class="app-btn app-btn-primary w-100" style="min-height: 44px;">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Masuk ke Sistem
                        </button>
                    </form>

                    <div class="auth-divider">Belum memiliki akun?</div>

                    <div class="auth-register-box">
                        <p>Ajukan pendaftaran akun untuk mendapatkan akses ke Ruang Pengendalian Mutu Bapelkes.</p>

                        <a href="{{ route('register') }}" class="app-btn app-btn-outline w-100">
                            <i class="bi bi-person-plus"></i>
                            Daftar Akun Baru
                        </a>

                        <div class="auth-register-note">
                            Setiap pendaftaran akun memerlukan persetujuan Admin Bapelkes sebelum dapat digunakan.
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
            togglePassword.setAttribute('aria-label', isHidden ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            togglePassword.setAttribute('aria-pressed', String(isHidden));
        });
    </script>

</body>
</html>
