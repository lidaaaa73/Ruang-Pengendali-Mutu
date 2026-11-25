<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

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
            margin-bottom: 20px;
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

        .page-header-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-title {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .period-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid #DFD3EC;
            border-radius: 30px;
            background: linear-gradient(135deg, #F4EFFA, #FCEFF5);
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 600;
        }

        .period-pill i {
            color: var(--berry);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .summary-card {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            min-height: 168px;
            padding: 20px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(82, 63, 119, .06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .summary-card > * {
            position: relative;
            z-index: 1;
        }

        .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(82, 63, 119, .11);
        }

        .summary-card::after {
            position: absolute;
            z-index: 0;
            top: -42px;
            right: -30px;
            width: 125px;
            height: 125px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .28);
            content: "";
        }

        .summary-card.pink {
            background:
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, .65), transparent 38%),
                linear-gradient(135deg, #F9DCE9, #E9AFCB 60%, #DFA1C0);
            border-color: #E8B5CC;
            border-left: 5px solid var(--berry);
        }

        .summary-card.lavender {
            background:
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, .7), transparent 38%),
                linear-gradient(135deg, #E9DDF5, #C9B5E1 60%, #B6A0D0);
            border-color: #CDBCE0;
            border-left: 5px solid var(--purple-medium);
        }

        .summary-card.mint {
            background:
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, .7), transparent 38%),
                linear-gradient(135deg, #E3F3EA, #C1E2D0 60%, #AED8C1);
            border-color: #BEDCC9;
            border-left: 5px solid var(--success);
        }

        .summary-card.blue {
            background:
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, .7), transparent 38%),
                linear-gradient(135deg, #E2ECF8, #B7CEE8 60%, #9FB9DB);
            border-color: #BED1E4;
            border-left: 5px solid var(--periwinkle);
        }

        .summary-card.rose {
            background:
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, .65), transparent 38%),
                linear-gradient(135deg, #F5E7F8, #DEC2E8 60%, #CEACDC);
            border-color: #DAC2E5;
            border-left: 5px solid var(--purple-dark);
        }

        .summary-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 13px;
            background: rgba(255, 255, 255, .78);
            color: var(--purple-dark);
            font-size: 21px;
            box-shadow: 0 3px 10px rgba(82, 63, 119, .05);
        }

        .pink .summary-icon {
            color: var(--berry);
        }

        .mint .summary-icon {
            color: var(--success);
        }

        .blue .summary-icon {
            color: #4A6A8C;
        }

        .summary-label {
            margin-top: 15px;
            margin-bottom: 4px;
            color: #4D3F5A;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.45;
        }

        .summary-value {
            color: var(--text-primary);
            font-size: 30px;
            font-weight: 700;
            line-height: 1.25;
        }

        .summary-note {
            margin-top: 4px;
            color: #5F536A;
            font-size: 11px;
            line-height: 1.55;
        }

        .content-card {
            margin-bottom: 23px;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: var(--surface);
            box-shadow: 0 5px 20px rgba(82, 63, 119, .045);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
        }

        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border: 1px solid #E8D7E8;
            border-radius: 13px;
            background: linear-gradient(135deg, #F9DCE9, #E9C9DC);
            color: var(--berry);
            font-size: 20px;
        }

        .section-icon.lavender {
            border-color: #D8CBE8;
            background: linear-gradient(135deg, #E9DDF5, #C9B5E1);
            color: var(--purple-medium);
        }

        .section-icon.blue {
            border-color: #C7D7EA;
            background: linear-gradient(135deg, #E2ECF8, #C4D8EE);
            color: var(--periwinkle);
        }

        .section-title {
            margin: 0 0 4px;
            color: var(--purple-dark);
            font-size: 17px;
            font-weight: 700;
        }

        .section-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .filter-card {
            background:
                radial-gradient(circle at 100% 0%, rgba(246, 183, 199, .10), transparent 35%),
                linear-gradient(135deg, #FFFFFF, #FCF9FD);
        }

        .period-tabs {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
            padding: 6px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #F6F2FA;
        }

        .period-tab {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: var(--text-secondary);
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
            cursor: pointer;
        }

        .period-tab:hover {
            color: var(--purple-dark);
            background: rgba(255, 255, 255, .7);
        }

        .period-tab.active {
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(82, 63, 119, .18);
        }

        .form-label {
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 13px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 45px;
            padding: 9px 13px;
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
            background: #FFFFFF;
            box-shadow: 0 0 0 .2rem rgba(179, 90, 138, .12);
        }

        .btn-primary-soft,
        .btn-outline-soft,
        .btn-export-excel,
        .btn-export-pdf {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 9px 16px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn-primary-soft {
            border: 1px solid var(--purple-dark);
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #FFFFFF;
        }

        .btn-primary-soft:hover {
            border-color: var(--berry);
            background: linear-gradient(120deg, #67538A, #B35A8A);
            color: #FFFFFF;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(82, 63, 119, .12);
        }

        .btn-outline-soft {
            border: 1px solid #D9CDE6;
            background: #F5F0FA;
            color: var(--purple-dark);
        }

        .btn-outline-soft:hover {
            border-color: var(--purple-medium);
            background: var(--purple-medium);
            color: #FFFFFF;
        }

        .btn-export-excel {
            border: 1px solid #C2DFCA;
            background: linear-gradient(120deg, #EAF4ED, #D8EDE0);
            color: #2E6645;
        }

        .btn-export-excel:hover {
            border-color: #2E6645;
            background: #2E6645;
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .btn-export-pdf {
            border: 1px solid #EBC4D4;
            background: linear-gradient(120deg, #FCEBF1, #F6D8E4);
            color: #963F5A;
        }

        .btn-export-pdf:hover {
            border-color: #963F5A;
            background: #963F5A;
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .filter-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .filter-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .chart-box {
            position: relative;
            height: 310px;
            width: 100%;
        }

        .breakdown-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid #F0EBF3;
        }

        .breakdown-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 11px;
            border: 1px solid #E6DBEF;
            border-radius: 20px;
            background: #FAF7FC;
            color: var(--text-primary);
            font-size: 12px;
        }

        .breakdown-chip strong {
            color: var(--berry);
        }

        .status-legend-list {
            display: grid;
            gap: 8px;
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px solid #F0EBF3;
        }

        .status-legend-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-secondary);
        }

        .status-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 7px;
            border-radius: 50%;
        }

        .recap-table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .recap-table {
            width: 100%;
            min-width: 1180px;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .recap-table thead th {
            padding: 16px 14px;
            background: linear-gradient(110deg, #F0EAF7, #F8EAF0);
            color: var(--purple-dark);
            border-bottom: 1px solid #E3D9ED;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .recap-table tbody td {
            padding: 16px 14px;
            color: var(--text-primary);
            border-color: #F0EBF3;
            font-size: 13px;
            line-height: 1.7;
            vertical-align: middle;
        }

        .recap-table.table-hover tbody tr:hover {
            background: #FCF9FD;
        }

        .number-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: #F1ECF7;
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 700;
        }

        .training-link {
            color: var(--purple-dark);
            font-weight: 700;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .training-link:hover {
            color: var(--berry);
            text-decoration: underline;
        }

        .date-cell {
            white-space: nowrap;
            font-weight: 500;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-approved,
        .badge-selesai {
            background: #E6F2EA;
            color: #356B4B;
        }

        .badge-revision,
        .badge-ditunda {
            background: #F9EED8;
            color: #805A16;
        }

        .badge-rejected,
        .badge-dibatalkan {
            background: #FCEBF0;
            color: #963F5A;
        }

        .badge-draft,
        .badge-akan {
            background: #F0EAF7;
            color: #523F77;
        }

        .badge-ongoing {
            background: #E2ECF8;
            color: #466485;
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
            width: 72px;
            height: 72px;
            margin: 0 auto 16px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(135deg, #F0EAF7, #F8EAF0);
            color: var(--purple-medium);
            font-size: 30px;
        }

        .empty-state h6 {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 16px;
            font-weight: 700;
        }

        .empty-state p {
            max-width: 460px;
            margin: auto;
            font-size: 13px;
            line-height: 1.8;
        }

        .result-count {
            color: var(--text-secondary);
            font-size: 13px;
        }

        .footer-text {
            padding: 25px 0 5px;
            color: var(--text-secondary);
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 1399px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 1199px) {
            .main-content {
                padding: 28px 23px 38px;
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

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .summary-card {
                min-height: 145px;
                padding: 16px;
            }

            .summary-value {
                font-size: 25px;
            }

            .content-card {
                padding: 17px;
                border-radius: 14px;
            }

            .filter-btn-group {
                width: 100%;
            }

            .filter-btn-group > * {
                flex: 1;
            }
        }

        @media (max-width: 460px) {
            .stats-grid {
                grid-template-columns: 1fr;
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
                    Rekap Kegiatan Pelatihan
                </li>
            </ol>
        </nav>

        <div class="page-header-row">
            <div>
                <div class="page-eyebrow">
                    <i class="bi bi-bar-chart-line"></i>
                    ANALISIS & PELAPORAN BAPELKES
                </div>

                <h1 class="page-title">Rekap Kegiatan Pelatihan</h1>

                <p class="page-description">
                    Analisis perkembangan dan daftar kegiatan pelatihan berdasarkan periode tahunan, triwulan, dan bulanan.
                </p>
            </div>

            <span class="period-pill">
                <i class="bi bi-calendar3"></i>
                {{ $periodLabel }}
            </span>
        </div>

        <section class="stats-grid">
            <div class="summary-card pink">
                <div class="summary-top">
                    <div class="summary-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>
                </div>
                <div>
                    <div class="summary-label">Total Kegiatan Pelatihan</div>
                    <div class="summary-value">{{ number_format($stats['total_trainings'], 0, ',', '.') }}</div>
                    <div class="summary-note">Sesuai periode dan filter aktif.</div>
                </div>
            </div>

            <div class="summary-card lavender">
                <div class="summary-top">
                    <div class="summary-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div>
                    <div class="summary-label">Total Peserta Pelatihan</div>
                    <div class="summary-value">{{ number_format($stats['total_participants'], 0, ',', '.') }}</div>
                    <div class="summary-note">Akumulasi peserta pada periode terpilih.</div>
                </div>
            </div>

            <div class="summary-card mint">
                <div class="summary-top">
                    <div class="summary-icon">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                </div>
                <div>
                    <div class="summary-label">Kegiatan Selesai</div>
                    <div class="summary-value">{{ number_format($stats['completed_count'], 0, ',', '.') }}</div>
                    <div class="summary-note">Kegiatan yang telah tuntas dilaksanakan.</div>
                </div>
            </div>

            <div class="summary-card blue">
                <div class="summary-top">
                    <div class="summary-icon">
                        <i class="bi bi-play-circle-fill"></i>
                    </div>
                </div>
                <div>
                    <div class="summary-label">Sedang Berlangsung</div>
                    <div class="summary-value">{{ number_format($stats['ongoing_count'], 0, ',', '.') }}</div>
                    <div class="summary-note">Kegiatan yang sedang aktif berjalan.</div>
                </div>
            </div>

            <div class="summary-card rose">
                <div class="summary-top">
                    <div class="summary-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
                <div>
                    <div class="summary-label">Akan Dilaksanakan</div>
                    <div class="summary-value">{{ number_format($stats['upcoming_count'], 0, ',', '.') }}</div>
                    <div class="summary-note">Kegiatan yang dijadwalkan mendatang.</div>
                </div>
            </div>
        </section>

        <section class="content-card filter-card">
            <div class="section-heading">
                <div class="section-icon">
                    <i class="bi bi-funnel"></i>
                </div>

                <div>
                    <h5 class="section-title">Filter Periode & Kriteria Rekap</h5>
                    <p class="section-description">
                        Pengelompokan periode menggunakan tanggal mulai pelaksanaan (start date) dan terpisah dari tahun anggaran.
                    </p>
                </div>
            </div>

            <div class="period-tabs">
                <button type="button" class="period-tab {{ $filters['period_type'] === 'yearly' ? 'active' : '' }}" data-period="yearly">
                    <i class="bi bi-calendar-range"></i>
                    Rekap Tahunan
                </button>
                <button type="button" class="period-tab {{ $filters['period_type'] === 'quarterly' ? 'active' : '' }}" data-period="quarterly">
                    <i class="bi bi-grid-3x3-gap"></i>
                    Rekap Triwulan
                </button>
                <button type="button" class="period-tab {{ $filters['period_type'] === 'monthly' ? 'active' : '' }}" data-period="monthly">
                    <i class="bi bi-calendar-month"></i>
                    Rekap Bulanan
                </button>
            </div>

            <form action="{{ route('recap.index') }}" method="GET" id="recapFilterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-4 col-lg-3">
                        <label for="period_type" class="form-label">Jenis Periode Rekap</label>
                        <select name="period_type" id="period_type" class="form-select">
                            <option value="yearly" @selected($filters['period_type'] === 'yearly')>Rekap Tahunan</option>
                            <option value="quarterly" @selected($filters['period_type'] === 'quarterly')>Rekap Triwulan</option>
                            <option value="monthly" @selected($filters['period_type'] === 'monthly')>Rekap Bulanan</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3">
                        <label for="year" class="form-label">Tahun Pelaksanaan</label>
                        <select name="year" id="year" class="form-select">
                            <option value="" id="allYearsOption" @selected($filters['year'] === null)>
                                Semua Tahun
                            </option>
                            @foreach ($availableYears as $yearOption)
                                <option value="{{ $yearOption }}" @selected((int) $filters['year'] === (int) $yearOption)>
                                    {{ $yearOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3 {{ $filters['period_type'] === 'quarterly' ? '' : 'd-none' }}" id="quarterFieldGroup">
                        <label for="quarter" class="form-label">Triwulan</label>
                        <select name="quarter" id="quarter" class="form-select">
                            <option value="">Semua Triwulan (I–IV)</option>
                            @foreach ($quarters as $quarterKey => $quarterMeta)
                                <option value="{{ $quarterKey }}" @selected((int) $filters['quarter'] === (int) $quarterKey)>
                                    {{ $quarterMeta['label'] }} ({{ $quarterMeta['range'] }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3 {{ $filters['period_type'] === 'monthly' ? '' : 'd-none' }}" id="monthFieldGroup">
                        <label for="month" class="form-label">Bulan</label>
                        <select name="month" id="month" class="form-select">
                            <option value="">Semua Bulan (Jan–Des)</option>
                            @foreach ($months as $monthKey => $monthName)
                                <option value="{{ $monthKey }}" @selected((int) $filters['month'] === (int) $monthKey)>
                                    {{ $monthName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <label for="organizer" class="form-label">Penyelenggara</label>
                        <select name="organizer" id="organizer" class="form-select">
                            <option value="">Semua Penyelenggara</option>
                            @foreach ($organizers as $organizerOption)
                                <option value="{{ $organizerOption }}" @selected($filters['organizer'] === $organizerOption)>
                                    {{ $organizerOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <label for="approval_status" class="form-label">Status Persetujuan</label>
                        <select name="approval_status" id="approval_status" class="form-select">
                            <option value="">Semua Status Persetujuan</option>
                            @foreach ($approvalStatuses as $statusKey => $statusLabel)
                                <option value="{{ $statusKey }}" @selected($filters['approval_status'] === $statusKey)>
                                    {{ $statusLabel }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <label for="execution_status" class="form-label">Status Pelaksanaan</label>
                        <select name="execution_status" id="execution_status" class="form-select">
                            <option value="">Semua Status Pelaksanaan</option>
                            @foreach ($executionStatuses as $statusKey => $statusLabel)
                                <option value="{{ $statusKey }}" @selected($filters['execution_status'] === $statusKey)>
                                    {{ $statusLabel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="filter-actions">
                    <div class="filter-btn-group">
                        <button type="submit" class="btn-primary-soft">
                            <i class="bi bi-search"></i>
                            Terapkan Filter
                        </button>

                        <a href="{{ route('recap.index') }}" class="btn-outline-soft">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            Reset Filter
                        </a>
                    </div>

                    <div class="filter-btn-group">
                        <a href="{{ route('recap.export.excel', request()->query()) }}" class="btn-export-excel">
                            <i class="bi bi-file-earmark-excel"></i>
                            Export Excel (.xlsx)
                        </a>

                        <a href="{{ route('recap.export.pdf', request()->query()) }}" class="btn-export-pdf">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Export PDF (.pdf)
                        </a>
                    </div>
                </div>
            </form>
        </section>

        <section class="row g-4 mb-4">
            <div class="col-12 col-xl-8">
                <div class="content-card h-100 mb-0">
                    <div class="section-heading">
                        <div class="section-icon lavender">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>

                        <div>
                            <h5 class="section-title">{{ $periodBreakdown['chart_title'] }}</h5>
                            <p class="section-description">{{ $periodBreakdown['chart_subtitle'] }}</p>
                        </div>
                    </div>

                    <div class="chart-box">
                        <canvas id="periodChart"></canvas>
                    </div>

                    @if (count($periodBreakdown['rows']) > 0)
                        <div class="breakdown-list">
                            @foreach ($periodBreakdown['rows'] as $row)
                                <span class="breakdown-chip">
                                    <span>{{ $row['label'] }}:</span>
                                    <strong>{{ $row['count'] }}</strong>
                                    <span class="text-secondary">({{ number_format($row['participants'], 0, ',', '.') }} peserta)</span>
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="content-card h-100 mb-0">
                    <div class="section-heading">
                        <div class="section-icon blue">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>

                        <div>
                            <h5 class="section-title">Distribusi Status Kegiatan</h5>
                            <p class="section-description">Proporsi status pelaksanaan pada filter aktif.</p>
                        </div>
                    </div>

                    <div class="chart-box">
                        <canvas id="statusChart"></canvas>
                    </div>

                    <div class="status-legend-list">
                        <div class="status-legend-row">
                            <span><span class="status-dot" style="background: #49866A;"></span>Selesai</span>
                            <strong>{{ $stats['completed_count'] }}</strong>
                        </div>
                        <div class="status-legend-row">
                            <span><span class="status-dot" style="background: #7880AE;"></span>Sedang Berlangsung</span>
                            <strong>{{ $stats['ongoing_count'] }}</strong>
                        </div>
                        <div class="status-legend-row">
                            <span><span class="status-dot" style="background: #B35A8A;"></span>Akan Dilaksanakan</span>
                            <strong>{{ $stats['upcoming_count'] }}</strong>
                        </div>
                        <div class="status-legend-row">
                            <span><span class="status-dot" style="background: #C9924A;"></span>Ditunda</span>
                            <strong>{{ $stats['delayed_count'] }}</strong>
                        </div>
                        <div class="status-legend-row">
                            <span><span class="status-dot" style="background: #B65367;"></span>Dibatalkan</span>
                            <strong>{{ $stats['cancelled_count'] }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-card">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div class="section-heading mb-0">
                    <div class="section-icon">
                        <i class="bi bi-table"></i>
                    </div>

                    <div>
                        <h5 class="section-title">Daftar Kegiatan Pelatihan</h5>
                        <p class="section-description">
                            Data kegiatan sesuai periode <strong>{{ $periodLabel }}</strong> ({{ $activeFilterSummary }}).
                        </p>
                    </div>
                </div>

                <span class="result-count">
                    <i class="bi bi-list-ul me-1"></i>
                    {{ number_format($trainings->count(), 0, ',', '.') }} kegiatan ditemukan
                </span>
            </div>

            <div class="recap-table-wrapper">
                <table class="table table-hover recap-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kegiatan Pelatihan</th>
                            <th>Penyelenggara</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jumlah Peserta</th>
                            <th>Tahun Anggaran</th>
                            <th>Status Persetujuan</th>
                            <th>Status Pelaksanaan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($trainings as $training)
                            @php
                                $approvalKey = array_key_exists($training->approval_status ?? '', $approvalStatuses)
                                    ? $training->approval_status
                                    : 'draft';
                                $approvalLabel = $approvalStatuses[$approvalKey] ?? 'Menunggu Persetujuan';

                                $executionKey = $training->execution_status ?? '';
                                $executionLabel = $executionStatuses[$executionKey] ?? '-';

                                $executionBadgeClass = match ($executionKey) {
                                    'selesai' => 'badge-selesai',
                                    'sedang_berlangsung' => 'badge-ongoing',
                                    'ditunda' => 'badge-ditunda',
                                    'dibatalkan' => 'badge-dibatalkan',
                                    default => 'badge-akan',
                                };
                            @endphp

                            <tr>
                                <td>
                                    <span class="number-badge">{{ $loop->iteration }}</span>
                                </td>

                                <td>
                                    <a href="{{ route('trainings.show', $training) }}" class="training-link">
                                        {{ $training->training_name }}
                                    </a>
                                </td>

                                <td>{{ $training->organizer ?: '-' }}</td>

                                <td class="date-cell">
                                    {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                                </td>

                                <td class="date-cell">
                                    {{ $training->end_date?->format('d/m/Y') ?? '-' }}
                                </td>

                                <td class="fw-semibold">
                                    {{ number_format((int) ($training->participant_count ?? 0), 0, ',', '.') }} orang
                                </td>

                                <td>{{ $training->budget_year ?: '-' }}</td>

                                <td>
                                    <span class="status-badge badge-{{ $approvalKey }}">
                                        {{ $approvalLabel }}
                                    </span>
                                </td>

                                <td>
                                    <span class="status-badge {{ $executionBadgeClass }}">
                                        {{ $executionLabel }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="bi bi-calendar-x"></i>
                                        </div>

                                        <h6>Belum Ada Kegiatan pada Periode Ini</h6>

                                        <p>
                                            Tidak ditemukan kegiatan pelatihan yang sesuai dengan periode dan filter aktif.
                                            Silakan ubah pilihan filter atau tekan tombol Reset Filter.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <footer class="footer-text">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <script>
        (function () {
            const periodSelect = document.getElementById('period_type');
            const yearSelect = document.getElementById('year');
            const allYearsOption = document.getElementById('allYearsOption');
            const quarterGroup = document.getElementById('quarterFieldGroup');
            const monthGroup = document.getElementById('monthFieldGroup');
            const quarterSelect = document.getElementById('quarter');
            const monthSelect = document.getElementById('month');
            const periodTabs = document.querySelectorAll('.period-tab');
            const filterForm = document.getElementById('recapFilterForm');

            function syncPeriodControls(periodType) {
                const isYearly = periodType === 'yearly';
                const isQuarterly = periodType === 'quarterly';
                const isMonthly = periodType === 'monthly';

                quarterGroup.classList.toggle('d-none', !isQuarterly);
                monthGroup.classList.toggle('d-none', !isMonthly);

                if (!isQuarterly) {
                    quarterSelect.value = '';
                }

                if (!isMonthly) {
                    monthSelect.value = '';
                }

                allYearsOption.hidden = !isYearly;
                allYearsOption.disabled = !isYearly;

                if (!isYearly && !yearSelect.value && yearSelect.options.length > 1) {
                    yearSelect.value = yearSelect.options[1].value;
                }

                periodTabs.forEach(function (tab) {
                    tab.classList.toggle('active', tab.dataset.period === periodType);
                });
            }

            periodSelect.addEventListener('change', function () {
                syncPeriodControls(this.value);
            });

            periodTabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    const chosen = this.dataset.period;
                    periodSelect.value = chosen;
                    syncPeriodControls(chosen);
                    filterForm.submit();
                });
            });

            syncPeriodControls(periodSelect.value);

            const periodLabels = @json($periodBreakdown['labels']);
            const periodCounts = @json($periodBreakdown['counts']);
            const statusLabels = @json($statusChart['labels']);
            const statusCounts = @json($statusChart['counts']);

            const periodCanvas = document.getElementById('periodChart');
            if (periodCanvas) {
                new Chart(periodCanvas, {
                    type: 'bar',
                    data: {
                        labels: periodLabels,
                        datasets: [
                            {
                                label: 'Jumlah Kegiatan',
                                data: periodCounts,
                                backgroundColor: 'rgba(179, 90, 138, 0.78)',
                                borderColor: '#523F77',
                                borderWidth: 1.5,
                                borderRadius: 8,
                                maxBarThickness: 46
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    color: '#71697B',
                                    font: {
                                        family: 'Poppins'
                                    }
                                },
                                grid: {
                                    color: '#EFEAF4'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#51445D',
                                    font: {
                                        family: 'Poppins',
                                        size: 11
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            const statusCanvas = document.getElementById('statusChart');
            if (statusCanvas) {
                const totalStatus = statusCounts.reduce(function (sum, value) {
                    return sum + value;
                }, 0);

                new Chart(statusCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: totalStatus > 0 ? statusLabels : ['Belum Ada Data'],
                        datasets: [
                            {
                                data: totalStatus > 0 ? statusCounts : [1],
                                backgroundColor: totalStatus > 0
                                    ? ['#49866A', '#7880AE', '#B35A8A', '#C9924A', '#B65367']
                                    : ['#E9E3EF'],
                                borderColor: '#FFFFFF',
                                borderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '62%',
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }
        })();
    </script>
</body>
</html>
