<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan | Ruang Pengendalian Mutu Bapelkes</title>

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
            --background: #F8F6FA;
            --surface: #FFFFFF;
            --border: #E9E3EF;
            --text-primary: #352D40;
            --text-secondary: #71697B;
            --success: #3C7656;
            --warning: #8A650B;
            --danger: #A34D1C;
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
            width: calc(100% - 260px);
            margin-left: 260px;
            min-height: 100vh;
            padding: 34px 35px 45px;
        }

        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            color: var(--berry);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .page-title {
            margin: 0 0 9px;
            color: var(--purple-dark);
            font-size: 27px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 22px;
        }

        .summary-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 180px;
            padding: 23px;
            overflow: hidden;
            border: 1px solid #E8B5CC;
            border-left: 5px solid var(--berry);
            border-radius: 17px;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(120deg, #F9DCE9, #E9B5CF 60%, #DFA1C0);
            box-shadow: 0 5px 18px rgba(82,63,119,.06);
        }

        .summary-card.lavender {
            border-color: #CDBCE0;
            border-left-color: var(--purple-medium);
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(120deg, #E9DDF5, #C9B5E1 60%, #B6A0D0);
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 48px;
            width: 48px;
            height: 48px;
            margin-bottom: 15px;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 13px;
            background: rgba(255,255,255,.8);
            color: var(--berry);
            font-size: 22px;
        }

        .summary-icon .bi,
        .info-icon .bi {
            display: inline-block;
            font-family: "bootstrap-icons" !important;
            font-style: normal;
            line-height: 1;
        }

        .summary-card.lavender .summary-icon {
            color: var(--purple-medium);
        }

        .summary-label {
            color: #75405F;
            font-size: 13px;
            font-weight: 600;
        }

        .summary-card.lavender .summary-label {
            color: var(--purple-dark);
        }

        .summary-value {
            margin-top: 3px;
            color: #52334A;
            font-size: 32px;
            font-weight: 700;
            line-height: 1.3;
        }

        .summary-card.lavender .summary-value {
            color: var(--purple-dark);
        }

        .summary-note {
            margin-top: 5px;
            color: #75546B;
            font-size: 12px;
            line-height: 1.6;
        }

        .info-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
            padding: 19px 21px;
            border: 1px solid #D9CBEA;
            border-radius: 14px;
            background: linear-gradient(120deg, #F1EAF8, #E7DDF3);
        }

        .info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 44px;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255,255,255,.85);
            color: var(--purple-medium);
            font-size: 21px;
        }

        .info-title {
            margin-bottom: 5px;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 700;
        }

        .info-description {
            margin: 0;
            color: #71627F;
            font-size: 12px;
            line-height: 1.8;
        }

        .filter-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
            padding: 19px 22px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #FFFFFF;
            box-shadow: 0 4px 15px rgba(82,63,119,.035);
        }

        .filter-title {
            margin-bottom: 4px;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 700;
        }

        .filter-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 11px;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 340px;
        }

        .search-wrapper i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: var(--purple-medium);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            min-height: 43px;
            padding: 10px 13px 10px 41px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #FCFAFD;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 12px;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--berry);
            box-shadow: 0 0 0 3px rgba(179,90,138,.12);
        }

        .activity-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 21px;
        }

        .activity-card {
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: #FFFFFF;
            box-shadow: 0 5px 20px rgba(82,63,119,.045);
            scroll-margin-top: 24px;
            transition: box-shadow .2s ease, transform .2s ease, border-color .2s ease;
        }

        .activity-card:target {
            border-color: var(--berry);
            box-shadow: 0 0 0 3px rgba(179,90,138,.18), 0 10px 26px rgba(82,63,119,.1);
        }

        .activity-card:hover {
            box-shadow: 0 9px 24px rgba(82,63,119,.08);
        }

        .activity-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(110deg, #FCF9FD, #F7F2FA);
        }

        .activity-heading {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            min-width: 0;
        }

        .activity-number {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 43px;
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--purple-medium), var(--berry));
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 700;
        }

        .activity-heading-content {
            min-width: 0;
        }

        .activity-title {
            margin: 0 0 8px;
            overflow-wrap: anywhere;
            color: var(--purple-dark);
            font-size: 16px;
            font-weight: 700;
            line-height: 1.6;
        }

        .activity-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 9px 17px;
            color: var(--text-secondary);
            font-size: 11px;
            line-height: 1.7;
        }

        .activity-meta i {
            margin-right: 5px;
            color: var(--berry);
        }

        .completed-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            flex-shrink: 0;
            padding: 8px 12px;
            border-radius: 30px;
            background: #EAF3EE;
            color: #3C7656;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .activity-body {
            padding: 23px 25px 26px;
        }

        .documents-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .document-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: 100%;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #FCFAFD;
        }

        .document-card.report {
            border-top: 4px solid var(--berry);
        }

        .document-card.evaluation {
            border-top: 4px solid var(--purple-medium);
        }

        .document-card.needs-revision {
            border-color: #EBC3D4;
            background: #FFF9FB;
        }

        .document-heading {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 17px;
        }

        .document-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 46px;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: #FCEBF1;
            color: var(--berry);
            font-size: 21px;
        }

        .document-card.evaluation .document-icon {
            background: #F0EAF7;
            color: var(--purple-medium);
        }

        .document-heading-content {
            min-width: 0;
        }

        .document-title {
            margin-bottom: 5px;
            color: var(--purple-dark);
            font-size: 14px;
            font-weight: 700;
            line-height: 1.6;
        }

        .document-subtitle {
            color: var(--text-secondary);
            font-size: 11px;
            line-height: 1.7;
        }

        .document-status {
            display: inline-flex;
            align-items: center;
            align-self: flex-start;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-pending {
            background: #FFF4D9;
            color: #8A650B;
        }

        .status-verified {
            background: #EAF3EE;
            color: #3C7656;
        }

        .status-revision {
            background: #FCE9DF;
            color: #A34D1C;
        }

        .status-missing {
            background: #F0EDF3;
            color: #71697B;
        }

        .file-information {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 15px;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #FFFFFF;
        }

        .file-information > i {
            flex: 0 0 auto;
            margin-top: 2px;
            color: var(--purple-medium);
            font-size: 20px;
        }

        .file-content {
            min-width: 0;
        }

        .file-name {
            overflow-wrap: anywhere;
            color: var(--text-primary);
            font-size: 11px;
            font-weight: 600;
            line-height: 1.7;
        }

        .file-size {
            margin-top: 3px;
            color: var(--text-secondary);
            font-size: 10px;
            line-height: 1.7;
        }

        .verification-note {
            margin-top: 12px;
            padding: 13px 14px;
            border: 1px solid #EECAD6;
            border-left: 4px solid var(--berry);
            border-radius: 10px;
            background: #FFF2F6;
            color: #7D334D;
            font-size: 11px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .verification-note-title {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #963F5A;
            font-size: 11px;
            font-weight: 700;
        }

        .verification-note-text {
            margin-top: 5px;
            white-space: pre-line;
        }

        .verification-note-meta {
            margin-top: 6px;
            color: #9B6478;
            font-size: 10px;
        }

        .verified-note {
            margin-top: 12px;
            padding: 12px 14px;
            border: 1px solid #CFE3D5;
            border-left: 4px solid var(--success);
            border-radius: 10px;
            background: #F1F8F3;
            color: #356B4B;
            font-size: 11px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .upload-area {
            margin-top: auto;
            padding-top: 17px;
        }

        .upload-inner {
            padding: 16px;
            border: 1.5px dashed #D8C7E5;
            border-radius: 11px;
            background: linear-gradient(135deg, #FBF8FD, #F5EFF9);
        }

        .upload-inner.reupload-inner {
            border-color: #DCA7BF;
            background: linear-gradient(135deg, #FFF5F8, #F9EAF1);
        }

        .reupload-hint {
            margin-bottom: 10px;
            color: #7D334D;
            font-size: 11px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .btn-reupload {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 43px;
            margin-top: 13px;
            border: 1px solid #9E497A;
            border-radius: 9px;
            background: linear-gradient(110deg, #B35A8A, #8E4474);
            color: #FFFFFF;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-reupload:hover {
            border-color: var(--purple-dark);
            background: linear-gradient(110deg, #67538A, #523F77);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .upload-area label {
            display: block;
            margin-bottom: 9px;
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 600;
        }

        .form-control {
            min-height: 43px;
            border: 1px solid #DDD4E7;
            border-radius: 9px;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
        }

        .form-control:focus {
            border-color: var(--purple-medium);
            box-shadow: 0 0 0 3px rgba(103,83,138,.12);
        }

        .form-text {
            color: var(--text-secondary);
            font-size: 10px;
            line-height: 1.7;
        }

        .btn-upload {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 43px;
            margin-top: 13px;
            border: 1px solid var(--purple-dark);
            border-radius: 9px;
            background: linear-gradient(110deg, #67538A, #523F77);
            color: #FFFFFF;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-upload:hover {
            border-color: var(--berry);
            background: linear-gradient(110deg, #B35A8A, #923D70);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 37px;
            margin-top: 11px;
            padding: 7px 11px;
            border: 1px solid #D6C9E5;
            border-radius: 8px;
            background: #F5F0FA;
            color: var(--purple-dark);
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn-download:hover {
            border-color: var(--purple-medium);
            background: var(--purple-medium);
            color: #FFFFFF;
        }

        .review-area {
            display: grid;
            gap: 13px;
            margin-top: 17px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .review-title {
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 700;
        }

        .review-area textarea {
            margin-top: 8px;
            resize: vertical;
        }

        .btn-verify,
        .btn-revision {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
            min-height: 39px;
            margin-top: 9px;
            padding: 8px 12px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-verify {
            border: 1px solid #49866A;
            background: #49866A;
            color: #FFFFFF;
        }

        .btn-verify:hover {
            background: #367653;
            color: #FFFFFF;
        }

        .btn-revision {
            border: 1px solid #D49A54;
            background: #FFF5E9;
            color: #946020;
        }

        .btn-revision:hover {
            background: #D49A54;
            color: #FFFFFF;
        }

        .empty-state {
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 78px;
            height: 78px;
            margin: 0 auto 18px;
            border: 1px solid #E6D9EF;
            border-radius: 21px;
            background: linear-gradient(135deg, #F1E9F8, #E5D9F1);
            color: var(--purple-medium);
            font-size: 34px;
        }

        .empty-title {
            margin-bottom: 9px;
            color: var(--purple-dark);
            font-size: 17px;
            font-weight: 700;
        }

        .empty-description {
            max-width: 520px;
            margin: 0 auto;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.8;
        }

        .no-search-result {
            display: none;
            padding: 35px 20px;
            border: 1px dashed #D8C7E5;
            border-radius: 13px;
            background: #FFFFFF;
            color: var(--text-secondary);
            text-align: center;
        }

        .no-search-result i {
            display: block;
            margin-bottom: 10px;
            color: var(--lavender);
            font-size: 28px;
        }

        .no-search-result strong {
            display: block;
            margin-bottom: 5px;
            color: var(--purple-dark);
        }

        .footer-text {
            padding-top: 28px;
            color: var(--text-secondary);
            font-size: 11px;
            text-align: center;
        }

        .alert {
            border-radius: 12px;
            font-size: 12px;
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

        @media (max-width: 991px) {
            .main-content {
                padding: 27px 22px;
            }

            .activity-header {
                padding: 20px;
            }

            .activity-body {
                padding: 20px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 22px 15px 30px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-description {
                font-size: 12px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .summary-card {
                min-height: 155px;
            }

            .filter-card {
                align-items: stretch;
                flex-direction: column;
                padding: 17px;
            }

            .search-wrapper {
                max-width: 100%;
            }

            .activity-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;
                padding: 18px;
            }

            .activity-body {
                padding: 16px;
            }

            .documents-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .document-card {
                padding: 17px;
            }

            .info-card {
                padding: 16px;
            }
        }

        @media (min-width: 768px) and (max-width: 1050px) {
            .documents-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @php
        $role = auth()->user()->role?->slug;
        $canUpload = in_array($role, ['admin', 'penglat'], true);
        $canReview = in_array($role, ['admin', 'dalmut'], true);

        $reportTypes = [
            'laporan_penyelenggara',
            'evaluasi_penyelenggaraan'
        ];

        $totalUploadedDocuments = $trainings->sum(function ($training) use ($reportTypes) {
            return $training->documents
                ->whereIn('document_type', $reportTypes)
                ->count();
        });
    @endphp

    @include('layouts.sidebar', [
        'active' => 'reports',
        'pendingUsersCount' => $role === 'admin'
            ? \App\Models\User::where('account_status', 'pending')->count()
            : 0
    ])

    <main class="main-content">

        <header class="page-header">
            <div>
                <div class="page-eyebrow">
                    <i class="bi bi-clipboard-data"></i>
                    PENGELOLAAN MUTU BAPELKES
                </div>

                <h1 class="page-title">Laporan Kegiatan</h1>

                <p class="page-description">
                    Kelola laporan penyelenggara dan evaluasi setiap kegiatan pelatihan yang telah selesai.
                </p>
            </div>
        </header>

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
                <div class="fw-semibold mb-2">Dokumen belum berhasil diproses.</div>

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="summary-grid">

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="bi bi-calendar2-check"></i>
                </div>

                <div class="summary-label">Kegiatan Selesai</div>

                <div class="summary-value">{{ $trainings->count() }}</div>

                <div class="summary-note">
                    Total kegiatan yang telah memasuki tahap pelaporan.
                </div>
            </div>

            <div class="summary-card lavender">
                <div class="summary-icon">
                    <i class="bi bi-file-earmark-check"></i>
                </div>

                <div class="summary-label">Laporan Telah Diunggah</div>

                <div class="summary-value">{{ $totalUploadedDocuments }}</div>

                <div class="summary-note">
                    Total laporan penyelenggara dan evaluasi yang tersimpan.
                </div>
            </div>

        </section>

        <section class="info-card">
            <div class="info-icon">
                <i class="bi bi-info-circle"></i>
            </div>

            <div>
                <div class="info-title">Informasi Pengunggahan Laporan</div>

                <p class="info-description">
                    Setiap kegiatan memiliki bagian pengunggahan laporan tersendiri.
                    Laporan Penyelenggara dan Evaluasi Penyelenggaraan dapat diunggah
                    secara terpisah setelah kegiatan ditandai selesai.
                    Pastikan dokumen yang diunggah sesuai dengan kegiatan yang dipilih.
                </p>
            </div>
        </section>

        <section class="filter-card">
            <div>
                <div class="filter-title">Daftar Kegiatan Selesai</div>
                <p class="filter-description">
                    Pilih kegiatan yang ingin dilengkapi dokumen laporannya.
                </p>
            </div>

            <div class="search-wrapper">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchActivity"
                    class="search-input"
                    placeholder="Cari nama atau penyelenggara kegiatan..."
                    autocomplete="off"
                >
            </div>
        </section>

        @if ($trainings->count() > 0)

            <div class="activity-list" id="activityList">

                @foreach ($trainings as $index => $training)

                    <section
                        id="training-{{ $training->id }}"
                        class="activity-card"
                        data-search="{{ strtolower($training->training_name . ' ' . $training->organizer . ' ' . $training->venue) }}"
                    >

                        <div class="activity-header">

                            <div class="activity-heading">

                                <div class="activity-number">
                                    {{ $index + 1 }}
                                </div>

                                <div class="activity-heading-content">

                                    <h5 class="activity-title">
                                        {{ $training->training_name }}
                                    </h5>

                                    <div class="activity-meta">

                                        <span>
                                            <i class="bi bi-building"></i>
                                            {{ $training->organizer ?: '-' }}
                                        </span>

                                        <span>
                                            <i class="bi bi-calendar3"></i>
                                            {{ $training->start_date?->format('d/m/Y') ?? '-' }}

                                            @if ($training->end_date)
                                                s.d. {{ $training->end_date->format('d/m/Y') }}
                                            @endif
                                        </span>

                                        <span>
                                            <i class="bi bi-geo-alt"></i>
                                            {{ $training->venue ?: '-' }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                            <span class="completed-badge">
                                <i class="bi bi-check-circle-fill"></i>
                                Kegiatan Selesai
                            </span>

                        </div>

                        <div class="activity-body">

                            <div class="documents-grid">

                                @foreach ([
                                    [
                                        'type' => 'laporan_penyelenggara',
                                        'title' => 'Laporan Penyelenggara',
                                        'subtitle' => 'Dokumen laporan pelaksanaan kegiatan pelatihan.',
                                        'icon' => 'bi-file-earmark-text',
                                        'style' => 'report'
                                    ],
                                    [
                                        'type' => 'evaluasi_penyelenggaraan',
                                        'title' => 'Evaluasi Penyelenggaraan',
                                        'subtitle' => 'Dokumen hasil evaluasi penyelenggaraan kegiatan.',
                                        'icon' => 'bi-clipboard-check',
                                        'style' => 'evaluation'
                                    ]
                                ] as $item)

                                    @php
                                        $document = $training->documents
                                            ->where('document_type', $item['type'])
                                            ->sortByDesc('updated_at')
                                            ->first();

                                        $status = $document?->verification_status;
                                        $uploadedAt = $document?->updated_at ?? $document?->created_at;
                                    @endphp

                                    <article class="document-card {{ $item['style'] }} {{ $status === 'revision' ? 'needs-revision' : '' }}">

                                        <div class="document-heading">

                                            <div class="document-icon">
                                                <i class="bi {{ $item['icon'] }}"></i>
                                            </div>

                                            <div class="document-heading-content">
                                                <div class="document-title">
                                                    {{ $item['title'] }}
                                                </div>

                                                <div class="document-subtitle">
                                                    {{ $item['subtitle'] }}
                                                </div>
                                            </div>

                                        </div>

                                        @if (!$document)

                                            <span class="document-status status-missing">
                                                <i class="bi bi-file-earmark-minus"></i>
                                                Belum Diunggah
                                            </span>

                                        @elseif ($status === 'verified')

                                            <span class="document-status status-verified">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Terverifikasi
                                            </span>

                                        @elseif ($status === 'revision')

                                            <span class="document-status status-revision">
                                                <i class="bi bi-exclamation-circle-fill"></i>
                                                Perlu Revisi
                                            </span>

                                        @else

                                            <span class="document-status status-pending">
                                                <i class="bi bi-clock-history"></i>
                                                Menunggu Pemeriksaan
                                            </span>

                                        @endif

                                        @if ($document)

                                            <div class="file-information">

                                                <i class="bi bi-file-earmark-text"></i>

                                                <div class="file-content">

                                                    <div class="file-name">
                                                        {{ $document->original_name }}
                                                    </div>

                                                    <div class="file-size">
                                                        {{ number_format(($document->file_size ?? 0) / 1024, 1, ',', '.') }} KB
                                                        <span class="mx-1">·</span>
                                                        Oleh {{ $document->uploader?->name ?? '-' }}
                                                        <span class="mx-1">·</span>
                                                        {{ $uploadedAt?->format('d/m/Y H:i') ?? '-' }}
                                                    </div>

                                                    <a
                                                        href="{{ route('training-documents.download', $document) }}"
                                                        class="btn-download"
                                                        target="_blank"
                                                        rel="noopener"
                                                    >
                                                        <i class="bi bi-download"></i>
                                                        Unduh Dokumen
                                                    </a>

                                                </div>

                                            </div>

                                            @if ($status === 'revision')

                                                <div class="verification-note">
                                                    <div class="verification-note-title">
                                                        <i class="bi bi-exclamation-circle-fill"></i>
                                                        Catatan Revisi dari Dalmut
                                                    </div>

                                                    <div class="verification-note-text">{{ $document->verification_notes ?: 'Dokumen diminta untuk diperbaiki.' }}</div>

                                                    @if ($document->verifier || $document->verified_at)
                                                        <div class="verification-note-meta">
                                                            {{ $document->verifier?->name ?? 'Dalmut' }}@if ($document->verified_at) · {{ $document->verified_at->format('d/m/Y H:i') }}@endif
                                                        </div>
                                                    @endif
                                                </div>

                                            @elseif ($status === 'verified' && $document->verification_notes)

                                                <div class="verified-note">
                                                    <div class="fw-bold">
                                                        <i class="bi bi-check-circle-fill me-1"></i>
                                                        Catatan Verifikasi
                                                    </div>

                                                    <div class="verification-note-text">{{ $document->verification_notes }}</div>
                                                </div>

                                            @endif

                                        @endif

                                        @if ($canUpload && !$document)

                                            <div class="upload-area">
                                                <div class="upload-inner">

                                                    <form
                                                        action="{{ route('trainings.documents.store', $training) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >
                                                        @csrf

                                                        <input
                                                            type="hidden"
                                                            name="document_type"
                                                            value="{{ $item['type'] }}"
                                                        >

                                                        <label>
                                                            <i class="bi bi-cloud-arrow-up me-1"></i>
                                                            Pilih File Dokumen
                                                        </label>

                                                        <input
                                                            type="file"
                                                            name="document_file"
                                                            class="form-control"
                                                            accept=".pdf,.doc,.docx"
                                                            required
                                                        >

                                                        <div class="form-text mt-2">
                                                            Format PDF, DOC, DOCX. Maksimal 10 MB.
                                                        </div>

                                                        <button type="submit" class="btn-upload">
                                                            <i class="bi bi-cloud-arrow-up"></i>
                                                            Unggah Dokumen
                                                        </button>

                                                    </form>

                                                </div>
                                            </div>

                                        @elseif ($canUpload && $document && $status === 'revision')

                                            <div class="upload-area">
                                                <div class="upload-inner reupload-inner">

                                                    <form
                                                        action="{{ route('training-documents.reupload', $document) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >
                                                        @csrf
                                                        @method('PATCH')

                                                        <label>
                                                            <i class="bi bi-arrow-repeat me-1"></i>
                                                            Unggah Ulang {{ $item['title'] }}
                                                        </label>

                                                        <div class="reupload-hint">
                                                            Pilih file perbaikan untuk menggantikan <strong>{{ $document->original_name }}</strong>.
                                                        </div>

                                                        <input
                                                            type="file"
                                                            name="document_file"
                                                            class="form-control"
                                                            accept=".pdf,.doc,.docx"
                                                            required
                                                        >

                                                        <div class="form-text mt-2">
                                                            Format PDF, DOC, DOCX. Maksimal 10 MB. Status otomatis kembali menjadi Menunggu Pemeriksaan.
                                                        </div>

                                                        <button type="submit" class="btn-reupload">
                                                            <i class="bi bi-cloud-arrow-up"></i>
                                                            Unggah Ulang
                                                        </button>

                                                    </form>

                                                </div>
                                            </div>

                                        @endif

                                        @if ($canReview && $document && $status === 'pending')

                                            <div class="review-area">

                                                <div class="review-title">
                                                    <i class="bi bi-shield-check me-1"></i>
                                                    Pemeriksaan Dokumen
                                                </div>

                                                <form
                                                    action="{{ route('training-documents.verify', $document) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                    <label class="form-label">
                                                        Catatan verifikasi (opsional)
                                                    </label>

                                                    <textarea
                                                        name="verification_notes"
                                                        class="form-control"
                                                        rows="2"
                                                        placeholder="Tambahkan catatan jika diperlukan"
                                                    ></textarea>

                                                    <button type="submit" class="btn-verify">
                                                        <i class="bi bi-check-circle"></i>
                                                        Verifikasi Dokumen
                                                    </button>

                                                </form>

                                                <form
                                                    action="{{ route('training-documents.request-revision', $document) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                    <label class="form-label">
                                                        Catatan permintaan revisi
                                                    </label>

                                                    <textarea
                                                        name="verification_notes"
                                                        class="form-control"
                                                        rows="2"
                                                        placeholder="Jelaskan bagian dokumen yang perlu diperbaiki"
                                                        required
                                                    ></textarea>

                                                    <button type="submit" class="btn-revision">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                        Minta Revisi
                                                    </button>

                                                </form>

                                            </div>

                                        @endif

                                    </article>

                                @endforeach

                            </div>

                        </div>

                    </section>

                @endforeach

            </div>

            <div class="no-search-result mt-3" id="noSearchResult">
                <i class="bi bi-search"></i>
                <strong>Kegiatan Tidak Ditemukan</strong>
                Coba gunakan nama atau penyelenggara kegiatan yang berbeda.
            </div>

        @else

            <section class="activity-card">
                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>

                    <h5 class="empty-title">
                        Belum Ada Kegiatan yang Selesai
                    </h5>

                    <p class="empty-description">
                        Kegiatan akan muncul di halaman ini setelah statusnya berubah menjadi
                        Selesai. Pengunggahan Laporan Penyelenggara dan Evaluasi
                        Penyelenggaraan dapat dilakukan setelah tahap tersebut.
                    </p>

                </div>
            </section>

        @endif

        <footer class="footer-text">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchInput = document.getElementById('searchActivity');
        const activityCards = document.querySelectorAll('.activity-card[data-search]');
        const noSearchResult = document.getElementById('noSearchResult');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                activityCards.forEach(function (card) {
                    const activityName = card.dataset.search || '';
                    const isMatched = activityName.includes(keyword);

                    card.style.display = isMatched ? '' : 'none';

                    if (isMatched) {
                        visibleCount++;
                    }
                });

                if (noSearchResult) {
                    noSearchResult.style.display =
                        visibleCount === 0 ? 'block' : 'none';
                }
            });
        }
    </script>

</body>
</html>