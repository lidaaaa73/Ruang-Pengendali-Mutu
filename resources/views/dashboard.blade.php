<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .welcome-banner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
            padding: 24px 28px;
            border-radius: var(--radius-lg);
            border-left: 4px solid var(--pink);
            background: linear-gradient(120deg, #523F77 0%, #67538A 100%);
            color: #FFFFFF;
            box-shadow: var(--shadow-sm);
        }

        .welcome-banner-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 6px;
            color: #F4DCE8;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .welcome-banner h1 {
            margin: 0 0 6px;
            color: #FFFFFF;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.35;
        }

        .welcome-banner p {
            margin: 0;
            max-width: 640px;
            color: #ECE4F4;
            font-size: 13.5px;
            line-height: 1.65;
        }

        .welcome-meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
            flex-shrink: 0;
        }

        .welcome-date {
            color: #E7DDF2;
            font-size: 12.5px;
            font-weight: 500;
        }

        .welcome-role-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 600;
        }

        .section-block {
            margin-bottom: 24px;
        }

        .section-head {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-end;
            gap: 12px;
            margin-bottom: 14px;
        }

        .section-head h2 {
            margin: 0 0 2px;
            color: var(--purple-dark);
            font-size: 16.5px;
            font-weight: 700;
        }

        .section-head p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
        }

        .kpi-grid-5 {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
        }

        .revision-group-card {
            margin-bottom: 14px;
            border: 1px solid #EBD6E2;
            border-radius: var(--radius-lg);
            background: var(--surface);
            box-shadow: var(--shadow-xs);
            overflow: hidden;
        }

        .revision-group-card:last-child {
            margin-bottom: 0;
        }

        .revision-group-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border-bottom: 1px solid #F0E4EC;
            background: #FDF8FA;
        }

        .revision-group-title {
            margin: 0 0 4px;
            color: var(--purple-dark);
            font-size: 15px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .revision-group-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 16px;
            color: var(--text-secondary);
            font-size: 12.5px;
        }

        .revision-group-meta i {
            margin-right: 5px;
            color: var(--berry);
        }

        .revision-doc-type {
            color: var(--purple-dark);
            font-weight: 700;
        }

        .revision-doc-file {
            margin-top: 2px;
            color: var(--text-secondary);
            font-size: 12.5px;
            overflow-wrap: anywhere;
        }

        .revision-note-preview {
            max-width: 320px;
            padding: 8px 11px;
            border: 1px solid #F1C9D8;
            border-left: 3px solid var(--berry);
            border-radius: var(--radius-sm);
            background: #FDF2F6;
            color: #7D2F4C;
            font-size: 12.5px;
            line-height: 1.55;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .revision-empty-box {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 20px;
            border: 1px solid #CBE5D4;
            border-left: 4px solid #2E6F4D;
            border-radius: var(--radius-lg);
            background: #EFF8F2;
            color: #23573B;
        }

        .revision-empty-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #FFFFFF;
            color: #2E6F4D;
            font-size: 20px;
        }

        .activity-list {
            padding: 0 20px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 15px 0;
            border-bottom: 1px solid #F1ECF6;
        }

        .activity-item:last-child {
            border-bottom: 0;
        }

        .activity-date {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 56px;
            min-width: 56px;
            padding: 8px 6px;
            border: 1px solid #E3DAEE;
            border-radius: 10px;
            background: var(--surface-subtle);
            color: var(--purple-dark);
            text-align: center;
        }

        .activity-date strong {
            font-size: 19px;
            font-weight: 700;
            line-height: 1.1;
        }

        .activity-date span {
            margin-top: 2px;
            color: var(--text-secondary);
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .activity-name {
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .activity-name:hover {
            color: var(--berry);
        }

        .activity-detail {
            margin-top: 3px;
            color: var(--text-secondary);
            font-size: 12.5px;
        }

        .shortcut-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 18px 20px;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            background: var(--surface);
            color: inherit;
            text-decoration: none;
            box-shadow: var(--shadow-xs);
            transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
        }

        .shortcut-card:hover {
            border-color: var(--lavender);
            box-shadow: var(--shadow-sm);
            transform: translateY(-2px);
            color: inherit;
        }

        .shortcut-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .shortcut-arrow {
            color: var(--text-muted);
            font-size: 16px;
            transition: color 0.15s ease, transform 0.15s ease;
        }

        .shortcut-card:hover .shortcut-arrow {
            color: var(--berry);
            transform: translate(2px, -2px);
        }

        .shortcut-card h6 {
            margin: 0 0 5px;
            color: var(--purple-dark);
            font-size: 14.5px;
            font-weight: 700;
        }

        .shortcut-card p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 12.5px;
            line-height: 1.6;
        }

        .sync-controls {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .sync-label {
            color: var(--text-muted);
            font-size: 12px;
        }

        @media (max-width: 1279.98px) {
            .kpi-grid-5 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 767.98px) {
            .welcome-banner {
                padding: 20px;
            }

            .welcome-meta {
                align-items: flex-start;
            }

            .kpi-grid-5 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .activity-item {
                flex-wrap: wrap;
                align-items: flex-start;
            }
        }

        @media (max-width: 479.98px) {
            .kpi-grid-5 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'dashboard',
        'pendingUsersCount' => $pendingUsersCount ?? 0
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard']
            ]
        ])

        <main class="app-page">

            @if (session('success'))
                <div class="alert app-alert app-alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill mt-1"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert app-alert app-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <section class="welcome-banner">
                <div>
                    <div class="welcome-banner-eyebrow">
                        <i class="bi bi-shield-check"></i>
                        Sistem Informasi Pengendalian Mutu Bapelkes
                    </div>

                    <h1>Selamat Datang, {{ auth()->user()->name }}</h1>

                    <p>
                        Kelola kegiatan pelatihan, verifikasi kelengkapan dokumen, pelaporan, serta rekapitulasi mutu secara terintegrasi.
                    </p>
                </div>

                <div class="welcome-meta">
                    <span class="welcome-role-pill">
                        <i class="bi bi-person-badge"></i>
                        Peran: {{ auth()->user()->role?->name ?? 'Pengguna' }}
                    </span>
                    <span class="welcome-date">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ now()->format('d/m/Y') }}
                    </span>
                </div>
            </section>

            @if (auth()->user()->role?->slug === 'admin')

                <section class="section-block">
                    <div class="section-head">
                        <div>
                            <h2>Ringkasan Sistem</h2>
                            <p>Ikhtisar data kegiatan, dokumen, dan pendaftaran akun pada sistem saat ini.</p>
                        </div>
                    </div>

                    <div class="kpi-grid-5">
                        <div class="app-kpi-card accent-berry">
                            <div class="app-kpi-top">
                                <span class="app-kpi-label">Total Kegiatan</span>
                                <span class="app-icon-box berry"><i class="bi bi-calendar2-check"></i></span>
                            </div>
                            <div class="app-kpi-value">{{ number_format($totalTrainings ?? 0, 0, ',', '.') }}</div>
                            <div class="app-kpi-note">Kegiatan terdaftar di sistem</div>
                        </div>

                        <div class="app-kpi-card accent-lavender">
                            <div class="app-kpi-top">
                                <span class="app-kpi-label">Menunggu Persetujuan</span>
                                <span class="app-icon-box"><i class="bi bi-hourglass-split"></i></span>
                            </div>
                            <div class="app-kpi-value">{{ number_format($pendingApprovalTrainingsCount ?? 0, 0, ',', '.') }}</div>
                            <div class="app-kpi-note">Belum diputuskan Dalmut</div>
                        </div>

                        <div class="app-kpi-card accent-success">
                            <div class="app-kpi-top">
                                <span class="app-kpi-label">Jadwal Mendatang</span>
                                <span class="app-icon-box success"><i class="bi bi-calendar-event"></i></span>
                            </div>
                            <div class="app-kpi-value">{{ number_format($upcomingTrainingsCount ?? ($upcomingTrainings->count() ?? 0), 0, ',', '.') }}</div>
                            <div class="app-kpi-note">Disetujui &amp; terjadwal</div>
                        </div>

                        <div class="app-kpi-card accent-blue">
                            <div class="app-kpi-top">
                                <span class="app-kpi-label">Total Dokumen</span>
                                <span class="app-icon-box blue"><i class="bi bi-file-earmark-text"></i></span>
                            </div>
                            <div class="app-kpi-value">{{ number_format($totalDocuments ?? 0, 0, ',', '.') }}</div>
                            <div class="app-kpi-note">Tersimpan pada server/Drive</div>
                        </div>

                        <div class="app-kpi-card accent-berry">
                            <div class="app-kpi-top">
                                <span class="app-kpi-label">Akun Menunggu</span>
                                <span class="app-icon-box berry"><i class="bi bi-person-check"></i></span>
                            </div>
                            <div class="app-kpi-value">{{ number_format($pendingUsersCount ?? 0, 0, ',', '.') }}</div>
                            <div class="app-kpi-note">Perlu persetujuan Admin</div>
                        </div>
                    </div>
                </section>

            @endif

            @if (auth()->user()->role?->slug === 'penglat')

                <section class="section-block" id="penglatRevisionSection" data-summary-url="{{ route('dashboard.revision-summary') }}">
                    <div class="section-head">
                        <div>
                            <h2>Dokumen Memerlukan Perbaikan</h2>
                            <p>Daftar dokumen unggahan Anda yang diminta revisi oleh Dalmut, dikelompokkan berdasarkan kegiatan.</p>
                        </div>

                        <div class="sync-controls">
                            <span class="sync-label">
                                <i class="bi bi-clock me-1"></i>
                                Diperbarui <span id="revisionUpdatedAt">{{ $revisionUpdatedAt ?? now()->format('d/m/Y H:i:s') }}</span>
                            </span>

                            <button type="button" class="app-btn app-btn-outline app-btn-sm" id="refreshRevisionBtn">
                                <i class="bi bi-arrow-clockwise"></i>
                                Perbarui
                            </button>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <div class="app-kpi-card accent-berry">
                                <div class="app-kpi-top">
                                    <span class="app-kpi-label">Total Dokumen Perlu Direvisi</span>
                                    <span class="app-icon-box berry"><i class="bi bi-file-earmark-exclamation"></i></span>
                                </div>
                                <div class="app-kpi-value" id="revisionDocumentsCountValue">
                                    {{ $revisionDocumentsCount ?? 0 }}
                                </div>
                                <div class="app-kpi-note">Jumlah file dokumen aktif yang memerlukan pengunggahan ulang.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="app-kpi-card accent-lavender">
                                <div class="app-kpi-top">
                                    <span class="app-kpi-label">Kegiatan Memiliki Dokumen Revisi</span>
                                    <span class="app-icon-box"><i class="bi bi-calendar2-event"></i></span>
                                </div>
                                <div class="app-kpi-value" id="revisionTrainingsCountValue">
                                    {{ $revisionTrainingsCount ?? 0 }}
                                </div>
                                <div class="app-kpi-note">Jumlah kegiatan pelatihan yang memiliki minimal satu dokumen perlu revisi.</div>
                            </div>
                        </div>
                    </div>

                    <div id="revisionGroupsContainer">
                        @if (($revisionGroups ?? collect())->count() > 0)
                            @foreach ($revisionGroups as $group)
                                <div class="revision-group-card">
                                    <div class="revision-group-header">
                                        <div>
                                            <h6 class="revision-group-title">
                                                Kegiatan: {{ $group['training_name'] }}
                                            </h6>

                                            <div class="revision-group-meta">
                                                <span><i class="bi bi-building"></i>{{ $group['organizer'] }}</span>
                                                <span><i class="bi bi-calendar3"></i>{{ $group['date_range'] }}</span>
                                            </div>
                                        </div>

                                        <span class="app-badge app-badge-revision">
                                            <i class="bi bi-exclamation-circle-fill"></i>
                                            Terdapat {{ $group['revision_count'] }} dokumen yang perlu diperbaiki
                                        </span>
                                    </div>

                                    <div class="app-table-wrap border-0 rounded-0">
                                        <table class="table app-table" style="min-width: 760px;">
                                            <thead>
                                                <tr>
                                                    <th>Dokumen &amp; Nama File</th>
                                                    <th>Status</th>
                                                    <th>Catatan Revisi Dalmut</th>
                                                    <th>Tanggal Revisi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($group['documents'] as $doc)
                                                    <tr>
                                                        <td>
                                                            <div class="revision-doc-type">{{ $doc['document_label'] }}</div>
                                                            <div class="revision-doc-file">
                                                                <i class="bi bi-file-earmark-text me-1"></i>
                                                                {{ $doc['original_name'] }}
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="app-badge app-badge-revision">
                                                                <i class="bi bi-arrow-repeat"></i>
                                                                {{ $doc['status_label'] }}
                                                            </span>
                                                        </td>

                                                        <td>
                                                            <div class="revision-note-preview">{{ $doc['verification_notes'] }}</div>
                                                        </td>

                                                        <td class="text-nowrap text-secondary" style="font-size: 12.5px;">
                                                            <i class="bi bi-clock me-1"></i>
                                                            {{ $doc['requested_at'] }}
                                                        </td>

                                                        <td>
                                                            <a href="{{ $doc['action_url'] }}" class="app-btn app-btn-berry app-btn-sm">
                                                                <i class="bi bi-pencil-square"></i>
                                                                Lihat dan Perbaiki
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="revision-empty-box">
                                <div class="revision-empty-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div>
                                    <div class="fw-bold" style="font-size: 14.5px;">Tidak Ada Dokumen yang Perlu Direvisi</div>
                                    <div style="font-size: 13px; margin-top: 2px;">
                                        Saat ini seluruh dokumen unggahan Anda tidak memiliki permintaan revisi aktif dari Dalmut.
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>

            @endif

            <section class="section-block">
                <div class="app-card mb-0">
                    <div class="app-card-header">
                        <div class="app-card-header-left">
                            <span class="app-icon-box"><i class="bi bi-calendar2-week"></i></span>
                            <div>
                                <h5 class="app-card-title">Jadwal Kegiatan Mendatang</h5>
                                <p class="app-card-subtitle">Kegiatan pelatihan yang telah disetujui dan dijadwalkan untuk dilaksanakan.</p>
                            </div>
                        </div>

                        <span class="app-badge app-badge-neutral">
                            {{ $upcomingTrainings->count() }} kegiatan
                        </span>
                    </div>

                    @if ($upcomingTrainings->count() > 0)
                        <div class="activity-list">
                            @foreach ($upcomingTrainings as $training)
                                <div class="activity-item">
                                    <div class="activity-date">
                                        <strong>{{ $training->start_date?->format('d') }}</strong>
                                        <span>{{ $training->start_date?->format('M Y') }}</span>
                                    </div>

                                    <div class="flex-grow-1 min-w-0">
                                        <a href="{{ route('trainings.show', $training) }}" class="activity-name">
                                            {{ $training->training_name }}
                                        </a>

                                        <div class="activity-detail">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ $training->start_date?->format('d/m/Y') }}
                                            @if ($training->end_date)
                                                s.d. {{ $training->end_date->format('d/m/Y') }}
                                            @endif
                                            @if ($training->venue)
                                                <span class="mx-2">·</span>
                                                <i class="bi bi-geo-alt me-1"></i>{{ $training->venue }}
                                            @endif
                                        </div>
                                    </div>

                                    <span class="app-badge app-badge-success">
                                        <i class="bi bi-calendar-check"></i>
                                        Akan Dilaksanakan
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="app-empty-state">
                            <div class="app-empty-icon">
                                <i class="bi bi-calendar-x"></i>
                            </div>
                            <h6>Belum Ada Jadwal Kegiatan</h6>
                            <p>Belum ada kegiatan mendatang yang telah disetujui dan dijadwalkan untuk dilaksanakan.</p>
                        </div>
                    @endif
                </div>
            </section>

            <section class="section-block">
                <div class="section-head">
                    <div>
                        <h2>Akses Cepat Pengelolaan Mutu</h2>
                        <p>Pintasan langsung menuju modul utama operasional pengendalian mutu Bapelkes.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <a href="{{ route('trainings.index') }}" class="shortcut-card">
                            <div>
                                <div class="shortcut-top">
                                    <span class="app-icon-box"><i class="bi bi-calendar2-check"></i></span>
                                    <i class="bi bi-arrow-up-right shortcut-arrow"></i>
                                </div>
                                <h6>Data Kegiatan Pelatihan</h6>
                                <p>Kelola informasi, dokumen persiapan, dan status persetujuan kegiatan pelatihan.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4">
                        <a href="{{ route('admin.quality-control.reports') }}" class="shortcut-card">
                            <div>
                                <div class="shortcut-top">
                                    <span class="app-icon-box blue"><i class="bi bi-file-earmark-bar-graph"></i></span>
                                    <i class="bi bi-arrow-up-right shortcut-arrow"></i>
                                </div>
                                <h6>Laporan Kegiatan</h6>
                                <p>Unggah, periksa, dan pantau laporan penyelenggara serta evaluasi kegiatan selesai.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4">
                        <a href="{{ route('recap.index') }}" class="shortcut-card">
                            <div>
                                <div class="shortcut-top">
                                    <span class="app-icon-box berry"><i class="bi bi-bar-chart-line"></i></span>
                                    <i class="bi bi-arrow-up-right shortcut-arrow"></i>
                                </div>
                                <h6>Rekap Kegiatan</h6>
                                <p>Analisis rekap kegiatan tahunan, triwulan, dan bulanan lengkap dengan export Excel dan PDF.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            @if (auth()->user()->role?->slug === 'admin')
                <section class="section-block mb-0">
                    <div class="section-head">
                        <div>
                            <h2>Administrasi Sistem</h2>
                            <p>Pengelolaan akses pengguna dan konfigurasi integrasi penyimpanan dokumen.</p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('admin.users.index') }}" class="shortcut-card">
                                <div>
                                    <div class="shortcut-top">
                                        <span class="app-icon-box berry"><i class="bi bi-person-check"></i></span>
                                        @if (($pendingUsersCount ?? 0) > 0)
                                            <span class="app-badge app-badge-revision">{{ $pendingUsersCount }} menunggu</span>
                                        @else
                                            <i class="bi bi-arrow-up-right shortcut-arrow"></i>
                                        @endif
                                    </div>
                                    <h6>Persetujuan Akun</h6>
                                    <p>Periksa pendaftaran pengguna baru dan tetapkan peran Penglat atau Dalmut.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-6">
                            <a href="{{ route('admin.google-drive.index') }}" class="shortcut-card">
                                <div>
                                    <div class="shortcut-top">
                                        <span class="app-icon-box"><i class="bi bi-cloud-check"></i></span>
                                        <i class="bi bi-arrow-up-right shortcut-arrow"></i>
                                    </div>
                                    <h6>Pengaturan Google Drive</h6>
                                    <p>Kelola koneksi OAuth akun Google Bapelkes dan folder tujuan penyimpanan dokumen.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            @endif

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @if (auth()->user()->role?->slug === 'penglat')
        <script>
            (function () {
                const section = document.getElementById('penglatRevisionSection');
                if (!section) {
                    return;
                }

                const summaryUrl = section.dataset.summaryUrl;
                const docsCountEl = document.getElementById('revisionDocumentsCountValue');
                const trainingsCountEl = document.getElementById('revisionTrainingsCountValue');
                const updatedAtEl = document.getElementById('revisionUpdatedAt');
                const groupsContainer = document.getElementById('revisionGroupsContainer');
                const refreshBtn = document.getElementById('refreshRevisionBtn');
                let isFetching = false;

                function escapeHtml(value) {
                    return String(value ?? '')
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#039;');
                }

                function renderGroups(groups) {
                    if (!Array.isArray(groups) || groups.length === 0) {
                        groupsContainer.innerHTML =
                            '<div class="revision-empty-box">' +
                                '<div class="revision-empty-icon">' +
                                    '<i class="bi bi-check-circle-fill"></i>' +
                                '</div>' +
                                '<div>' +
                                    '<div class="fw-bold" style="font-size: 14.5px;">Tidak Ada Dokumen yang Perlu Direvisi</div>' +
                                    '<div style="font-size: 13px; margin-top: 2px;">Saat ini seluruh dokumen unggahan Anda tidak memiliki permintaan revisi aktif dari Dalmut.</div>' +
                                '</div>' +
                            '</div>';
                        return;
                    }

                    groupsContainer.innerHTML = groups.map(function (group) {
                        const rowsHtml = (group.documents || []).map(function (doc) {
                            return '<tr>' +
                                '<td>' +
                                    '<div class="revision-doc-type">' + escapeHtml(doc.document_label) + '</div>' +
                                    '<div class="revision-doc-file">' +
                                        '<i class="bi bi-file-earmark-text me-1"></i>' +
                                        escapeHtml(doc.original_name) +
                                    '</div>' +
                                '</td>' +
                                '<td>' +
                                    '<span class="app-badge app-badge-revision">' +
                                        '<i class="bi bi-arrow-repeat"></i>' +
                                        escapeHtml(doc.status_label) +
                                    '</span>' +
                                '</td>' +
                                '<td>' +
                                    '<div class="revision-note-preview">' + escapeHtml(doc.verification_notes) + '</div>' +
                                '</td>' +
                                '<td class="text-nowrap text-secondary" style="font-size: 12.5px;">' +
                                    '<i class="bi bi-clock me-1"></i>' +
                                    escapeHtml(doc.requested_at) +
                                '</td>' +
                                '<td>' +
                                    '<a href="' + escapeHtml(doc.action_url) + '" class="app-btn app-btn-berry app-btn-sm">' +
                                        '<i class="bi bi-pencil-square"></i>' +
                                        'Lihat dan Perbaiki' +
                                    '</a>' +
                                '</td>' +
                            '</tr>';
                        }).join('');

                        return '<div class="revision-group-card">' +
                            '<div class="revision-group-header">' +
                                '<div>' +
                                    '<h6 class="revision-group-title">Kegiatan: ' + escapeHtml(group.training_name) + '</h6>' +
                                    '<div class="revision-group-meta">' +
                                        '<span><i class="bi bi-building"></i>' + escapeHtml(group.organizer) + '</span>' +
                                        '<span><i class="bi bi-calendar3"></i>' + escapeHtml(group.date_range) + '</span>' +
                                    '</div>' +
                                '</div>' +
                                '<span class="app-badge app-badge-revision">' +
                                    '<i class="bi bi-exclamation-circle-fill"></i>' +
                                    'Terdapat ' + escapeHtml(group.revision_count) + ' dokumen yang perlu diperbaiki' +
                                '</span>' +
                            '</div>' +
                            '<div class="app-table-wrap border-0 rounded-0">' +
                                '<table class="table app-table" style="min-width: 760px;">' +
                                    '<thead>' +
                                        '<tr>' +
                                            '<th>Dokumen &amp; Nama File</th>' +
                                            '<th>Status</th>' +
                                            '<th>Catatan Revisi Dalmut</th>' +
                                            '<th>Tanggal Revisi</th>' +
                                            '<th>Aksi</th>' +
                                        '</tr>' +
                                    '</thead>' +
                                    '<tbody>' + rowsHtml + '</tbody>' +
                                '</table>' +
                            '</div>' +
                        '</div>';
                    }).join('');
                }

                async function fetchRevisionSummary() {
                    if (isFetching) {
                        return;
                    }

                    isFetching = true;

                    try {
                        const response = await fetch(summaryUrl, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            credentials: 'same-origin',
                            cache: 'no-store'
                        });

                        if (!response.ok) {
                            return;
                        }

                        const data = await response.json();
                        docsCountEl.textContent = data.total_revision_documents ?? 0;
                        trainingsCountEl.textContent = data.total_revision_trainings ?? 0;
                        updatedAtEl.textContent = data.updated_at || '';
                        renderGroups(data.groups || []);
                    } catch (error) {
                    } finally {
                        isFetching = false;
                    }
                }

                if (refreshBtn) {
                    refreshBtn.addEventListener('click', fetchRevisionSummary);
                }

                document.addEventListener('visibilitychange', function () {
                    if (document.visibilityState === 'visible') {
                        fetchRevisionSummary();
                    }
                });

                window.setInterval(function () {
                    if (document.visibilityState === 'visible') {
                        fetchRevisionSummary();
                    }
                }, 30000);
            })();
        </script>
    @endif

</body>
</html>
