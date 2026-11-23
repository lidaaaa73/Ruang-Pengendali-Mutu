<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

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
            background: var(--background);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 32px 35px 45px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            color: var(--berry);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .6px;
        }

        .page-title {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 28px;
            font-weight: 700;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 15px;
            line-height: 1.8;
        }

        .breadcrumb {
            margin-bottom: 23px;
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--purple-medium);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--berry);
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        .form-card {
            overflow: hidden;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 5px 20px rgba(82, 63, 119, .045);
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 24px 28px;
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.25), transparent 35%),
                linear-gradient(110deg, #F3EEF8, #F9EDF3);
            border-bottom: 1px solid var(--border);
        }

        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #F9DCE9, #E9C9DC);
            border: 1px solid #EDD5E3;
            color: var(--berry);
            font-size: 23px;
        }

        .section-title {
            margin: 0 0 5px;
            color: var(--purple-dark);
            font-size: 19px;
            font-weight: 700;
        }

        .section-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.7;
        }

        .form-card-body {
            padding: 28px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 15px;
            font-weight: 600;
        }

        .required-mark {
            color: var(--berry);
            font-size: 16px;
        }

        .form-control,
        .form-select {
            min-height: 50px;
            padding: 11px 14px;
            border: 1px solid #DCD2E7;
            border-radius: 10px;
            background-color: #FDFBFE;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-control::placeholder {
            color: #9A90A6;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: var(--berry);
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
            line-height: 1.8;
        }

        .input-group .form-control {
            border-radius: 10px 0 0 10px;
        }

        .input-group-text {
            display: flex;
            align-items: center;
            padding: 11px 16px;
            background: linear-gradient(135deg, #F3EEF8, #F8EAF0);
            border: 1px solid #DCD2E7;
            border-left: 0;
            border-radius: 0 10px 10px 0;
            color: var(--purple-dark);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
        }

        .invalid-feedback {
            font-size: 13px;
            line-height: 1.6;
        }

        .text-danger.small {
            font-size: 13px;
        }

        .field-hint {
            display: block;
            margin-top: 7px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .form-divider {
            margin: 29px 0;
            border: 0;
            border-top: 1px solid var(--border);
            opacity: 1;
        }

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 19px;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 40%),
                linear-gradient(120deg, #F0EAF7, #F9EAF1);
            border: 1px solid #E5D9EC;
            border-radius: 12px;
            color: var(--purple-dark);
            font-size: 14px;
            line-height: 1.8;
        }

        .info-box > i {
            flex-shrink: 0;
            margin-top: 2px;
            color: var(--berry);
            font-size: 22px;
        }

        .info-title {
            margin-bottom: 5px;
            color: var(--purple-dark);
            font-size: 15px;
            font-weight: 700;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 11px;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 47px;
            padding: 11px 20px;
            background: linear-gradient(120deg, #523F77, #67538A);
            border: 1px solid var(--purple-dark);
            border-radius: 9px;
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn-save:hover {
            background: linear-gradient(120deg, #67538A, #7880AE);
            border-color: var(--purple-medium);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(82,63,119,.15);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 47px;
            padding: 11px 20px;
            background: #fff;
            color: var(--purple-dark);
            border: 1px solid #D9CDE6;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn-cancel:hover {
            background: #F3EEF8;
            color: var(--purple-dark);
            border-color: var(--lavender);
        }

        .alert-danger {
            padding: 18px 20px;
            background: #FCEBF0;
            border: 1px solid #EECAD6;
            border-radius: 12px;
            color: #963F5A;
            font-size: 14px;
            line-height: 1.8;
        }

        .alert-heading {
            margin-bottom: 8px;
            font-size: 15px;
            font-weight: 700;
        }

        .form-footer {
            margin-top: 25px;
            color: var(--text-secondary);
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .main-content {
                padding: 27px 23px 35px;
            }

            .form-card-body {
                padding: 23px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
                padding: 22px 15px 30px;
            }

            .page-title {
                font-size: 24px;
            }

            .page-description {
                font-size: 14px;
            }

            .form-card-header {
                padding: 19px;
            }

            .form-card-body {
                padding: 20px 17px;
            }

            .section-title {
                font-size: 17px;
            }

            .section-description {
                font-size: 13px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn-save,
            .form-actions .btn-cancel {
                width: 100%;
            }

            .breadcrumb {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'trainings',
        'pendingUsersCount' => auth()->user()->role?->slug === 'admin'
            ? \App\Models\User::where('account_status', 'pending')->count()
            : 0
    ])

    <main class="main-content">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('trainings.index') }}">Data Kegiatan Pelatihan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tambah Kegiatan
                </li>
            </ol>
        </nav>

        <div class="page-header">
            <div class="page-eyebrow">
                <i class="bi bi-calendar2-plus"></i>
                PENGELOLAAN MUTU BAPELKES
            </div>

            <h1 class="page-title">Tambah Kegiatan Pelatihan</h1>

            <p class="page-description">
                Masukkan informasi kegiatan pelatihan yang akan diselenggarakan.
                Pastikan seluruh data telah diisi dengan benar.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <div class="alert-heading">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Data belum dapat disimpan.
                </div>

                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trainings.store') }}" method="POST">
            @csrf

            <section class="form-card">

                <div class="form-card-header">
                    <div class="section-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>

                    <div>
                        <h5 class="section-title">Informasi Kegiatan</h5>
                        <p class="section-description">
                            Lengkapi informasi dasar kegiatan pelatihan.
                        </p>
                    </div>
                </div>

                <div class="form-card-body">

                    <div class="row g-4">

                        <div class="col-12">
                            <label for="training_name" class="form-label">
                                Nama Pelatihan <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                id="training_name"
                                name="training_name"
                                class="form-control @error('training_name') is-invalid @enderror"
                                value="{{ old('training_name') }}"
                                placeholder="Contoh: Pelatihan Manajemen Pelayanan Kesehatan"
                                maxlength="255"
                                required
                            >

                            @error('training_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="start_date" class="form-label">
                                Tanggal Mulai <span class="required-mark">*</span>
                            </label>

                            <input
                                type="date"
                                id="start_date"
                                name="start_date"
                                class="form-control @error('start_date') is-invalid @enderror"
                                value="{{ old('start_date') }}"
                                required
                            >

                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="end_date" class="form-label">
                                Tanggal Selesai
                            </label>

                            <input
                                type="date"
                                id="end_date"
                                name="end_date"
                                class="form-control @error('end_date') is-invalid @enderror"
                                value="{{ old('end_date') }}"
                            >

                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="organizer" class="form-label">
                                Penyelenggara <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                id="organizer"
                                name="organizer"
                                class="form-control @error('organizer') is-invalid @enderror"
                                value="{{ old('organizer') }}"
                                placeholder="Nama bagian atau penyelenggara"
                                maxlength="255"
                                required
                            >

                            @error('organizer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="venue" class="form-label">
                                Tempat Pelaksanaan <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                id="venue"
                                name="venue"
                                class="form-control @error('venue') is-invalid @enderror"
                                value="{{ old('venue') }}"
                                placeholder="Contoh: Aula Bapelkes"
                                maxlength="255"
                                required
                            >

                            @error('venue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="participant_count" class="form-label">
                                Jumlah Peserta <span class="required-mark">*</span>
                            </label>

                            <div class="input-group">
                                <input
                                    type="number"
                                    id="participant_count"
                                    name="participant_count"
                                    class="form-control @error('participant_count') is-invalid @enderror"
                                    value="{{ old('participant_count', 0) }}"
                                    min="0"
                                    required
                                >

                                <span class="input-group-text">Orang</span>
                            </div>

                            @error('participant_count')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="funding_source" class="form-label">
                                Sumber Dana
                            </label>

                            <input
                                type="text"
                                id="funding_source"
                                name="funding_source"
                                class="form-control @error('funding_source') is-invalid @enderror"
                                value="{{ old('funding_source') }}"
                                placeholder="Contoh: DIPA, APBD, atau sumber lainnya"
                                maxlength="255"
                            >

                            @error('funding_source')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="budget_year" class="form-label">
                                Tahun Anggaran
                            </label>

                            <select
                                id="budget_year"
                                name="budget_year"
                                class="form-select @error('budget_year') is-invalid @enderror"
                            >
                                <option value="">Pilih tahun anggaran</option>

                                @for ($year = (int) date('Y') - 2; $year <= (int) date('Y') + 3; $year++)
                                    <option value="{{ $year }}" {{ (string) old('budget_year') === (string) $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>

                            @error('budget_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="event_notes" class="form-label">
                                Catatan Kegiatan
                            </label>

                            <textarea
                                id="event_notes"
                                name="event_notes"
                                class="form-control @error('event_notes') is-invalid @enderror"
                                placeholder="Tambahkan informasi lain mengenai kegiatan jika diperlukan."
                            >{{ old('event_notes') }}</textarea>

                            @error('event_notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="form-divider">

                    <div class="info-box mb-4">
                        <i class="bi bi-info-circle-fill"></i>

                        <div>
                            <div class="info-title">Informasi Persetujuan</div>

                            Data yang disimpan akan memiliki status awal Draft.
                            Sebelum kegiatan diajukan untuk persetujuan Dalmut,
                            dokumen persiapan yang diwajibkan harus dilengkapi.
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('trainings.index') }}" class="btn-cancel">
                            <i class="bi bi-arrow-left"></i>
                            Batal
                        </a>

                        <button type="submit" class="btn-save">
                            <i class="bi bi-save"></i>
                            Simpan Kegiatan
                        </button>
                    </div>

                </div>
            </section>
        </form>

        <footer class="form-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        startDate.addEventListener('change', function () {
            endDate.min = this.value;

            if (endDate.value && endDate.value < this.value) {
                endDate.value = '';
            }
        });

        if (startDate.value) {
            endDate.min = startDate.value;
        }
    </script>

</body>
</html>
