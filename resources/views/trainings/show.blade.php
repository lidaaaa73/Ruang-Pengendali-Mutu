<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .detail-hero {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(120deg, #523F77 0%, #67538A 100%);
            color: #FFFFFF;
        }

        .detail-hero-label {
            color: #F4DCE8;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .detail-hero-title {
            margin: 0 0 8px;
            color: #FFFFFF;
            font-size: 21px;
            font-weight: 700;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .detail-hero-location {
            color: #EAE1F4;
            font-size: 13.5px;
        }

        .detail-hero-location i {
            color: var(--pink);
            margin-right: 6px;
        }

        .detail-grid-box {
            padding: 13px 15px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
            height: 100%;
        }

        .detail-label {
            margin-bottom: 4px;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
        }

        .detail-value {
            color: var(--text-primary);
            font-size: 13.5px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .notes-panel {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
            color: var(--text-primary);
            font-size: 13.5px;
            line-height: 1.65;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .notes-panel.revision-panel {
            border-color: #F1C9D8;
            border-left: 3.5px solid var(--berry);
            background: #FDF2F6;
            color: #7D2F4C;
        }

        .action-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
        }

        .action-bar-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'trainings'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Data Kegiatan Pelatihan', 'url' => route('trainings.index')],
                ['label' => 'Detail Kegiatan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-journal-text"></i>
                        Rincian Kegiatan Pelatihan
                    </div>
                    <h1 class="app-page-title">Detail Kegiatan Pelatihan</h1>
                    <p class="app-page-subtitle">
                        Informasi lengkap penyelenggaraan, keputusan persetujuan Dalmut, dan status pelaksanaan kegiatan.
                    </p>
                </div>

                <div class="action-bar-group">
                    <a href="{{ route('trainings.index') }}" class="app-btn app-btn-outline">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('trainings.documents.index', $training) }}" class="app-btn app-btn-primary">
                        <i class="bi bi-folder2-open"></i>
                        Dokumen Kegiatan
                    </a>

                    @if (in_array(auth()->user()->role?->slug, ['penglat', 'admin'], true))
                        <a href="{{ route('trainings.edit', $training) }}" class="app-btn app-btn-berry">
                            <i class="bi bi-pencil-square"></i>
                            Edit Kegiatan
                        </a>
                    @endif
                </div>
            </div>

            <section class="app-card">
                <div class="detail-hero">
                    <div class="min-w-0 flex-grow-1">
                        <div class="detail-hero-label">Kegiatan Pelatihan Bapelkes</div>
                        <h2 class="detail-hero-title">{{ $training->training_name }}</h2>
                        <div class="detail-hero-location">
                            <i class="bi bi-geo-alt-fill"></i>
                            {{ $training->venue ?: 'Tempat belum ditentukan' }}
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        @if ($training->approval_status === 'approved')
                            <span class="app-badge app-badge-success">
                                <i class="bi bi-check-circle-fill"></i>
                                Disetujui
                            </span>
                        @elseif ($training->approval_status === 'revision')
                            <span class="app-badge app-badge-revision">
                                <i class="bi bi-arrow-repeat"></i>
                                Perlu Revisi
                            </span>
                        @elseif ($training->approval_status === 'rejected')
                            <span class="app-badge app-badge-danger">
                                <i class="bi bi-x-circle-fill"></i>
                                Ditolak
                            </span>
                        @else
                            <span class="app-badge app-badge-warning">
                                <i class="bi bi-clock-fill"></i>
                                Menunggu Persetujuan
                            </span>
                        @endif

                        @switch($training->execution_status)
                            @case('sedang_berlangsung')
                                <span class="app-badge app-badge-info">
                                    <i class="bi bi-play-circle-fill"></i>
                                    Sedang Berlangsung
                                </span>
                                @break
                            @case('ditunda')
                                <span class="app-badge app-badge-warning">
                                    <i class="bi bi-pause-circle-fill"></i>
                                    Ditunda
                                </span>
                                @break
                            @case('dibatalkan')
                                <span class="app-badge app-badge-danger">
                                    <i class="bi bi-x-circle-fill"></i>
                                    Dibatalkan
                                </span>
                                @break
                            @case('selesai')
                                <span class="app-badge app-badge-success">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Selesai
                                </span>
                                @break
                            @default
                                <span class="app-badge app-badge-neutral">
                                    <i class="bi bi-calendar-event"></i>
                                    Akan Dilaksanakan
                                </span>
                        @endswitch
                    </div>
                </div>

                <div class="app-card-body">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="detail-grid-box">
                                <div class="detail-label">Penyelenggara</div>
                                <div class="detail-value">{{ $training->organizer ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="detail-grid-box">
                                <div class="detail-label">Tempat Pelaksanaan</div>
                                <div class="detail-value">{{ $training->venue ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="detail-grid-box">
                                <div class="detail-label">Tanggal Mulai</div>
                                <div class="detail-value">{{ $training->start_date?->format('d F Y') ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="detail-grid-box">
                                <div class="detail-label">Tanggal Selesai</div>
                                <div class="detail-value">{{ $training->end_date?->format('d F Y') ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="detail-grid-box">
                                <div class="detail-label">Jumlah Peserta</div>
                                <div class="detail-value">{{ number_format($training->participant_count, 0, ',', '.') }} orang</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="detail-grid-box">
                                <div class="detail-label">Tahun Anggaran</div>
                                <div class="detail-value">{{ $training->budget_year ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="detail-grid-box">
                                <div class="detail-label">Sumber Dana</div>
                                <div class="detail-value">{{ $training->funding_source ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="detail-grid-box">
                                <div class="detail-label">Didaftarkan Oleh</div>
                                <div class="detail-value">{{ $training->creator?->name ?? 'Pengguna tidak tersedia' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="detail-label">Catatan Kegiatan</div>
                        <div class="notes-panel">{{ $training->event_notes ?: 'Belum ada catatan kegiatan.' }}</div>
                    </div>
                </div>
            </section>

            <div class="row g-4">
                <div class="col-12 col-lg-6">
                    <section class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box">
                                    <i class="bi bi-clipboard-check"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">Informasi Persetujuan Dalmut</h5>
                                    <p class="app-card-subtitle">Riwayat keputusan pemeriksaan kegiatan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <div class="detail-grid-box">
                                        <div class="detail-label">Diputuskan Oleh</div>
                                        <div class="detail-value">{{ $training->approvalDecider?->name ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="detail-grid-box">
                                        <div class="detail-label">Waktu Keputusan</div>
                                        <div class="detail-value">
                                            {{ $training->approval_decided_at?->format('d/m/Y H:i') ?? '-' }}
                                            @if ($training->approval_decided_at)
                                                <span class="fw-normal text-secondary">WITA</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail-label">Catatan dari Dalmut</div>
                            @if ($training->approval_notes)
                                <div class="notes-panel {{ in_array($training->approval_status, ['revision', 'rejected'], true) ? 'revision-panel' : '' }}">
                                    {{ $training->approval_notes }}
                                </div>
                            @else
                                <div class="app-info-banner">
                                    <i class="bi bi-info-circle"></i>
                                    <div>Belum ada catatan keputusan dari Dalmut.</div>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>

                <div class="col-12 col-lg-6">
                    <section class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box blue">
                                    <i class="bi bi-clipboard2-pulse"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">Status Pelaksanaan &amp; Kelengkapan</h5>
                                    <p class="app-card-subtitle">Kondisi pelaksanaan dan ringkasan dokumen terunggah.</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <div class="detail-grid-box">
                                        <div class="detail-label">Dokumen Terunggah</div>
                                        <div class="detail-value">{{ $training->documents->count() }} dokumen</div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="detail-grid-box">
                                        <div class="detail-label">Dokumen Terverifikasi</div>
                                        <div class="detail-value">{{ $training->documents->where('verification_status', 'verified')->count() }} dokumen</div>
                                    </div>
                                </div>
                            </div>

                            @if ($training->delay_reason)
                                <div class="mb-3">
                                    <div class="detail-label">Alasan Penundaan / Pembatalan</div>
                                    <div class="notes-panel">{{ $training->delay_reason }}</div>
                                </div>
                            @endif

                            @if ($training->rescheduled_date)
                                <div class="detail-grid-box">
                                    <div class="detail-label">Tanggal Penjadwalan Ulang</div>
                                    <div class="detail-value">{{ $training->rescheduled_date->format('d F Y') }}</div>
                                </div>
                            @endif

                            @if (!$training->delay_reason && !$training->rescheduled_date)
                                <div class="app-info-banner">
                                    <i class="bi bi-folder2-open"></i>
                                    <div>
                                        Klik tombol <strong>Dokumen Kegiatan</strong> di bagian atas untuk mengunggah atau memeriksa kelengkapan KAK, SK Penyelenggaraan, dan Jadwal Pelatihan.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
