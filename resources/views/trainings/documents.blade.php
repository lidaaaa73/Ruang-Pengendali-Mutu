<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Kegiatan | Ruang Pengendalian Mutu Bapelkes</title>

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
            font-size: 15px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 32px 35px 45px;
        }

        .breadcrumb {
            margin-bottom: 22px;
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--purple-medium);
            font-weight: 500;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--berry);
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 26px;
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

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 10px 16px;
            border: 1px solid #D9CDE6;
            border-radius: 9px;
            background: #fff;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn-back:hover {
            background: #F3EEF8;
            border-color: var(--purple-medium);
            color: var(--purple-dark);
        }

        .training-banner {
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
            padding: 27px 30px;
            border-radius: 16px;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.19), transparent 37%),
                linear-gradient(115deg, #523F77, #67538A 65%, #7880AE);
            color: #fff;
            box-shadow: 0 7px 22px rgba(82,63,119,.12);
        }

        .training-banner-content {
            position: relative;
            z-index: 1;
        }

        .training-banner-decoration {
            position: absolute;
            right: 40px;
            bottom: -48px;
            color: #fff;
            font-size: 175px;
            opacity: .09;
        }

        .banner-label {
            margin-bottom: 10px;
            color: #F6DCE7;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .8px;
        }

        .banner-title {
            margin-bottom: 13px;
            color: #fff;
            font-size: 23px;
            font-weight: 700;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .banner-date {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #F1EAF6;
            font-size: 14px;
        }

        .banner-date i {
            color: var(--pink);
        }

        .document-card {
            overflow: hidden;
            margin-bottom: 25px;
            padding: 26px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 5px 20px rgba(82, 63, 119, .045);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 49px;
            height: 49px;
            flex-shrink: 0;
            border-radius: 13px;
            background: linear-gradient(135deg, #F9DCE9, #E9C9DC);
            border: 1px solid #EDD5E3;
            color: var(--berry);
            font-size: 22px;
        }

        .section-icon.lavender {
            background: linear-gradient(135deg, #E9DDF5, #C9B5E1);
            border-color: #D8CBE8;
            color: var(--purple-medium);
        }

        .section-title {
            margin-bottom: 5px;
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

        .upload-area {
            padding: 24px;
            background:
                radial-gradient(circle at 100% 0%, rgba(246,183,199,.17), transparent 35%),
                linear-gradient(120deg, #F3EEF8, #F9EDF3);
            border: 1px solid #E7DDED;
            border-radius: 13px;
        }

        .form-label {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 15px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 49px;
            padding: 11px 14px;
            border: 1px solid #DCD2E7;
            border-radius: 10px;
            background-color: #fff;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--berry);
            box-shadow: 0 0 0 .2rem rgba(179,90,138,.12);
        }

        input[type="file"].form-control {
            padding: 8px 11px;
        }

        input[type="file"]::file-selector-button {
            margin: -3px 10px -3px -6px;
            padding: 8px 12px;
            background: #F1EAF7;
            border: 0;
            border-radius: 7px;
            color: var(--purple-dark);
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .file-hint {
            display: block;
            margin-top: 8px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .btn-upload {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 46px;
            padding: 11px 20px;
            border: 1px solid var(--purple-dark);
            border-radius: 9px;
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-upload:hover {
            background: linear-gradient(120deg, #67538A, #7880AE);
            border-color: var(--purple-medium);
            color: #fff;
            transform: translateY(-2px);
        }

        .upload-info {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-top: 19px;
            padding: 15px;
            background: rgba(255,255,255,.7);
            border: 1px solid rgba(217,205,230,.8);
            border-radius: 10px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.8;
        }

        .upload-info i {
            margin-top: 2px;
            color: var(--berry);
            font-size: 18px;
        }

        .alert {
            border-radius: 11px;
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

        .document-list-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 23px;
        }

        .document-count {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid #DCD2E7;
            border-radius: 30px;
            background: linear-gradient(135deg, #F0EAF7, #F9EDF3);
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 600;
        }

        .table-responsive {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .document-table {
            min-width: 1450px;
            width: 100%;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .document-table th {
            padding: 17px 15px;
            background: linear-gradient(110deg, #F0EAF7, #F8EAF0);
            border-bottom: 1px solid #E3D9ED;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .document-table th:first-child {
            border-radius: 9px 0 0 0;
        }

        .document-table th:last-child {
            border-radius: 0 9px 0 0;
        }

        .document-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #F0EBF3;
            color: var(--text-primary);
            font-size: 14px;
            line-height: 1.8;
            vertical-align: middle;
        }

        .document-table tbody tr {
            transition: background .2s ease;
        }

        .document-table tbody tr:hover {
            background: #FCF9FD;
        }

        .document-number {
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

        .document-type {
            min-width: 155px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
        }

        .document-file {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 260px;
        }

        .document-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 47px;
            height: 47px;
            background: linear-gradient(135deg, #F9DCE9, #E9DDF5);
            border: 1px solid #E9D9EA;
            border-radius: 11px;
            color: var(--purple-dark);
            font-size: 21px;
        }

        .document-name {
            max-width: 290px;
            overflow-wrap: anywhere;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
            line-height: 1.7;
        }

        .document-size {
            margin-top: 5px;
            color: var(--text-secondary);
            font-size: 13px;
        }

        .uploader-name {
            min-width: 135px;
            color: var(--text-primary);
            font-size: 14px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending {
            background: #F9EED8;
            color: #805A16;
        }

        .status-verified {
            background: #E6F2EA;
            color: #356B4B;
        }

        .status-revision {
            background: #FCEBF0;
            color: #963F5A;
        }

        .verification-note {
            min-width: 175px;
            max-width: 260px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .action-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 7px;
            min-width: max-content;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 38px;
            padding: 8px 11px;
            border: 1px solid transparent;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(82,63,119,.08);
        }

        .action-btn i {
            font-size: 15px;
        }

        .action-download {
            background: #E6F2EA;
            border-color: #CFE4D6;
            color: #356B4B;
            text-decoration: none;
        }

        .action-download:hover {
            background: #356B4B;
            color: #fff;
        }

        .action-edit {
            background: #F0EAF7;
            border-color: #DED1EB;
            color: var(--purple-dark);
        }

        .action-edit:hover {
            background: var(--purple-dark);
            color: #fff;
        }

        .action-delete {
            background: #FCEBF0;
            border-color: #EECAD6;
            color: var(--danger);
        }

        .action-delete:hover {
            background: var(--danger);
            color: #fff;
        }

        .action-verify {
            background: #E6F2EA;
            border-color: #CFE4D6;
            color: #356B4B;
        }

        .action-verify:hover {
            background: #356B4B;
            color: #fff;
        }

        .action-revision {
            background: #F9EED8;
            border-color: #EED9AA;
            color: #805A16;
        }

        .action-revision:hover {
            background: #805A16;
            color: #fff;
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
            background: linear-gradient(135deg, #F0EAF7, #F8EAF0);
            border: 1px solid var(--border);
            border-radius: 20px;
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
            font-size: 14px;
            line-height: 1.8;
        }

        .modal-content {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(82,63,119,.14);
        }

        .modal-header {
            padding: 19px 23px;
            background: linear-gradient(110deg, #F3EEF8, #F9EDF3);
            border-bottom: 1px solid var(--border);
        }

        .modal-title {
            color: var(--purple-dark);
            font-size: 18px;
            font-weight: 700;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-body p {
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .modal-footer {
            padding: 16px 23px 21px;
            border-top: 1px solid var(--border);
        }

        .modal .form-label {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
        }

        .modal .form-control,
        .modal .form-select {
            min-height: 46px;
            border-color: #DCD2E7;
            border-radius: 9px;
            font-size: 14px;
        }

        .modal textarea.form-control {
            min-height: 100px;
            line-height: 1.8;
        }

        .modal-footer .btn {
            min-height: 42px;
            padding: 9px 16px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-modal-cancel {
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-secondary);
        }

        .btn-modal-cancel:hover {
            background: #F3EEF8;
            color: var(--purple-dark);
        }

        .btn-modal-primary {
            border: 1px solid var(--purple-dark);
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #fff;
        }

        .btn-modal-primary:hover {
            background: var(--berry);
            border-color: var(--berry);
            color: #fff;
        }

        .btn-modal-delete {
            border: 1px solid #A34258;
            background: #A34258;
            color: #fff;
        }

        .btn-modal-delete:hover {
            background: #873449;
            color: #fff;
        }

        .btn-modal-warning {
            border: 1px solid #A77828;
            background: #A77828;
            color: #fff;
        }

        .btn-modal-warning:hover {
            background: #805A16;
            color: #fff;
        }

        .delete-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 75px;
            height: 75px;
            margin: 0 auto 19px;
            background: linear-gradient(135deg, #FCEBF0, #F4D7E1);
            border-radius: 20px;
            color: #A34258;
            font-size: 30px;
        }

        .modal-file-box {
            padding: 14px;
            background: linear-gradient(135deg, #F3EEF8, #F9EDF3);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--purple-dark);
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .file-label {
            margin-bottom: 5px;
            color: var(--text-secondary);
            font-size: 13px;
        }

        @media (max-width: 991px) {
            .main-content {
                padding: 27px 23px 35px;
            }

            .document-card {
                padding: 22px;
            }

            .training-banner {
                padding: 24px;
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
            }

            .page-title {
                font-size: 24px;
            }

            .page-description {
                font-size: 14px;
            }

            .btn-back {
                align-self: flex-start;
            }

            .training-banner {
                padding: 22px 19px;
            }

            .banner-title {
                font-size: 20px;
            }

            .training-banner-decoration {
                right: -10px;
                font-size: 120px;
            }

            .document-card {
                padding: 19px 16px;
                border-radius: 14px;
            }

            .upload-area {
                padding: 18px;
            }

            .section-title {
                font-size: 17px;
            }

            .document-table {
                min-width: 1450px;
            }

            .modal-body {
                padding: 19px;
            }

            .modal-header {
                padding: 16px 19px;
            }

            .modal-footer {
                padding: 13px 19px 18px;
            }
        }
    </style>
</head>

<body>

    @php
        $role = auth()->user()->role?->slug;
        $canUploadDocuments = in_array($role, ['admin', 'penglat'], true);
        $canReviewDocuments = in_array($role, ['admin', 'dalmut'], true);
        $preparationDocumentTypes = ['kak', 'sk', 'jadwal'];
        $preparationDocuments = $documents->whereIn('document_type', $preparationDocumentTypes);
    @endphp

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
                <li class="breadcrumb-item">
                    <a href="{{ route('trainings.show', $training) }}">Detail Kegiatan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Dokumen Kegiatan
                </li>
            </ol>
        </nav>

        <div class="page-header">
            <div>
                <div class="page-eyebrow">
                    <i class="bi bi-folder2-open"></i>
                    PENGELOLAAN DOKUMEN BAPELKES
                </div>

                <h1 class="page-title">Dokumen Kegiatan</h1>

                <p class="page-description">
                    Kelola tiga dokumen persyaratan yang diperlukan sebelum kegiatan dilaksanakan.
                </p>
            </div>

            <a href="{{ route('trainings.show', $training) }}" class="btn-back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Detail
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <div class="fw-semibold mb-2">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Dokumen belum dapat diproses.
                </div>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="training-banner">
            <i class="bi bi-folder2-open training-banner-decoration"></i>

            <div class="training-banner-content">
                <div class="banner-label">
                    INFORMASI KEGIATAN
                </div>

                <h2 class="banner-title">
                    {{ $training->training_name }}
                </h2>

                <div class="banner-date">
                    <i class="bi bi-calendar-event"></i>

                    {{ $training->start_date?->format('d/m/Y') ?? '-' }}

                    @if ($training->end_date)
                        <span>s.d.</span>
                        {{ $training->end_date->format('d/m/Y') }}
                    @endif
                </div>
            </div>
        </section>

        <section class="document-card">

            <div class="card-heading">
                <div class="section-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>

                <div>
                    <h5 class="section-title">Upload Dokumen Persyaratan</h5>
                    <p class="section-description">
                        Unggah tiga dokumen yang diperlukan untuk proses persetujuan kegiatan.
                    </p>
                </div>
            </div>

            @if ($canUploadDocuments)
                <div class="upload-area">
                    <form
                        action="{{ route('trainings.documents.store', $training) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-5">
                                <label for="document_type" class="form-label">
                                    Jenis Dokumen
                                </label>

                                <select name="document_type" id="document_type" class="form-select" required>
                                    <option value="">Pilih jenis dokumen</option>
                                    <option value="kak" @selected(old('document_type') === 'kak')>KAK</option>
                                    <option value="sk" @selected(old('document_type') === 'sk')>SK Penyelenggaraan</option>
                                    <option value="jadwal" @selected(old('document_type') === 'jadwal')>Jadwal Pelatihan</option>
                                </select>
                            </div>

                            <div class="col-md-7">
                                <label for="document_file" class="form-label">
                                    Pilih File Dokumen
                                </label>

                                <input
                                    type="file"
                                    name="document_file"
                                    id="document_file"
                                    class="form-control"
                                    accept=".pdf,.doc,.docx"
                                    required
                                >

                                <small class="file-hint">
                                    Format yang diperbolehkan: PDF, DOC, atau DOCX. Ukuran maksimal 10 MB.
                                </small>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn-upload">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    Upload Dokumen
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="upload-info">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            Pastikan dokumen yang diunggah adalah KAK, SK Penyelenggara, atau Jadwal Pelatihan.
                            Dokumen akan diperiksa oleh Admin atau Dalmut. Laporan Penyelenggara dan Evaluasi
                            diunggah secara terpisah melalui menu Laporan Kegiatan setelah kegiatan selesai.
                        </div>
                    </div>
                </div>
            @else
                <div class="upload-info">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        Kamu dapat melihat, mengunduh, dan memeriksa dokumen persyaratan kegiatan.
                    </div>
                </div>
            @endif

        </section>

        <section class="document-card">

            <div class="document-list-heading">
                <div class="card-heading mb-0">
                    <div class="section-icon lavender">
                        <i class="bi bi-files"></i>
                    </div>

                    <div>
                        <h5 class="section-title">Daftar Dokumen</h5>
                        <p class="section-description">
                            Daftar KAK, SK Penyelenggara, dan Jadwal Pelatihan beserta status pemeriksaannya.
                        </p>
                    </div>
                </div>

                <span class="document-count">
                    <i class="bi bi-folder-check"></i>
                    {{ $preparationDocuments->count() }} dari 3 dokumen
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover document-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Dokumen</th>
                            <th>Nama File</th>
                            <th>Diunggah Oleh</th>
                            <th>Status Pemeriksaan</th>
                            <th>Catatan Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($preparationDocuments as $document)
                            <tr>
                                <td>
                                    <span class="document-number">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>
                                    <div class="document-type">
                                        @switch($document->document_type)
                                            @case('kak')
                                                KAK
                                                @break
                                            @case('sk')
                                                SK Penyelenggaraan
                                                @break
                                            @case('jadwal')
                                                Jadwal Pelatihan
                                                @break
                                            @default
                                                {{ $document->document_type }}
                                        @endswitch
                                    </div>
                                </td>

                                <td>
                                    <div class="document-file">
                                        <div class="document-icon">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>

                                        <div>
                                            <div class="document-name">
                                                {{ $document->original_name }}
                                            </div>

                                            <div class="document-size">
                                                {{ $document->file_size ? number_format($document->file_size / 1024, 0, ',', '.') . ' KB' : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="uploader-name">
                                        <i class="bi bi-person-circle me-1" style="color: var(--purple-medium);"></i>
                                        {{ $document->uploader?->name ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    @if ($document->verification_status === 'verified')
                                        <span class="status-badge status-verified">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Terverifikasi
                                        </span>
                                    @elseif ($document->verification_status === 'revision')
                                        <span class="status-badge status-revision">
                                            <i class="bi bi-arrow-repeat"></i>
                                            Perlu Revisi
                                        </span>
                                    @else
                                        <span class="status-badge status-pending">
                                            <i class="bi bi-clock-fill"></i>
                                            Menunggu Pemeriksaan
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="verification-note">
                                        {{ $document->verification_notes ?: '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="action-group">

                                        <a
                                            href="{{ route('training-documents.download', $document) }}"
                                            class="action-btn action-download"
                                            target="_blank"
                                            rel="noopener"
                                        >
                                            <i class="bi bi-download"></i>
                                            Download
                                        </a>

                                        @if (
                                            in_array($role, ['admin', 'penglat'], true)
                                            && $document->verification_status !== 'verified'
                                        )
                                            <button
                                                type="button"
                                                class="action-btn action-edit"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editDocument{{ $document->id }}"
                                            >
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </button>

                                            <button
                                                type="button"
                                                class="action-btn action-delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteDocument{{ $document->id }}"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        @endif

                                        @if (
                                            $canReviewDocuments
                                            && $document->verification_status !== 'verified'
                                        )
                                            <button
                                                type="button"
                                                class="action-btn action-verify"
                                                data-bs-toggle="modal"
                                                data-bs-target="#verifyDocument{{ $document->id }}"
                                            >
                                                <i class="bi bi-check-circle"></i>
                                                Verifikasi
                                            </button>

                                            <button
                                                type="button"
                                                class="action-btn action-revision"
                                                data-bs-toggle="modal"
                                                data-bs-target="#revisionDocument{{ $document->id }}"
                                            >
                                                <i class="bi bi-arrow-repeat"></i>
                                                Minta Revisi
                                            </button>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="bi bi-folder2-open"></i>
                                        <h6>Belum Ada Dokumen</h6>
                                        <p class="mb-0">
                                            Dokumen yang diunggah untuk kegiatan ini akan muncul di sini.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

        <footer class="text-center py-3" style="color: var(--text-secondary); font-size: 13px;">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    @foreach ($preparationDocuments as $document)
        @if (
            in_array($role, ['admin', 'penglat'], true)
            && $document->verification_status !== 'verified'
        )
            <div
                class="modal fade"
                id="editDocument{{ $document->id }}"
                tabindex="-1"
                aria-labelledby="editDocumentLabel{{ $document->id }}"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form
                            action="{{ route('training-documents.update', $document) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title" id="editDocumentLabel{{ $document->id }}">
                                    <i class="bi bi-pencil-square me-2"></i>
                                    Edit Dokumen
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="document_type_{{ $document->id }}" class="form-label">
                                        Jenis Dokumen
                                    </label>

                                    <select
                                        name="document_type"
                                        id="document_type_{{ $document->id }}"
                                        class="form-select"
                                        required
                                    >
                                        <option value="kak" @selected($document->document_type === 'kak')>KAK</option>
                                        <option value="sk" @selected($document->document_type === 'sk')>SK Penyelenggaraan</option>
                                        <option value="jadwal" @selected($document->document_type === 'jadwal')>Jadwal Pelatihan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">File Saat Ini</label>
                                    <div class="modal-file-box">
                                        <i class="bi bi-file-earmark-text me-2"></i>
                                        {{ $document->original_name }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="document_file_{{ $document->id }}" class="form-label">
                                        Ganti File
                                    </label>

                                    <input
                                        type="file"
                                        name="document_file"
                                        id="document_file_{{ $document->id }}"
                                        class="form-control"
                                        accept=".pdf,.doc,.docx"
                                    >

                                    <small class="file-hint">
                                        Kosongkan jika tidak ingin mengganti file. Maksimal 10 MB.
                                    </small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">
                                    Batal
                                </button>

                                <button type="submit" class="btn btn-modal-primary">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div
                class="modal fade"
                id="deleteDocument{{ $document->id }}"
                tabindex="-1"
                aria-labelledby="deleteDocumentLabel{{ $document->id }}"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteDocumentLabel{{ $document->id }}">
                                <i class="bi bi-shield-exclamation me-2"></i>
                                Konfirmasi Hapus
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <div class="modal-body text-center">
                            <div class="delete-icon">
                                <i class="bi bi-trash3"></i>
                            </div>

                            <h5 class="fw-bold mb-3" style="color: var(--purple-dark);">
                                Yakin ingin menghapus dokumen ini?
                            </h5>

                            <p>Dokumen yang akan dihapus:</p>

                            <div class="modal-file-box mb-3 text-start">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                <span class="fw-semibold">{{ $document->original_name }}</span>
                            </div>

                            <p class="mb-0">
                                Dokumen yang sudah dihapus tidak dapat dikembalikan.
                            </p>
                        </div>

                        <div class="modal-footer justify-content-center">
                            <button
                                type="button"
                                class="btn btn-modal-cancel"
                                data-bs-dismiss="modal"
                            >
                                Batal
                            </button>

                            <form
                                action="{{ route('training-documents.destroy', $document) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-modal-delete">
                                    <i class="bi bi-trash me-1"></i>
                                    Ya, Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endforeach

    @if ($canReviewDocuments)
        @foreach ($preparationDocuments as $document)
            @if ($document->verification_status !== 'verified')
                <div
                    class="modal fade"
                    id="verifyDocument{{ $document->id }}"
                    tabindex="-1"
                    aria-labelledby="verifyDocumentLabel{{ $document->id }}"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form
                                action="{{ route('training-documents.verify', $document) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <div class="modal-header">
                                    <h5 class="modal-title" id="verifyDocumentLabel{{ $document->id }}">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Verifikasi Dokumen
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>

                                <div class="modal-body">
                                    <p>
                                        Pastikan dokumen sudah diperiksa sebelum diverifikasi.
                                    </p>

                                    <div class="modal-file-box mb-3">
                                        <div class="file-label">Nama File</div>
                                        <div class="fw-semibold">{{ $document->original_name }}</div>
                                    </div>

                                    <label for="verification_notes_{{ $document->id }}" class="form-label">
                                        Catatan Pemeriksaan (Opsional)
                                    </label>

                                    <textarea
                                        name="verification_notes"
                                        id="verification_notes_{{ $document->id }}"
                                        class="form-control"
                                        rows="3"
                                        maxlength="2000"
                                        placeholder="Tuliskan catatan pemeriksaan jika diperlukan"
                                    ></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">
                                        Batal
                                    </button>

                                    <button type="submit" class="btn btn-modal-primary">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Ya, Verifikasi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div
                    class="modal fade"
                    id="revisionDocument{{ $document->id }}"
                    tabindex="-1"
                    aria-labelledby="revisionDocumentLabel{{ $document->id }}"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form
                                action="{{ route('training-documents.request-revision', $document) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <div class="modal-header">
                                    <h5 class="modal-title" id="revisionDocumentLabel{{ $document->id }}">
                                        <i class="bi bi-arrow-repeat me-2"></i>
                                        Permintaan Revisi
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>

                                <div class="modal-body">
                                    <p>
                                        Tuliskan bagian yang perlu diperbaiki oleh Penglat.
                                    </p>

                                    <div class="modal-file-box mb-3">
                                        <div class="file-label">Nama File</div>
                                        <div class="fw-semibold">{{ $document->original_name }}</div>
                                    </div>

                                    <label for="revision_notes_{{ $document->id }}" class="form-label">
                                        Catatan Revisi <span class="text-danger">*</span>
                                    </label>

                                    <textarea
                                        name="verification_notes"
                                        id="revision_notes_{{ $document->id }}"
                                        class="form-control"
                                        rows="4"
                                        maxlength="2000"
                                        required
                                        placeholder="Jelaskan bagian dokumen yang harus diperbaiki"
                                    ></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">
                                        Batal
                                    </button>

                                    <button type="submit" class="btn btn-modal-warning">
                                        <i class="bi bi-arrow-repeat me-1"></i>
                                        Kirim Revisi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
