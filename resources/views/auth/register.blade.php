<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Ruang Pengendalian Mutu Bapelkes</title>

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

        .register-wrapper {
            min-height: 100vh;
        }

        .register-panel {
            width: 100%;
            max-width: 1080px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 18px 55px rgba(82,63,119,.12);
        }

        .register-brand {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100%;
            padding: 45px 34px;
            overflow: hidden;
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.3), transparent 38%),
                linear-gradient(145deg, #523F77 0%, #67538A 62%, #B35A8A 115%);
            color: #fff;
        }

        .register-brand::before {
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

        .register-brand::after {
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
            width: 82px;
            height: 82px;
            margin-bottom: 25px;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,.65);
            border-radius: 17px;
            background: rgba(255,255,255,.15);
            box-shadow: 0 7px 20px rgba(36,22,59,.18);
        }

        .brand-icon img {
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

        .register-brand h2 {
            max-width: 340px;
            margin-bottom: 16px;
            color: #fff;
            font-size: 27px;
            font-weight: 700;
            line-height: 1.4;
        }

        .brand-description {
            margin-bottom: 25px;
            color: #EFE5F2;
            font-size: 14px;
            line-height: 1.9;
        }

        .brand-information {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 25px;
        }

        .brand-information-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #F4EDF6;
            font-size: 13px;
            line-height: 1.7;
        }

        .brand-information-item i {
            margin-top: 2px;
            color: var(--pink);
            font-size: 18px;
        }

        .brand-footer {
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,.25);
            color: #E5D9EB;
            font-size: 12px;
        }

        .brand-decoration {
            position: absolute;
            top: 40px;
            right: 25px;
            color: white;
            font-size: 38px;
            opacity: .13;
        }

        .register-form {
            padding: 40px 40px;
        }

        .form-heading {
            margin-bottom: 24px;
        }

        .form-heading h3 {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 25px;
            font-weight: 700;
        }

        .form-heading p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.8;
        }

        .form-label {
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 13px;
            font-weight: 600;
        }

        .form-control {
            min-height: 46px;
            padding: 11px 13px;
            border: 1px solid #DCD2E7;
            border-radius: 9px;
            background: #FCFAFD;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 13px;
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
            border-radius: 9px 0 0 9px !important;
        }

        .toggle-password {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 49px;
            border: 1px solid #DCD2E7;
            border-radius: 0 9px 9px 0 !important;
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

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 14px 15px;
            border: 1px solid #E3D6ED;
            border-radius: 10px;
            background: linear-gradient(120deg, #F3EEF8, #F9EDF3);
            color: var(--purple-dark);
            font-size: 12px;
            line-height: 1.8;
        }

        .info-box i {
            margin-top: 2px;
            color: var(--berry);
            font-size: 17px;
        }

        .btn-register {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            min-height: 48px;
            padding: 11px 16px;
            border: 1px solid var(--purple-dark);
            border-radius: 9px;
            background: linear-gradient(110deg, #523F77, #67538A);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-register:hover {
            border-color: var(--berry);
            background: linear-gradient(110deg, #67538A, #B35A8A);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 7px 17px rgba(82,63,119,.15);
        }

        .login-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 23px 0 17px;
            color: #A096AC;
            font-size: 12px;
        }

        .login-divider::before,
        .login-divider::after {
            flex: 1;
            height: 1px;
            background: var(--border);
            content: "";
        }

        .login-link {
            color: var(--berry);
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .login-link:hover {
            color: var(--purple-dark);
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.8;
        }

        .alert-danger {
            border-color: #EECAD6;
            background: #FCEBF0;
            color: #963F5A;
        }

        .password-hint {
            display: block;
            margin-top: 7px;
            color: var(--text-secondary);
            font-size: 11px;
        }

        .required-mark {
            color: var(--berry);
        }

        @media (max-width: 767px) {
            .register-wrapper {
                padding: 16px 12px !important;
            }

            .register-panel {
                border-radius: 16px;
            }

            .register-brand {
                padding: 27px 24px;
            }

            .brand-icon {
                width: 68px;
                height: 68px;
                margin-bottom: 18px;
            }

            .register-brand h2 {
                max-width: 100%;
                font-size: 23px;
            }

            .brand-description {
                margin-bottom: 17px;
                font-size: 13px;
            }

            .brand-information {
                gap: 10px;
                margin-bottom: 19px;
            }

            .register-form {
                padding: 28px 22px;
            }

            .form-heading h3 {
                font-size: 23px;
            }

            .brand-decoration {
                top: 20px;
                right: 20px;
                font-size: 29px;
            }
        }
    </style>
</head>

<body>

    <div class="container register-wrapper d-flex align-items-center justify-content-center py-4">

        <div class="register-panel row g-0">

            <div class="col-md-5">
                <div class="register-brand">

                    <i class="bi bi-buildings brand-decoration"></i>

                    <div class="brand-icon">
                        <img
                            src="{{ asset('images/profil-bapelkes.jpeg') }}"
                            alt="Gedung Bapelkes"
                        >
                    </div>

                    <p class="brand-label">BAPELKES</p>

                    <h2>Ruang Pengendalian Mutu</h2>

                    <p class="brand-description">
                        Sistem informasi untuk pengelolaan kegiatan pelatihan,
                        pemeriksaan dokumen, dan pemantauan mutu secara terintegrasi.
                    </p>

                    <div class="brand-information">

                        <div class="brand-information-item">
                            <i class="bi bi-person-check"></i>
                            <span>Pendaftaran akun untuk pengguna internal Bapelkes.</span>
                        </div>

                        <div class="brand-information-item">
                            <i class="bi bi-shield-check"></i>
                            <span>Akun akan diperiksa dan disetujui oleh Admin sebelum dapat digunakan.</span>
                        </div>

                        <div class="brand-information-item">
                            <i class="bi bi-lock"></i>
                            <span>Data akun digunakan untuk mengakses sistem pengendalian mutu.</span>
                        </div>

                    </div>

                    <div class="brand-footer">
                        Sistem Informasi Internal Bapelkes
                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="register-form">

                    <div class="form-heading">
                        <h3>Buat Akun Baru</h3>
                        <p>
                            Lengkapi data berikut untuk mengajukan akun Ruang Pengendalian Mutu.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <div class="fw-semibold mb-2">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>
                                Pendaftaran belum berhasil.
                            </div>

                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="info-box mb-4">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            Akun yang didaftarkan akan berstatus menunggu persetujuan Admin.
                            Role pengguna ditentukan oleh Admin setelah pemeriksaan.
                        </div>
                    </div>

                    <form action="{{ route('register.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="required-mark">*</span>
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
                            <label for="email" class="form-label">
                                Email <span class="required-mark">*</span>
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email aktif"
                                autocomplete="email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">
                                Bagian atau Unit Kerja <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="department"
                                name="department"
                                value="{{ old('department') }}"
                                placeholder="Masukkan bagian atau unit kerja"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password <span class="required-mark">*</span>
                            </label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    class="form-control password-input"
                                    id="password"
                                    name="password"
                                    placeholder="Minimal 8 karakter"
                                    autocomplete="new-password"
                                    minlength="8"
                                    required
                                >

                                <button
                                    class="btn toggle-password"
                                    type="button"
                                    data-password-target="password"
                                    aria-label="Tampilkan password"
                                    aria-pressed="false"
                                >
                                    <i class="bi bi-eye eye-icon"></i>
                                </button>
                            </div>

                            <small class="password-hint">
                                Gunakan minimal 8 karakter untuk password akun.
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                Konfirmasi Password <span class="required-mark">*</span>
                            </label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    class="form-control password-input"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Ulangi password"
                                    autocomplete="new-password"
                                    minlength="8"
                                    required
                                >

                                <button
                                    class="btn toggle-password"
                                    type="button"
                                    data-password-target="password_confirmation"
                                    aria-label="Tampilkan konfirmasi password"
                                    aria-pressed="false"
                                >
                                    <i class="bi bi-eye eye-icon"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-register">
                            <i class="bi bi-person-plus"></i>
                            Kirim Pendaftaran
                        </button>

                    </form>

                    <div class="login-divider">
                        Sudah memiliki akun?
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="login-link">
                            <i class="bi bi-arrow-left me-1"></i>
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

                button.setAttribute(
                    'aria-label',
                    isHidden ? 'Sembunyikan password' : 'Tampilkan password'
                );

                button.setAttribute('aria-pressed', String(isHidden));
            });
        });
    </script>

</body>
</html>
