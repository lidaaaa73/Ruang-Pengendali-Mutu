<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun | Ruang Pengendalian Mutu Bapelkes</title>

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
            max-width: 1000px;
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
            padding: 38px 32px;
            background: linear-gradient(160deg, #523F77 0%, #443365 100%);
            border-top: 4px solid var(--berry);
            color: #FFFFFF;
        }

        .auth-logo {
            width: 68px;
            height: 68px;
            margin-bottom: 22px;
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
            font-size: 23px;
            font-weight: 700;
            line-height: 1.35;
        }

        .auth-brand-desc {
            margin: 0 0 22px;
            color: #E3DAF0;
            font-size: 13.5px;
            line-height: 1.75;
        }

        .brand-points {
            display: grid;
            gap: 12px;
        }

        .brand-point {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #EFEAF7;
            font-size: 13px;
            line-height: 1.55;
        }

        .brand-point i {
            margin-top: 2px;
            color: var(--pink);
            font-size: 16px;
        }

        .auth-brand-footer {
            margin-top: 28px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.16);
            color: #D2C6E5;
            font-size: 12px;
        }

        .auth-form-pane {
            padding: 34px 36px;
        }

        .auth-form-heading {
            margin-bottom: 20px;
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
            margin: 20px 0 14px;
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

        @media (max-width: 767.98px) {
            .auth-brand,
            .auth-form-pane {
                padding: 24px 20px;
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
                        <p class="auth-brand-desc">
                            Sistem informasi internal untuk pengelolaan kegiatan pelatihan, pemeriksaan dokumen, dan pemantauan mutu secara terintegrasi.
                        </p>

                        <div class="brand-points">
                            <div class="brand-point">
                                <i class="bi bi-person-check"></i>
                                <span>Diperuntukkan bagi pegawai dan unit kerja internal Bapelkes.</span>
                            </div>
                            <div class="brand-point">
                                <i class="bi bi-shield-check"></i>
                                <span>Akun diperiksa dan disetujui Admin sebelum dapat digunakan.</span>
                            </div>
                            <div class="brand-point">
                                <i class="bi bi-lock"></i>
                                <span>Hak akses peran (Penglat / Dalmut) ditetapkan oleh Admin.</span>
                            </div>
                        </div>
                    </div>

                    <div class="auth-brand-footer">
                        © {{ date('Y') }} Sistem Informasi Internal Bapelkes
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="auth-form-pane">
                    <div class="auth-form-heading">
                        <h1>Pengajuan Akun Baru</h1>
                        <p>Lengkapi formulir berikut untuk mengajukan akun Ruang Pengendalian Mutu.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert app-alert app-alert-danger">
                            <i class="bi bi-exclamation-circle-fill mt-1"></i>
                            <div>
                                <strong>Pendaftaran belum berhasil.</strong>
                                <ul class="mb-0 mt-1 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="app-info-banner mb-3">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            Akun yang didaftarkan berstatus menunggu persetujuan Admin. Peran pengguna akan ditetapkan setelah proses verifikasi selesai.
                        </div>
                    </div>

                    <form action="{{ route('register.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="app-form-label">
                                Nama Lengkap <span class="app-required">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                autocomplete="name"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="app-form-label">
                                Email <span class="app-required">*</span>
                            </label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan alamat email aktif"
                                autocomplete="email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="department" class="app-form-label">
                                Bagian / Unit Kerja <span class="app-required">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="department"
                                name="department"
                                value="{{ old('department') }}"
                                placeholder="Contoh: Penglat, Dalmut, Tata Usaha"
                                required
                            >
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12 col-sm-6">
                                <label for="password" class="app-form-label">
                                    Kata Sandi <span class="app-required">*</span>
                                </label>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        placeholder="Minimal 8 karakter"
                                        autocomplete="new-password"
                                        minlength="8"
                                        required
                                    >
                                    <button
                                        class="btn password-toggle-btn toggle-password"
                                        type="button"
                                        data-password-target="password"
                                        aria-label="Tampilkan kata sandi"
                                        aria-pressed="false"
                                    >
                                        <i class="bi bi-eye eye-icon"></i>
                                    </button>
                                </div>
                                <small class="app-field-hint">Minimal 8 karakter.</small>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="password_confirmation" class="app-form-label">
                                    Konfirmasi Kata Sandi <span class="app-required">*</span>
                                </label>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        placeholder="Ulangi kata sandi"
                                        autocomplete="new-password"
                                        minlength="8"
                                        required
                                    >
                                    <button
                                        class="btn password-toggle-btn toggle-password"
                                        type="button"
                                        data-password-target="password_confirmation"
                                        aria-label="Tampilkan konfirmasi kata sandi"
                                        aria-pressed="false"
                                    >
                                        <i class="bi bi-eye eye-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="app-btn app-btn-primary w-100" style="min-height: 44px;">
                            <i class="bi bi-person-plus"></i>
                            Kirim Pendaftaran Akun
                        </button>
                    </form>

                    <div class="auth-divider">Sudah memiliki akun?</div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="app-btn app-btn-outline w-100">
                            <i class="bi bi-arrow-left"></i>
                            Kembali ke Halaman Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = document.getElementById(button.dataset.passwordTarget);
                const icon = button.querySelector('.eye-icon');
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                icon.classList.toggle('bi-eye', !isHidden);
                icon.classList.toggle('bi-eye-slash', isHidden);
                button.setAttribute('aria-label', isHidden ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
                button.setAttribute('aria-pressed', String(isHidden));
            });
        });
    </script>

</body>
</html>
