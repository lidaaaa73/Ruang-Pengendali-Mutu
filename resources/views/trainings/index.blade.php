<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

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
            --success: #3D7756;
            --warning: #93651E;
            --danger: #A34258;
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
            padding: 32px 35px 45px;
            min-height: 100vh;
            max-width: 1800px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            color: var(--berry);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .page-title {
            margin: 0 0 9px;
            color: var(--purple-dark);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 15px;
            line-height: 1.8;
        }

        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 46px;
            padding: 11px 19px;
            border: 1px solid var(--purple-dark);
            border-radius: 10px;
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 5px 13px rgba(82,63,119,.13);
            transition: .2s ease;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(120deg, #67538A, #7880AE);
            border-color: var(--purple-medium);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(82,63,119,.17);
        }

        .alert {
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.8;
        }

        .alert-success {
            background: #EAF3ED;
            border-color: #CFE3D5;
            color: #356B4B;
        }

        .alert-danger {
            background: #FCEBF0;
            border-color: #EECAD6;
            color: #963F5A;
        }

        .content-card {
            padding: 27px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 5px 20px rgba(82,63,119,.045);
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
        }

        .card-heading h5 {
            margin: 0 0 6px;
            color: var(--purple-dark);
            font-size: 19px;
            font-weight: 700;
        }

        .card-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
        }

        .total-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border: 1px solid #DCCFEA;
            border-radius: 30px;
            background: linear-gradient(135deg, #F0EAF7, #E4D9F0);
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 390px;
        }

        .search-wrapper > i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--purple-medium);
            font-size: 18px;
        }

        .search-input {
            width: 100%;
            min-height: 47px;
            padding: 11px 15px 11px 44px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #FCFAFD;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 14px;
        }

        .search-input::placeholder {
            color: #958AA0;
        }

        .search-input:focus,
        .form-control:focus {
            border-color: var(--berry);
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
            outline: none;
        }

        .table-responsive {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .training-table {
            width: 100%;
            min-width: 1450px;
            margin-bottom: 0;
            font-family: 'Poppins', sans-serif;
            vertical-align: middle;
        }

        .training-table thead th {
            padding: 18px 16px;
            background: linear-gradient(110deg, #F0EAF7, #F8EAF0);
            color: var(--purple-dark);
            border-bottom: 1px solid #E3D9ED;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .training-table tbody td {
            padding: 19px 16px;
            color: var(--text-primary);
            border-color: #F0EBF3;
            font-size: 14px;
            line-height: 1.8;
            vertical-align: middle;
        }

        .training-table tbody tr {
            transition: background .2s ease;
        }

        .training-table tbody tr:hover {
            background: #FCF9FD;
        }

        .training-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
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
            font-size: 15px;
            font-weight: 700;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .training-venue {
            margin-top: 5px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.6;
        }

        .date-text {
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        .date-end {
            margin-top: 5px;
            color: var(--text-secondary);
            font-size: 13px;
            white-space: nowrap;
        }

        .organizer-text {
            min-width: 145px;
            color: var(--text-primary);
            font-size: 14px;
            line-height: 1.7;
        }

        .participant-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border-radius: 9px;
            background: #EDF2F9;
            color: #4F6C92;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.5;
            white-space: nowrap;
        }

        .status-badge i {
            font-size: 13px;
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

        .status-progress {
            background: #E6EDF7;
            color: #4B608C;
        }

        .status-delayed {
            background: #F9EED8;
            color: #805A16;
        }

        .status-cancelled {
            background: #FCEBF0;
            color: #963F5A;
        }

        .status-finished {
            background: #E6F2EA;
            color: #356B4B;
        }

        .status-planned {
            background: #F0EAF7;
            color: var(--purple-dark);
        }

        .approval-note {
            display: flex;
            align-items: flex-start;
            gap: 6px;
            max-width: 220px;
            margin-top: 9px;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.6;
        }

        .approval-note i {
            margin-top: 3px;
            color: var(--berry);
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
            min-width: max-content;
        }

        .action-group form {
            margin: 0;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 39px;
            padding: 8px 11px;
            border: 1px solid transparent;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
            cursor: pointer;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            filter: brightness(.97);
            box-shadow: 0 4px 10px rgba(0,0,0,.07);
        }

        .action-btn i {
            font-size: 15px;
        }

        .action-detail {
            background: #E6EDF7;
            border-color: #D1DFEF;
            color: #4B608C;
        }

        .action-edit {
            background: #F1EAF7;
            border-color: #DED1EB;
            color: var(--purple-dark);
        }

        .action-delete {
            background: #FCEBF0;
            border-color: #EECAD6;
            color: #963F5A;
        }

        .action-approve {
            background: #E6F2EA;
            border-color: #CFE4D6;
            color: #356B4B;
        }

        .action-revision {
            background: #F9EED8;
            border-color: #EED9AA;
            color: #805A16;
        }

        .action-reject {
            background: #FCEBF0;
            border-color: #EECAD6;
            color: #963F5A;
        }

        .action-finish {
            background: linear-gradient(120deg, #F8E6EF, #EEE5F6);
            border-color: #E7D2E6;
            color: var(--purple-dark);
        }

        .action-finish:hover {
            background: linear-gradient(120deg, #F2D7E5, #E4D8F0);
            border-color: var(--berry);
            color: var(--purple-dark);
        }

        .empty-state {
            padding: 55px 20px;
            color: var(--text-secondary);
            text-align: center;
        }

        .empty-state i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 75px;
            height: 75px;
            margin-bottom: 18px;
            border-radius: 20px;
            background: linear-gradient(135deg, #F0EAF7, #F8EAF0);
            color: var(--purple-medium);
            font-size: 32px;
        }

        .empty-state h6 {
            margin-bottom: 9px;
            color: var(--purple-dark);
            font-size: 17px;
            font-weight: 700;
        }

        .empty-state p {
            font-size: 14px;
            line-height: 1.8;
        }

        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 39px;
            min-height: 39px;
            padding: 7px 12px;
            border: 1px solid var(--border);
            border-radius: 8px !important;
            color: var(--purple-dark);
            font-size: 13px;
        }

        .pagination .active .page-link {
            border-color: var(--purple-dark);
            background: var(--purple-dark);
            color: #fff;
        }

        .pagination .page-link:hover {
            border-color: var(--lavender);
            background: #F3EEF8;
            color: var(--purple-dark);
        }

        .pagination .disabled .page-link {
            color: #B5ACBF;
            background: #F9F7FA;
        }

        .delete-modal-content {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 19px;
            box-shadow: 0 20px 60px rgba(54,39,78,.18);
        }

        .delete-icon-wrapper,
        .approve-icon-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 78px;
            height: 78px;
            margin: 0 auto;
            border-radius: 22px;
            font-size: 34px;
        }

        .delete-icon-wrapper {
            background: linear-gradient(135deg, #FCEBF0, #F4D7E1);
            color: #A34258;
        }

        .approve-icon-wrapper {
            background: linear-gradient(135deg, #E6F2EA, #D0E7D8);
            color: #356B4B;
            font-size: 38px;
        }

        .delete-training-name {
            padding: 15px 17px;
            background: linear-gradient(135deg, #F3EEF8, #F9EDF3);
            border: 1px solid var(--border);
            border-radius: 11px;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 700;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .btn-cancel-delete,
        .btn-confirm-delete,
        .btn-approve-confirm {
            min-height: 43px;
            padding: 10px 18px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-cancel-delete {
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-primary);
        }

        .btn-cancel-delete:hover {
            background: #F5F0F8;
            border-color: var(--lavender);
        }

        .btn-confirm-delete {
            border: 1px solid #A34258;
            background: #A34258;
            color: #fff;
        }

        .btn-confirm-delete:hover {
            border-color: #873449;
            background: #873449;
            color: #fff;
        }

        .btn-approve-confirm {
            border: 1px solid #356B4B;
            background: #356B4B;
            color: #fff;
        }

        .btn-approve-confirm:hover {
            border-color: #28573C;
            background: #28573C;
            color: #fff;
        }

        .decision-submit-warning {
            border-color: #A77828;
            background: #A77828;
        }

        .decision-submit-warning:hover {
            border-color: #865F20;
            background: #865F20;
        }

        .decision-submit-danger {
            border-color: #A34258;
            background: #A34258;
        }

        .decision-submit-danger:hover {
            border-color: #873449;
            background: #873449;
        }

        .modal-header .modal-title {
            color: var(--purple-dark);
            font-size: 19px;
            font-weight: 700;
        }

        .modal .form-label {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
        }

        .modal .form-control {
            min-height: 45px;
            padding: 11px 13px;
            border-color: var(--border);
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
        }

        .modal textarea.form-control {
            min-height: auto;
            line-height: 1.7;
        }

        .modal .text-secondary {
            color: var(--text-secondary) !important;
            font-size: 14px;
            line-height: 1.8;
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
                padding: 22px 15px 32px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
                margin-bottom: 22px;
            }

            .page-title {
                font-size: 24px;
            }

            .page-description {
                font-size: 14px;
            }

            .btn-primary-custom {
                width: 100%;
            }

            .content-card {
                padding: 17px;
                border-radius: 14px;
            }

            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-wrapper {
                max-width: 100%;
            }

            .training-table {
                min-width: 1450px;
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

        <div class="page-header">
            <div>
                <div class="page-eyebrow">
                    <i class="bi bi-grid-1x2"></i>
                    PENGELOLAAN MUTU BAPELKES
                </div>

                <h1 class="page-title">Data Kegiatan Pelatihan</h1>

                <p class="page-description">
                    Kelola, pantau, dan periksa informasi kegiatan pelatihan Bapelkes dalam satu sistem.
                </p>
            </div>

            @if (in_array(auth()->user()->role?->slug, ['admin', 'penglat'], true))
                <a href="{{ route('trainings.create') }}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Kegiatan
                </a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="content-card">

            <div class="card-heading">
                <div>
                    <h5>
                        <i class="bi bi-journal-text me-2" style="color: var(--berry);"></i>
                        Daftar Kegiatan Pelatihan
                    </h5>

                    <p class="card-description">
                        Informasi kegiatan yang terdaftar dalam sistem pengendalian mutu.
                    </p>

                    <div class="mt-3">
                        <span class="total-badge">
                            <i class="bi bi-collection"></i>
                            Total {{ $trainings->total() }} kegiatan
                        </span>
                    </div>
                </div>

                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        id="searchTraining"
                        class="form-control search-input"
                        placeholder="Cari nama pelatihan..."
                        aria-label="Cari nama pelatihan"
                    >
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover training-table" id="trainingTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelatihan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Penyelenggara</th>
                            <th>Jumlah Peserta</th>
                            <th>Status Persetujuan</th>
                            <th>Status Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($trainings as $training)
                            <tr>
                                <td>
                                    <span class="training-number">
                                        {{ $trainings->firstItem() + $loop->index }}
                                    </span>
                                </td>

                                <td>
                                    <div class="training-name">
                                        {{ $training->training_name }}
                                    </div>
                                    <div class="training-venue">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ $training->venue ?: '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="date-text">
                                        <i class="bi bi-calendar-event me-1" style="color: var(--berry);"></i>
                                        {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                                    </div>

                                    @if ($training->end_date)
                                        <div class="date-end">
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
                                    <span class="participant-badge">
                                        <i class="bi bi-people"></i>
                                        {{ number_format($training->participant_count, 0, ',', '.') }} orang
                                    </span>
                                </td>

                                <td>
                                    @if ($training->approval_status === 'approved')
                                        <span class="status-badge status-approved">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Disetujui
                                        </span>
                                    @elseif ($training->approval_status === 'revision')
                                        <span class="status-badge status-revision">
                                            <i class="bi bi-arrow-repeat"></i>
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

                                    @if ($training->approval_notes)
                                        <div class="approval-note" title="{{ $training->approval_notes }}">
                                            <i class="bi bi-chat-left-text"></i>
                                            <span>Ada catatan pemeriksa</span>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    @switch($training->execution_status)
                                        @case('sedang_berlangsung')
                                            <span class="status-badge status-progress">
                                                <i class="bi bi-play-circle-fill"></i>
                                                Sedang Berlangsung
                                            </span>
                                            @break

                                        @case('ditunda')
                                            <span class="status-badge status-delayed">
                                                <i class="bi bi-pause-circle-fill"></i>
                                                Ditunda
                                            </span>
                                            @break

                                        @case('dibatalkan')
                                            <span class="status-badge status-cancelled">
                                                <i class="bi bi-x-circle-fill"></i>
                                                Dibatalkan
                                            </span>
                                            @break

                                        @case('selesai')
                                            <span class="status-badge status-finished">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Selesai
                                            </span>
                                            @break

                                        @default
                                            <span class="status-badge status-planned">
                                                <i class="bi bi-calendar-check"></i>
                                                Akan Dilaksanakan
                                            </span>
                                    @endswitch
                                </td>

                                <td>
                                    <div class="action-group">

                                        <a
                                            href="{{ route('trainings.show', $training) }}"
                                            class="action-btn action-detail"
                                            title="Lihat detail"
                                        >
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </a>

                                        @php
                                            $canMarkCompleted =
                                                in_array(auth()->user()->role?->slug, ['admin', 'penglat'], true)
                                                && $training->approval_status === 'approved'
                                                && in_array($training->execution_status, ['akan_dilaksanakan', 'sedang_berlangsung'], true);
                                        @endphp

                                        @if ($canMarkCompleted)
                                            <form
                                                action="{{ route('trainings.mark-completed', $training) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah pelatihan ini benar-benar sudah selesai dilaksanakan? Setelah dikonfirmasi, kegiatan akan masuk ke tahap pelaporan.')"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="action-btn action-finish" title="Tandai kegiatan selesai">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Tandai Selesai
                                                </button>
                                            </form>
                                        @endif

                                        @if (
                                            in_array(auth()->user()->role?->slug, ['admin', 'dalmut'], true)
                                            && $training->approval_status !== 'approved'
                                        )
                                            <button
                                                type="button"
                                                class="action-btn action-approve"
                                                title="Setujui kegiatan"
                                                data-bs-toggle="modal"
                                                data-bs-target="#approveTrainingModal"
                                                data-approve-url="{{ route('trainings.approve', $training) }}"
                                                data-training-name="{{ $training->training_name }}"
                                            >
                                                <i class="bi bi-check-lg"></i>
                                                Setujui
                                            </button>

                                            <button
                                                type="button"
                                                class="action-btn action-revision"
                                                title="Minta revisi"
                                                data-bs-toggle="modal"
                                                data-bs-target="#decisionModal"
                                                data-decision-url="{{ route('trainings.request-revision', $training) }}"
                                                data-decision-title="Minta Revisi Kegiatan"
                                                data-decision-description="Tuliskan bagian kegiatan yang perlu diperbaiki oleh Penglat."
                                                data-decision-button="Kirim Revisi"
                                                data-decision-color="warning"
                                                data-training-name="{{ $training->training_name }}"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                                Revisi
                                            </button>

                                            <button
                                                type="button"
                                                class="action-btn action-reject"
                                                title="Tolak kegiatan"
                                                data-bs-toggle="modal"
                                                data-bs-target="#decisionModal"
                                                data-decision-url="{{ route('trainings.reject', $training) }}"
                                                data-decision-title="Tolak Kegiatan"
                                                data-decision-description="Tuliskan alasan penolakan kegiatan ini."
                                                data-decision-button="Tolak Kegiatan"
                                                data-decision-color="danger"
                                                data-training-name="{{ $training->training_name }}"
                                            >
                                                <i class="bi bi-x-lg"></i>
                                                Tolak
                                            </button>
                                        @endif

                                        @if (in_array(auth()->user()->role?->slug, ['admin', 'penglat'], true))
                                            <a
                                                href="{{ route('trainings.edit', $training) }}"
                                                class="action-btn action-edit"
                                                title="Edit kegiatan"
                                            >
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </a>

                                            <button
                                                type="button"
                                                class="action-btn action-delete"
                                                title="Hapus kegiatan"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteTrainingModal"
                                                data-delete-url="{{ route('trainings.destroy', $training) }}"
                                                data-training-name="{{ $training->training_name }}"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="empty-state">
                                        <i class="bi bi-calendar2-x"></i>
                                        <h6>Belum Ada Kegiatan Pelatihan</h6>
                                        <p class="mb-0">
                                            Data kegiatan pelatihan yang ditambahkan akan muncul di sini.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($trainings->hasPages())
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
                    <div class="text-secondary" style="font-size: 13px;">
                        Menampilkan {{ $trainings->firstItem() }}–{{ $trainings->lastItem() }}
                        dari {{ $trainings->total() }} kegiatan
                    </div>

                    {{ $trainings->links() }}
                </div>
            @endif

        </section>

        <div class="modal fade" id="approveTrainingModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content delete-modal-content">
                    <div class="modal-body text-center p-4 p-md-5">

                        <div class="approve-icon-wrapper mb-4">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                        <h5 class="fw-bold mb-2" style="color: var(--purple-dark);">
                            Setujui Kegiatan?
                        </h5>

                        <p class="text-secondary mb-3">
                            Apakah kamu yakin ingin menyetujui kegiatan pelatihan ini?
                        </p>

                        <div class="delete-training-name mb-4 text-start">
                            <div class="small text-secondary mb-1">Nama kegiatan</div>
                            <div id="approveTrainingName"></div>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <button
                                type="button"
                                class="btn btn-cancel-delete"
                                data-bs-dismiss="modal"
                            >
                                Batal
                            </button>

                            <form id="approveTrainingForm" method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-approve-confirm">
                                    <i class="bi bi-check-lg me-1"></i>
                                    Ya, Setujui
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="decisionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content delete-modal-content">

                    <form id="decisionForm" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="modal-header border-0 pb-0 p-4">
                            <h5 class="modal-title fw-bold" id="decisionTitle">
                                Keputusan Kegiatan
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body px-4 pb-4">
                            <p class="text-secondary small mb-2">Nama kegiatan</p>

                            <div class="delete-training-name mb-3" id="decisionTrainingName"></div>

                            <p class="text-secondary mb-3" id="decisionDescription"></p>

                            <label for="approval_notes" class="form-label fw-semibold">
                                Catatan Keputusan
                            </label>

                            <textarea
                                class="form-control"
                                id="approval_notes"
                                name="approval_notes"
                                rows="4"
                                maxlength="2000"
                                placeholder="Tuliskan alasan atau catatan..."
                                required
                            ></textarea>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button
                                    type="button"
                                    class="btn btn-cancel-delete"
                                    data-bs-dismiss="modal"
                                >
                                    Batal
                                </button>

                                <button
                                    type="submit"
                                    class="btn btn-confirm-delete"
                                    id="decisionSubmitButton"
                                >
                                    Kirim Keputusan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteTrainingModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content delete-modal-content">
                    <div class="modal-body text-center p-4 p-md-5">

                        <div class="delete-icon-wrapper mb-4">
                            <i class="bi bi-trash3"></i>
                        </div>

                        <h5 class="fw-bold mb-2" style="color: var(--purple-dark);">
                            Hapus Kegiatan Pelatihan?
                        </h5>

                        <p class="text-secondary mb-3">
                            Kamu akan menghapus kegiatan:
                        </p>

                        <div class="delete-training-name mb-3" id="deleteTrainingName">
                            Nama kegiatan
                        </div>

                        <p class="text-secondary small mb-4">
                            Data yang dihapus tidak dapat dikembalikan. Pastikan kamu benar-benar ingin menghapus kegiatan ini.
                        </p>

                        <div class="d-flex justify-content-center gap-2">
                            <button
                                type="button"
                                class="btn btn-cancel-delete"
                                data-bs-dismiss="modal"
                            >
                                Batal
                            </button>

                            <form id="deleteTrainingForm" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-confirm-delete">
                                    <i class="bi bi-trash3 me-1"></i>
                                    Ya, Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchInput = document.getElementById('searchTraining');
        const tableRows = document.querySelectorAll('#trainingTable tbody tr');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();

            tableRows.forEach(function (row) {
                const trainingName = row.cells[1]?.innerText.toLowerCase() || '';
                row.style.display = trainingName.includes(keyword) ? '' : 'none';
            });
        });

        const approveTrainingModal = document.getElementById('approveTrainingModal');

        approveTrainingModal.addEventListener('show.bs.modal', function (event) {
            const triggerButton = event.relatedTarget;

            document.getElementById('approveTrainingForm').action =
                triggerButton.getAttribute('data-approve-url');

            document.getElementById('approveTrainingName').textContent =
                triggerButton.getAttribute('data-training-name');
        });

        const decisionModal = document.getElementById('decisionModal');

        decisionModal.addEventListener('show.bs.modal', function (event) {
            const triggerButton = event.relatedTarget;

            document.getElementById('decisionForm').action =
                triggerButton.getAttribute('data-decision-url');

            document.getElementById('decisionTitle').textContent =
                triggerButton.getAttribute('data-decision-title');

            document.getElementById('decisionDescription').textContent =
                triggerButton.getAttribute('data-decision-description');

            document.getElementById('decisionTrainingName').textContent =
                triggerButton.getAttribute('data-training-name');

            const submitButton = document.getElementById('decisionSubmitButton');
            const buttonColor = triggerButton.getAttribute('data-decision-color');

            submitButton.textContent =
                triggerButton.getAttribute('data-decision-button');

            submitButton.className = 'btn btn-confirm-delete';

            if (buttonColor === 'warning') {
                submitButton.classList.add('decision-submit-warning');
            } else {
                submitButton.classList.add('decision-submit-danger');
            }

            document.getElementById('approval_notes').value = '';
        });

        const deleteTrainingModal = document.getElementById('deleteTrainingModal');

        deleteTrainingModal.addEventListener('show.bs.modal', function (event) {
            const triggerButton = event.relatedTarget;

            document.getElementById('deleteTrainingName').textContent =
                triggerButton.getAttribute('data-training-name');

            document.getElementById('deleteTrainingForm').action =
                triggerButton.getAttribute('data-delete-url');
        });
    </script>

</body>
</html>