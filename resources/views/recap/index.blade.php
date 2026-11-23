<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kelengkapan Dokumen | Ruang Pengendalian Mutu Bapelkes</title>

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
            --success: #356B4B;
            --warning: #805A16;
            --danger: #963F5A;
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
            font-size: 14px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 32px 35px 45px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: var(--berry);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .6px;
        }

        .breadcrumb {
            margin-bottom: 23px;
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--purple-medium);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            color: var(--berry);
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        .page-title {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .page-description {
            margin-bottom: 27px;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .summary-card {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            min-height: 190px;
            padding: 24px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 5px 18px rgba(82,63,119,.06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .summary-card > * {
            position: relative;
            z-index: 1;
        }

        .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(82,63,119,.11);
        }

        .summary-card::after {
            position: absolute;
            z-index: 0;
            top: -47px;
            right: -32px;
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background: rgba(255,255,255,.29);
            content: "";
        }

        .summary-card.pink {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(135deg, #F9DCE9, #E9AFCB 60%, #DFA1C0);
            border-color: #E8B5CC;
            border-left: 5px solid var(--berry);
        }

        .summary-card.lavender {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(135deg, #E9DDF5, #C9B5E1 60%, #B6A0D0);
            border-color: #CDBCE0;
            border-left: 5px solid var(--purple-medium);
        }

        .summary-card.blue {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(135deg, #E2ECF8, #B7CEE8 60%, #9FB9DB);
            border-color: #BED1E4;
            border-left: 5px solid var(--periwinkle);
        }

        .summary-card.rose {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(135deg, #F9DDEB, #EDB5D0 60%, #E5A1C2);
            border-color: #E7BBD0;
            border-left: 5px solid var(--berry);
        }

        .summary-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border: 1px solid rgba(255,255,255,.65);
            border-radius: 14px;
            background: rgba(255,255,255,.75);
            color: var(--purple-dark);
            font-size: 24px;
            box-shadow: 0 3px 10px rgba(82,63,119,.05);
        }

        .pink .summary-icon,
        .rose .summary-icon {
            color: var(--berry);
        }

        .blue .summary-icon {
            color: #557A9B;
        }

        .summary-indicator {
            color: var(--purple-dark);
            font-size: 19px;
            opacity: .75;
        }

        .summary-label {
            margin-top: 20px;
            margin-bottom: 4px;
            color: #51445D;
            font-size: 15px;
            font-weight: 600;
        }

        .summary-value {
            color: var(--text-primary);
            font-size: 35px;
            font-weight: 700;
            line-height: 1.35;
        }

        .summary-note {
            margin-top: 4px;
            color: #62566C;
            font-size: 13px;
            line-height: 1.7;
        }

        .content-card {
            margin-bottom: 23px;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: var(--surface);
            box-shadow: 0 5px 20px rgba(82,63,119,.045);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 23px;
        }

        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 47px;
            height: 47px;
            flex-shrink: 0;
            border: 1px solid #E8D7E8;
            border-radius: 13px;
            background: linear-gradient(135deg, #F9DCE9, #E9C9DC);
            color: var(--berry);
            font-size: 21px;
        }

        .section-icon.lavender {
            border-color: #D8CBE8;
            background: linear-gradient(135deg, #E9DDF5, #C9B5E1);
            color: var(--purple-medium);
        }

        .section-title {
            margin: 0 0 5px;
            color: var(--purple-dark);
            font-size: 18px;
            font-weight: 700;
        }

        .section-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .form-label {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 47px;
            padding: 10px 13px;
            border: 1px solid #DCD2E7;
            border-radius: 10px;
            background: #FCFAFD;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--berry);
            background: #fff;
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
        }

        .btn-green,
        .btn-outline-green {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 10px 16px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn-green {
            border: 1px solid var(--purple-dark);
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #fff;
        }

        .btn-green:hover {
            border-color: var(--berry);
            background: linear-gradient(120deg, #67538A, #B35A8A);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(82,63,119,.12);
        }

        .btn-outline-green {
            border: 1px solid #D9CDE6;
            background: #F5F0FA;
            color: var(--purple-dark);
        }

        .btn-outline-green:hover {
            border-color: var(--purple-medium);
            background: var(--purple-medium);
            color: #fff;
        }

        .export-button {
            border-color: #CFE4D6;
            background: linear-gradient(120deg, #EAF3ED, #DCEFE3);
            color: #356B4B;
        }

        .export-button:hover {
            border-color: #356B4B;
            background: #356B4B;
            color: #fff;
        }

        .filter-card {
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.10), transparent 35%),
                linear-gradient(135deg, #FFFFFF, #FCF9FD);
        }

        .filter-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-hint {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 17px;
            padding: 12px 14px;
            border: 1px solid #E6DBEF;
            border-radius: 9px;
            background: #F8F4FA;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.7;
        }

        .filter-hint i {
            color: var(--purple-medium);
            font-size: 16px;
        }

        .recap-table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .recap-table {
            width: 100%;
            min-width: 1750px;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .recap-table thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            padding: 17px 14px;
            background: linear-gradient(110deg, #F0EAF7, #F8EAF0);
            color: var(--purple-dark);
            border-bottom: 1px solid #E3D9ED;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .recap-table tbody td {
            padding: 18px 14px;
            color: var(--text-primary);
            border-color: #F0EBF3;
            font-size: 13px;
            line-height: 1.7;
            vertical-align: middle;
        }

        .recap-table tbody tr {
            transition: background .2s ease;
        }

        .recap-table.table-hover tbody tr:hover {
            background: #FCF9FD;
        }

        .number-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 33px;
            height: 33px;
            border-radius: 9px;
            background: #F1ECF7;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 700;
        }

        .training-name {
            min-width: 210px;
            max-width: 290px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 700;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .training-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            color: var(--text-secondary);
            font-size: 12px;
        }

        .date-text {
            min-width: 115px;
            font-weight: 500;
            white-space: nowrap;
        }

        .date-subtext {
            margin-top: 4px;
            color: var(--text-secondary);
            font-size: 12px;
            white-space: nowrap;
        }

        .organizer-text {
            min-width: 140px;
            line-height: 1.7;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            line-height: 1.5;
            white-space: nowrap;
        }

        .badge-complete {
            background: #E6F2EA;
            color: #356B4B;
        }

        .badge-pending {
            background: #F9EED8;
            color: #805A16;
        }

        .badge-revision {
            background: #FCEBF0;
            color: #963F5A;
        }

        .badge-missing {
            background: #F0EDF3;
            color: #71697B;
        }

        .completion-cell {
            min-width: 150px;
        }

        .completion-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            color: var(--text-secondary);
            font-size: 12px;
        }

        .completion-text strong {
            color: var(--purple-dark);
            font-size: 13px;
        }

        .progress {
            height: 9px;
            overflow: hidden;
            border-radius: 20px;
            background: #EEE9F2;
        }

        .progress-bar {
            border-radius: 20px;
            background: linear-gradient(90deg, #67538A, #B35A8A);
        }

        .empty-state {
            padding: 55px 20px;
            color: var(--text-secondary);
            text-align: center;
        }

        .empty-state-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 75px;
            height: 75px;
            margin: 0 auto 18px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(135deg, #F0EAF7, #F8EAF0);
            color: var(--purple-medium);
            font-size: 31px;
        }

        .empty-state h6 {
            margin-bottom: 9px;
            color: var(--purple-dark);
            font-size: 17px;
            font-weight: 700;
        }

        .empty-state p {
            max-width: 470px;
            margin: auto;
            font-size: 13px;
            line-height: 1.8;
        }

        .result-count {
            color: var(--text-secondary);
            font-size: 13px;
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 17px;
        }

        .alert {
            border-radius: 11px;
            font-size: 13px;
            line-height: 1.8;
        }

        .alert-success {
            background: #EAF3ED;
            border-color: #CFE3D5;
            color: #356B4B;
        }

        .footer-text {
            padding: 30px 0 5px;
            color: var(--text-secondary);
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 1199px) {
            .main-content {
                padding: 28px 23px 38px;
            }

            .content-card {
                padding: 22px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
                padding: 22px 15px 30px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-description {
                font-size: 13px;
            }

            .summary-card {
                min-height: 170px;
                padding: 19px;
            }

            .summary-value {
                font-size: 30px;
            }

            .content-card {
                padding: 17px;
                border-radius: 14px;
            }

            .section-heading {
                align-items: flex-start;
            }

            .filter-actions .btn-green,
            .filter-actions .btn-outline-green {
                flex: 1;
            }

            .filter-actions form {
                display: flex;
                flex: 1;
            }

            .filter-actions form button {
                width: 100%;
            }

            .filter-actions a {
                flex: 1;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'recap',
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
                <li class="breadcrumb-item active" aria-current="page">
                    Rekap Kelengkapan Dokumen
                </li>
            </ol>
        </nav>

        <div class="mb-4">
            <div class="page-eyebrow">
                <i class="bi bi-clipboard-data"></i>
                PENGELOLAAN MUTU BAPELKES
            </div>

            <h1 class="page-title">Rekap Kelengkapan Dokumen</h1>

            <p class="page-description">
                Pantau kelengkapan, status pemeriksaan, dan hasil verifikasi dokumen kegiatan pelatihan.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="mb-4">
            <div class="row g-4">

                <div class="col-12 col-md-6">
                    <div class="summary-card pink">
                        <div class="summary-top">
                            <div class="summary-icon">
                                <i class="bi bi-calendar2-check"></i>
                            </div>
                            <i class="bi bi-graph-up-arrow summary-indicator"></i>
                        </div>

                        <div>
                            <div class="summary-label">Total Kegiatan</div>
                            <div class="summary-value">{{ $totalTrainings }}</div>
                            <div class="summary-note">Jumlah kegiatan yang terdaftar dalam sistem.</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="summary-card lavender">
                        <div class="summary-top">
                            <div class="summary-icon">
                                <i class="bi bi-patch-check"></i>
                            </div>
                            <i class="bi bi-check2-circle summary-indicator"></i>
                        </div>

                        <div>
                            <div class="summary-label">Dokumen Lengkap</div>
                            <div class="summary-value">{{ $completeTrainings }}</div>
                            <div class="summary-note">Kegiatan dengan seluruh dokumen terverifikasi.</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="summary-card blue">
                        <div class="summary-top">
                            <div class="summary-icon">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <i class="bi bi-clock-history summary-indicator"></i>
                        </div>

                        <div>
                            <div class="summary-label">Menunggu Pemeriksaan</div>
                            <div class="summary-value">{{ $totalPending }}</div>
                            <div class="summary-note">Jumlah dokumen yang belum diperiksa.</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="summary-card rose">
                        <div class="summary-top">
                            <div class="summary-icon">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <i class="bi bi-exclamation-circle summary-indicator"></i>
                        </div>

                        <div>
                            <div class="summary-label">Perlu Revisi</div>
                            <div class="summary-value">{{ $totalRevisions }}</div>
                            <div class="summary-note">Jumlah dokumen yang harus diperbaiki.</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="content-card filter-card">

            <div class="section-heading">
                <div class="section-icon">
                    <i class="bi bi-funnel"></i>
                </div>

                <div>
                    <h5 class="section-title">Filter Rekap</h5>
                    <p class="section-description">
                        Pilih kriteria untuk menampilkan data rekap kegiatan yang dibutuhkan.
                    </p>
                </div>
            </div>

            <form action="{{ route('recap.index') }}" method="GET">
                <div class="row g-3 align-items-end">

                    <div class="col-12 col-md-4">
                        <label for="budget_year" class="form-label">Tahun Anggaran</label>

                        <select name="budget_year" id="budget_year" class="form-select">
                            <option value="">Semua Tahun</option>

                            @foreach ($years as $year)
                                <option
                                    value="{{ $year }}"
                                    @selected(request('budget_year') == $year)
                                >
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="execution_status" class="form-label">Status Kegiatan</label>

                        <select name="execution_status" id="execution_status" class="form-select">
                            <option value="">Semua Status</option>

                            <option value="akan_dilaksanakan" @selected(request('execution_status') === 'akan_dilaksanakan')>
                                Akan Dilaksanakan
                            </option>

                            <option value="sedang_berlangsung" @selected(request('execution_status') === 'sedang_berlangsung')>
                                Sedang Berlangsung
                            </option>

                            <option value="selesai" @selected(request('execution_status') === 'selesai')>
                                Selesai
                            </option>

                            <option value="ditunda" @selected(request('execution_status') === 'ditunda')>
                                Ditunda
                            </option>

                            <option value="dibatalkan" @selected(request('execution_status') === 'dibatalkan')>
                                Dibatalkan
                            </option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="organizer" class="form-label">Penyelenggara</label>

                        <select name="organizer" id="organizer" class="form-select">
                            <option value="">Semua Penyelenggara</option>

                            @foreach ($organizers as $organizer)
                                <option
                                    value="{{ $organizer }}"
                                    @selected(request('organizer') === $organizer)
                                >
                                    {{ $organizer }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <div class="filter-actions">
                            <button type="submit" class="btn-green">
                                <i class="bi bi-search"></i>
                                Terapkan Filter
                            </button>

                            <a href="{{ route('recap.index') }}" class="btn-outline-green">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Reset Filter
                            </a>
                        </div>
                    </div>

                </div>
            </form>

            <div class="filter-hint">
                <i class="bi bi-info-circle"></i>
                <span>Gunakan filter untuk mempersempit data rekap berdasarkan tahun anggaran, status kegiatan, atau penyelenggara.</span>
            </div>

        </section>

        <section class="content-card">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

                <div class="section-heading mb-0">
                    <div class="section-icon lavender">
                        <i class="bi bi-file-earmark-check"></i>
                    </div>

                    <div>
                        <h5 class="section-title">Data Kelengkapan Dokumen</h5>
                        <p class="section-description">
                            Rekap lima jenis dokumen kegiatan dan hasil pemeriksaannya.
                        </p>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <span class="result-count">
                        <i class="bi bi-list-ul me-1"></i>
                        {{ $recaps->count() }} kegiatan ditemukan
                    </span>

                    <a
                        href="{{ route('recap.export', request()->query()) }}"
                        class="btn-green export-button"
                    >
                        <i class="bi bi-file-earmark-excel"></i>
                        Export Excel
                    </a>
                </div>

            </div>

            <div class="recap-table-wrapper">
                <table class="table table-hover recap-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Penyelenggara</th>
                            <th>Tahun Anggaran</th>
                            <th>Kelengkapan Dokumen</th>
                            <th>Menunggu</th>
                            <th>Perlu Revisi</th>
                            <th>Laporan Penyelenggara</th>
                            <th>Evaluasi Penyelenggaraan</th>
                            <th>Progres Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($recaps as $recap)

                            @php
                                $training = $recap['training'];
                                $statusLaporan = $recap['document_statuses']['laporan_penyelenggara'] ?? 'Belum diunggah';
                                $statusEvaluasi = $recap['document_statuses']['evaluasi_penyelenggaraan'] ?? 'Belum diunggah';
                            @endphp

                            <tr>
                                <td>
                                    <span class="number-badge">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>
                                    <div class="training-name">
                                        {{ $training->training_name }}
                                    </div>

                                    <div class="training-status">
                                        <i class="bi bi-circle-fill" style="font-size: 7px;"></i>
                                        {{ $training->execution_status
                                            ? ucwords(str_replace('_', ' ', $training->execution_status))
                                            : 'Status belum diisi' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="date-text">
                                        {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                                    </div>

                                    @if ($training->end_date)
                                        <div class="date-subtext">
                                            s.d. {{ $training->end_date->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <div class="organizer-text">
                                        {{ $training->organizer ?: '-' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $training->budget_year ?: '-' }}
                                </td>

                                <td>
                                    <div class="fw-semibold mb-2">
                                        {{ $recap['verified_count'] }}/5 terverifikasi
                                    </div>

                                    @if ($recap['missing_count'] > 0)
                                        <span class="status-badge badge-missing">
                                            <i class="bi bi-file-earmark-minus"></i>
                                            {{ $recap['missing_count'] }} belum diunggah
                                        </span>
                                    @elseif ($recap['verified_count'] === 5)
                                        <span class="status-badge badge-complete">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Lengkap
                                        </span>
                                    @else
                                        <span class="status-badge badge-pending">
                                            Belum lengkap
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($recap['pending_count'] > 0)
                                        <span class="status-badge badge-pending">
                                            <i class="bi bi-clock"></i>
                                            {{ $recap['pending_count'] }} dokumen
                                        </span>
                                    @else
                                        <span class="text-secondary">0</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($recap['revision_count'] > 0)
                                        <span class="status-badge badge-revision">
                                            <i class="bi bi-arrow-repeat"></i>
                                            {{ $recap['revision_count'] }} dokumen
                                        </span>
                                    @else
                                        <span class="text-secondary">0</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($statusLaporan === 'Terverifikasi')
                                        <span class="status-badge badge-complete">
                                            <i class="bi bi-check-circle-fill"></i>
                                            {{ $statusLaporan }}
                                        </span>
                                    @elseif ($statusLaporan === 'Perlu Revisi')
                                        <span class="status-badge badge-revision">
                                            <i class="bi bi-arrow-repeat"></i>
                                            {{ $statusLaporan }}
                                        </span>
                                    @elseif ($statusLaporan === 'Menunggu Pemeriksaan')
                                        <span class="status-badge badge-pending">
                                            <i class="bi bi-clock"></i>
                                            {{ $statusLaporan }}
                                        </span>
                                    @else
                                        <span class="status-badge badge-missing">
                                            <i class="bi bi-file-earmark-minus"></i>
                                            {{ $statusLaporan }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($statusEvaluasi === 'Terverifikasi')
                                        <span class="status-badge badge-complete">
                                            <i class="bi bi-check-circle-fill"></i>
                                            {{ $statusEvaluasi }}
                                        </span>
                                    @elseif ($statusEvaluasi === 'Perlu Revisi')
                                        <span class="status-badge badge-revision">
                                            <i class="bi bi-arrow-repeat"></i>
                                            {{ $statusEvaluasi }}
                                        </span>
                                    @elseif ($statusEvaluasi === 'Menunggu Pemeriksaan')
                                        <span class="status-badge badge-pending">
                                            <i class="bi bi-clock"></i>
                                            {{ $statusEvaluasi }}
                                        </span>
                                    @else
                                        <span class="status-badge badge-missing">
                                            <i class="bi bi-file-earmark-minus"></i>
                                            {{ $statusEvaluasi }}
                                        </span>
                                    @endif
                                </td>

                                <td class="completion-cell">
                                    <div class="completion-text">
                                        <span>Verifikasi</span>
                                        <strong>{{ $recap['completion_percentage'] }}%</strong>
                                    </div>

                                    <div class="progress">
                                        <div
                                            class="progress-bar"
                                            role="progressbar"
                                            style="width: {{ $recap['completion_percentage'] }}%;"
                                            aria-valuenow="{{ $recap['completion_percentage'] }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                        ></div>
                                    </div>
                                </td>

                                <td>
                                    <a
                                        href="{{ route('trainings.documents.index', $training) }}"
                                        class="btn-outline-green"
                                    >
                                        <i class="bi bi-folder2-open"></i>
                                        Dokumen
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="12">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>

                                        <h6>Belum Ada Data Rekap</h6>

                                        <p>
                                            Data kegiatan akan muncul setelah kegiatan pelatihan tersedia.
                                            Coba ubah filter atau tambahkan kegiatan terlebih dahulu.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="table-footer">
                <span class="result-count">
                    <i class="bi bi-info-circle me-1"></i>
                    Gunakan scroll horizontal untuk melihat seluruh kolom rekap.
                </span>

                <a
                    href="{{ route('recap.export', request()->query()) }}"
                    class="btn-green export-button"
                >
                    <i class="bi bi-download"></i>
                    Unduh Rekap Excel
                </a>
            </div>

        </section>

        <footer class="footer-text">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
