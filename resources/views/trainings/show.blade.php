<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

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
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            min-height: 82px;
            padding: 17px 35px;
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .topbar h2 {
            margin: 0 0 5px;
            color: var(--purple-dark);
            font-size: 20px;
            font-weight: 700;
        }

        .topbar p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            background: #F3EEF8;
            border: 1px solid #E3D9ED;
            border-radius: 30px;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .page-content {
            max-width: 1700px;
            margin: auto;
            padding: 30px 35px 45px;
        }

        .breadcrumb {
            margin-bottom: 22px;
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--purple-medium);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--berry);
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-title {
            margin: 0 0 8px;
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

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 10px 16px;
            background: #fff;
            border: 1px solid #D9CDE6;
            border-radius: 9px;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-back:hover {
            background: #F3EEF8;
            border-color: var(--purple-medium);
            color: var(--purple-dark);
        }

        .detail-card {
            overflow: hidden;
            margin-bottom: 22px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(82, 63, 119, .045);
        }

        .training-overview {
            position: relative;
            overflow: hidden;
            padding: 32px;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.18), transparent 35%),
                linear-gradient(120deg, #523F77 0%, #67538A 60%, #7880AE 100%);
            color: #fff;
        }

        .overview-content {
            position: relative;
            z-index: 1;
        }

        .overview-decoration {
            position: absolute;
            right: 35px;
            bottom: -55px;
            color: #fff;
            font-size: 190px;
            opacity: .09;
            pointer-events: none;
        }

        .overview-label {
            margin-bottom: 12px;
            color: #F6DCE7;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .overview-title {
            margin: 0 0 15px;
            color: #fff;
            font-size: 27px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .overview-location {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            color: #F1EAF6;
            font-size: 15px;
            line-height: 1.7;
        }

        .overview-location i {
            margin-top: 3px;
            color: #F6B7C7;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.5;
            white-space: nowrap;
        }

        .status-draft {
            background: #F9EED8;
            color: #805A16;
        }

        .status-approved {
            background: #E6F2EA;
            color: #356B4B;
        }

        .status-revision {
            background: #FCEBF0;
            color: #963F5A;
        }

        .status-rejected {
            background: #F4E3E8;
            color: #92364E;
        }

        .status-default {
            background: #F0EBF7;
            color: var(--purple-dark);
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 23px 27px;
            background: linear-gradient(110deg, #FCF9FD, #F9F0F5);
            border-bottom: 1px solid var(--border);
        }

        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #F9DCE9, #E9C9DC);
            border: 1px solid #EDD5E3;
            border-radius: 13px;
            color: var(--berry);
            font-size: 22px;
        }

        .section-icon.lavender {
            background: linear-gradient(135deg, #E9DDF5, #C9B5E1);
            border-color: #D8CBE8;
            color: var(--purple-medium);
        }

        .section-icon.blue {
            background: linear-gradient(135deg, #E2ECF8, #B7CEE8);
            border-color: #CBDCEC;
            color: #557A9B;
        }

        .section-heading {
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

        .card-body-custom {
            padding: 27px;
        }

        .detail-item {
            height: 100%;
            min-height: 105px;
            padding: 17px 19px;
            background:
                radial-gradient(circle at 100% 0%, rgba(182,165,206,.12), transparent 45%),
                linear-gradient(135deg, #FCFAFD, #F8F5FA);
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: border-color .2s ease, transform .2s ease;
        }

        .detail-item:hover {
            border-color: #CFC0E0;
            transform: translateY(-2px);
        }

        .detail-label {
            margin-bottom: 9px;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
        }

        .detail-value {
            color: var(--text-primary);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .detail-value i {
            color: var(--berry);
        }

        .notes-box {
            padding: 19px;
            background: linear-gradient(135deg, #F9EEF4, #F1EBF7);
            border: 1px solid #E9DCEB;
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .approval-info {
            height: 100%;
            min-height: 105px;
            padding: 19px;
            background: linear-gradient(135deg, #F3EEF8, #FCF8FB);
            border: 1px solid #E7DDEF;
            border-radius: 12px;
        }

        .approval-info .detail-value {
            font-size: 15px;
        }

        .approval-notes {
            padding: 19px;
            background: linear-gradient(135deg, #FFF4E4, #FBEAF0);
            border: 1px solid #F0DEC9;
            border-radius: 12px;
            color: #74551D;
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .status-execution {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .execution-upcoming {
            background: #EAF0F8;
            color: #4B608C;
        }

        .execution-ongoing {
            background: #E6F2EA;
            color: #356B4B;
        }

        .execution-completed {
            background: #E6F2EA;
            color: #356B4B;
        }

        .execution-delayed {
            background: #F9EED8;
            color: #805A16;
        }

        .execution-cancelled {
            background: #FCEBF0;
            color: #963F5A;
        }

        .creator-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 7px;
            padding: 15px;
            background: #F7F3F9;
            border: 1px solid var(--border);
            border-radius: 11px;
        }

        .creator-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 43px;
            height: 43px;
            background: linear-gradient(135deg, #F9DCE9, #E9DDF5);
            border-radius: 12px;
            color: var(--purple-dark);
            font-size: 20px;
        }

        .empty-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 16px;
            background: #F3EEF8;
            border: 1px solid #E3D9ED;
            border-radius: 11px;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .empty-note i {
            color: var(--purple-medium);
            font-size: 17px;
        }

        .action-area {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 11px;
            margin: 26px 0;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 45px;
            padding: 10px 17px;
            border: 1px solid transparent;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(82,63,119,.1);
        }

        .btn-purple {
            background: linear-gradient(120deg, #523F77, #67538A);
            border-color: var(--purple-dark);
            color: #fff;
        }

        .btn-purple:hover {
            background: linear-gradient(120deg, #67538A, #7880AE);
            border-color: var(--purple-medium);
            color: #fff;
        }

        .btn-berry {
            background: linear-gradient(120deg, #B35A8A, #C77BA1);
            border-color: var(--berry);
            color: #fff;
        }

        .btn-berry:hover {
            background: linear-gradient(120deg, #A54D7C, #B35A8A);
            border-color: var(--berry);
            color: #fff;
        }

        .btn-outline-purple {
            background: #fff;
            border-color: #D9CDE6;
            color: var(--purple-dark);
        }

        .btn-outline-purple:hover {
            background: #F3EEF8;
            border-color: var(--purple-medium);
            color: var(--purple-dark);
        }

        .footer-text {
            padding: 20px 0 5px;
            color: var(--text-secondary);
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .page-content {
                padding: 25px 22px 35px;
            }

            .topbar {
                padding: 17px 22px;
            }

            .training-overview {
                padding: 27px;
            }

            .card-body-custom {
                padding: 22px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
            }

            .topbar {
                align-items: flex-start;
                padding: 16px 18px;
            }

            .topbar h2 {
                font-size: 18px;
            }

            .topbar p {
                max-width: 230px;
                font-size: 13px;
                line-height: 1.7;
            }

            .role-badge {
                padding: 7px 10px;
                font-size: 11px;
            }

            .page-content {
                padding: 20px 15px 30px;
            }

            .page-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 24px;
            }

            .page-description {
                font-size: 14px;
            }

            .training-overview {
                padding: 23px 20px;
            }

            .overview-title {
                font-size: 22px;
            }

            .overview-decoration {
                right: -5px;
                font-size: 125px;
            }

            .card-header-custom {
                padding: 18px;
            }

            .card-body-custom {
                padding: 18px;
            }

            .section-heading {
                font-size: 17px;
            }

            .action-area {
                justify-content: stretch;
            }

            .action-area .btn-action {
                flex: 1 1 100%;
            }

            .status-badge {
                white-space: normal;
            }
        }

        @media (max-width: 420px) {
            .topbar {
                gap: 8px;
            }

            .role-badge {
                gap: 5px;
                font-size: 10px;
            }

            .section-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .section-heading {
                font-size: 16px;
            }

            .detail-item {
                min-height: 95px;
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

        <header class="topbar">
            <div>
                <h2>Detail Kegiatan Pelatihan</h2>
                <p>Informasi lengkap dan status kegiatan pelatihan Bapelkes.</p>
            </div>

            <span class="role-badge">
                <i class="bi bi-shield-check"></i>
                {{ auth()->user()->role?->name ?? 'Pengguna' }}
            </span>
        </header>

        <div class="page-content">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('trainings.index') }}">Data Kegiatan Pelatihan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Detail Kegiatan
                    </li>
                </ol>
            </nav>

            <div class="page-heading">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2" style="color: var(--berry); font-size: 13px; font-weight: 700; letter-spacing: .5px;">
                        <i class="bi bi-journal-text"></i>
                        INFORMASI KEGIATAN
                    </div>

                    <h1 class="page-title">Detail Kegiatan Pelatihan</h1>

                    <p class="page-description">
                        Lihat informasi, status persetujuan, dan pelaksanaan kegiatan pelatihan.
                    </p>
                </div>

                <a href="{{ route('trainings.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Daftar
                </a>
            </div>

            <section class="detail-card">
                <div class="training-overview">
                    <i class="bi bi-buildings overview-decoration"></i>

                    <div class="overview-content">
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
                            <div class="flex-grow-1">
                                <div class="overview-label">Kegiatan Pelatihan Bapelkes</div>

                                <h3 class="overview-title">
                                    {{ $training->training_name }}
                                </h3>

                                <div class="overview-location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    {{ $training->venue ?: 'Tempat belum ditentukan' }}
                                </div>
                            </div>

                            <div>
                                @if ($training->approval_status === 'approved')
                                    <span class="status-badge status-approved">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Disetujui
                                    </span>
                                @elseif ($training->approval_status === 'revision')
                                    <span class="status-badge status-revision">
                                        <i class="bi bi-pencil-square"></i>
                                        Perlu Revisi
                                    </span>
                                @elseif ($training->approval_status === 'rejected')
                                    <span class="status-badge status-rejected">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Ditolak
                                    </span>
                                @else
                                    <span class="status-badge status-draft">
                                        <i class="bi bi-clock-fill"></i>
                                        Menunggu Persetujuan
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header-custom">
                    <div class="section-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>
                    <div>
                        <h5 class="section-heading">Informasi Kegiatan</h5>
                        <p class="section-description">
                            Rincian data dan pelaksanaan kegiatan pelatihan.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Nama Pelatihan</div>
                                <div class="detail-value">
                                    {{ $training->training_name }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Penyelenggara</div>
                                <div class="detail-value">
                                    {{ $training->organizer ?: '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Tanggal Mulai</div>
                                <div class="detail-value">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ $training->start_date?->format('d F Y') ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Tanggal Selesai</div>
                                <div class="detail-value">
                                    <i class="bi bi-calendar-check me-1"></i>
                                    {{ $training->end_date?->format('d F Y') ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Tempat Pelaksanaan</div>
                                <div class="detail-value">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    {{ $training->venue ?: '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Jumlah Peserta</div>
                                <div class="detail-value">
                                    <i class="bi bi-people me-1"></i>
                                    {{ number_format($training->participant_count, 0, ',', '.') }} orang
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Sumber Dana</div>
                                <div class="detail-value">
                                    {{ $training->funding_source ?: '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Tahun Anggaran</div>
                                <div class="detail-value">
                                    {{ $training->budget_year ?: '-' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-label mt-4">Catatan Kegiatan</div>
                    <div class="notes-box">
                        {{ $training->event_notes ?: 'Belum ada catatan kegiatan.' }}
                    </div>
                </div>
            </section>

            <section class="detail-card">
                <div class="card-header-custom">
                    <div class="section-icon lavender">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div>
                        <h5 class="section-heading">Informasi Persetujuan</h5>
                        <p class="section-description">
                            Status dan informasi keputusan pemeriksaan kegiatan oleh Dalmut.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">
                    <div class="detail-label">Status Persetujuan</div>

                    <div class="mb-4">
                        @if ($training->approval_status === 'approved')
                            <span class="status-badge status-approved">
                                <i class="bi bi-check-circle-fill"></i>
                                Disetujui
                            </span>
                        @elseif ($training->approval_status === 'revision')
                            <span class="status-badge status-revision">
                                <i class="bi bi-pencil-square"></i>
                                Perlu Revisi
                            </span>
                        @elseif ($training->approval_status === 'rejected')
                            <span class="status-badge status-rejected">
                                <i class="bi bi-x-circle-fill"></i>
                                Ditolak
                            </span>
                        @else
                            <span class="status-badge status-draft">
                                <i class="bi bi-clock-fill"></i>
                                Menunggu Persetujuan
                            </span>
                        @endif
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="approval-info">
                                <div class="detail-label">
                                    <i class="bi bi-person-check me-1" style="color: var(--berry);"></i>
                                    Diputuskan Oleh
                                </div>
                                <div class="detail-value">
                                    {{ $training->approvalDecider?->name ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="approval-info">
                                <div class="detail-label">
                                    <i class="bi bi-clock-history me-1" style="color: var(--berry);"></i>
                                    Tanggal dan Waktu Keputusan
                                </div>
                                <div class="detail-value">
                                    {{ $training->approval_decided_at?->format('d F Y, H:i') ?? '-' }}

                                    @if ($training->approval_decided_at)
                                        <span class="text-secondary fw-normal">WITA</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($training->approval_notes)
                        <div class="detail-label">Catatan dari Dalmut</div>

                        <div class="approval-notes">
                            <div class="fw-semibold mb-2">
                                @if ($training->approval_status === 'revision')
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Catatan Revisi
                                @elseif ($training->approval_status === 'rejected')
                                    <i class="bi bi-exclamation-circle me-1"></i>
                                    Alasan Penolakan
                                @else
                                    <i class="bi bi-chat-left-text me-1"></i>
                                    Catatan Keputusan
                                @endif
                            </div>

                            {{ $training->approval_notes }}
                        </div>
                    @else
                        <div class="empty-note">
                            <i class="bi bi-info-circle"></i>
                            <span>Belum ada catatan keputusan dari Dalmut.</span>
                        </div>
                    @endif
                </div>
            </section>

            <section class="detail-card">
                <div class="card-header-custom">
                    <div class="section-icon blue">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <div>
                        <h5 class="section-heading">Status Pelaksanaan</h5>
                        <p class="section-description">
                            Informasi kondisi dan jadwal pelaksanaan kegiatan.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">
                    <div class="detail-label">Status Kegiatan</div>

                    <div class="mb-4">
                        @switch($training->execution_status)
                            @case('sedang_berlangsung')
                                <span class="status-execution execution-ongoing">
                                    <i class="bi bi-play-circle-fill"></i>
                                    Sedang Berlangsung
                                </span>
                                @break

                            @case('ditunda')
                                <span class="status-execution execution-delayed">
                                    <i class="bi bi-clock-history"></i>
                                    Ditunda
                                </span>
                                @break

                            @case('dibatalkan')
                                <span class="status-execution execution-cancelled">
                                    <i class="bi bi-x-circle-fill"></i>
                                    Dibatalkan
                                </span>
                                @break

                            @case('selesai')
                                <span class="status-execution execution-completed">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Selesai
                                </span>
                                @break

                            @default
                                <span class="status-execution execution-upcoming">
                                    <i class="bi bi-calendar-event"></i>
                                    Akan Dilaksanakan
                                </span>
                        @endswitch
                    </div>

                    @if ($training->delay_reason)
                        <div class="detail-label">Alasan Penundaan atau Pembatalan</div>
                        <div class="notes-box mb-4">
                            {{ $training->delay_reason }}
                        </div>
                    @endif

                    @if ($training->rescheduled_date)
                        <div class="detail-item mb-4">
                            <div class="detail-label">Tanggal Penjadwalan Ulang</div>
                            <div class="detail-value">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ $training->rescheduled_date->format('d F Y') }}
                            </div>
                        </div>
                    @endif

                    <div class="detail-label">Dibuat Oleh</div>
                    <div class="creator-info">
                        <div class="creator-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <div class="detail-label mb-1">Pengguna yang menambahkan kegiatan</div>
                            <div class="detail-value">
                                {{ $training->creator?->name ?? 'Pengguna tidak tersedia' }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="action-area">
                <a href="{{ route('trainings.index') }}" class="btn-action btn-outline-purple">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Daftar
                </a>

                <a href="{{ route('trainings.documents.index', $training) }}" class="btn-action btn-purple">
                    <i class="bi bi-folder2-open"></i>
                    Dokumen Kegiatan
                </a>

                @if (in_array(auth()->user()->role?->slug, ['penglat', 'admin']))
                    <a href="{{ route('trainings.edit', $training) }}" class="btn-action btn-berry">
                        <i class="bi bi-pencil-square"></i>
                        Edit Kegiatan
                    </a>
                @endif
            </div>

            <footer class="footer-text">
                © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
                <span class="mx-1">·</span>
                Sistem Informasi Internal
            </footer>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
