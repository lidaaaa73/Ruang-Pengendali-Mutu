<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .search-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            background: var(--surface);
            box-shadow: var(--shadow-xs);
        }

        .search-box {
            position: relative;
            width: 100%;
            max-width: 340px;
        }

        .search-box > i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 15px;
        }

        .search-box .form-control {
            min-height: 38px;
            padding-left: 36px;
            font-size: 13px;
        }

        .activity-card {
            margin-bottom: 20px;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            background: var(--surface);
            box-shadow: var(--shadow-xs);
            overflow: hidden;
            scroll-margin-top: 84px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .activity-card:target {
            border-color: var(--berry);
            box-shadow: 0 0 0 3px rgba(179, 90, 138, 0.16), var(--shadow-sm);
        }

        .activity-header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            background: var(--surface-subtle);
        }

        .activity-heading {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            min-width: 0;
        }

        .activity-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 9px;
            background: var(--purple-dark);
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 700;
        }

        .activity-title {
            margin: 0 0 4px;
            color: var(--purple-dark);
            font-size: 15.5px;
            font-weight: 700;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .activity-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 5px 16px;
            color: var(--text-secondary);
            font-size: 12.5px;
        }

        .activity-meta i {
            margin-right: 5px;
            color: var(--berry);
        }

        .activity-body {
            padding: 20px;
        }

        .documents-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .report-doc-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: 100%;
            padding: 18px;
            border: 1px solid var(--border);
            border-top: 3px solid var(--berry);
            border-radius: var(--radius-md);
            background: var(--surface);
        }

        .report-doc-card.evaluation {
            border-top-color: var(--purple-medium);
        }

        .report-doc-card.needs-revision {
            border-color: #EBC5D5;
            background: #FFFAFC;
        }

        .report-doc-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .report-doc-title-wrap {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            min-width: 0;
        }

        .report-doc-title {
            margin: 0 0 2px;
            color: var(--purple-dark);
            font-size: 14.5px;
            font-weight: 700;
        }

        .report-doc-subtitle {
            color: var(--text-secondary);
            font-size: 12.5px;
            line-height: 1.5;
        }

        .file-box {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
            margin-bottom: 12px;
        }

        .file-box > i {
            flex-shrink: 0;
            margin-top: 2px;
            color: var(--purple-medium);
            font-size: 18px;
        }

        .file-box-name {
            color: var(--text-primary);
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .file-box-meta {
            margin-top: 2px;
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .revision-note-panel {
            padding: 12px 14px;
            margin-bottom: 12px;
            border: 1px solid #F1C9D8;
            border-left: 3.5px solid var(--berry);
            border-radius: var(--radius-md);
            background: #FDF2F6;
            color: #7D2F4C;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .revision-note-title {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 4px;
            color: #9A3B62;
            font-size: 12.5px;
            font-weight: 700;
        }

        .revision-note-meta {
            margin-top: 6px;
            color: #9B6478;
            font-size: 12px;
        }

        .verified-note-panel {
            padding: 11px 14px;
            margin-bottom: 12px;
            border: 1px solid #CBE5D4;
            border-left: 3.5px solid #2E6F4D;
            border-radius: var(--radius-md);
            background: #EFF8F2;
            color: #23573B;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .upload-panel {
            margin-top: auto;
            padding: 14px;
            border: 1px dashed var(--border-strong);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
        }

        .upload-panel.reupload-panel {
            border-color: #DCA7BF;
            background: #FDF5F8;
        }

        .review-panel {
            display: grid;
            gap: 14px;
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        .review-heading {
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 700;
        }

        .no-search-result {
            display: none;
            padding: 36px 20px;
            border: 1px dashed var(--border-strong);
            border-radius: var(--radius-lg);
            background: var(--surface);
            color: var(--text-secondary);
            text-align: center;
        }

        @media (max-width: 1099.98px) {
            .documents-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767.98px) {
            .search-box {
                max-width: 100%;
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
        'active' => 'reports'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Laporan Kegiatan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        Pelaporan Pascakegiatan
                    </div>
                    <h1 class="app-page-title">Laporan Kegiatan</h1>
                    <p class="app-page-subtitle">
                        Kelola pengunggahan, verifikasi, dan revisi Laporan Penyelenggara serta Evaluasi Penyelenggaraan untuk kegiatan yang telah selesai.
                    </p>
                </div>
            </div>

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

            @if ($errors->any())
                <div class="alert app-alert app-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>
                        <strong>Dokumen belum berhasil diproses.</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                    <div class="app-kpi-card accent-berry">
                        <div class="app-kpi-top">
                            <span class="app-kpi-label">Kegiatan Selesai</span>
                            <span class="app-icon-box berry"><i class="bi bi-calendar2-check"></i></span>
                        </div>
                        <div class="app-kpi-value">{{ number_format($trainings->count(), 0, ',', '.') }}</div>
                        <div class="app-kpi-note">Total kegiatan pelatihan yang telah memasuki tahap pelaporan.</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="app-kpi-card accent-lavender">
                        <div class="app-kpi-top">
                            <span class="app-kpi-label">Dokumen Laporan Terunggah</span>
                            <span class="app-icon-box"><i class="bi bi-file-earmark-check"></i></span>
                        </div>
                        <div class="app-kpi-value">{{ number_format($totalUploadedDocuments, 0, ',', '.') }}</div>
                        <div class="app-kpi-note">Akumulasi Laporan Penyelenggara dan Evaluasi Penyelenggaraan yang tersimpan.</div>
                    </div>
                </div>
            </div>

            <div class="search-toolbar">
                <div>
                    <div class="fw-bold" style="color: var(--purple-dark); font-size: 14.5px;">Daftar Kegiatan Selesai</div>
                    <div class="text-secondary" style="font-size: 12.5px;">
                        Laporan Penyelenggara dan Evaluasi Penyelenggaraan dikelola dan diverifikasi secara terpisah per kegiatan.
                    </div>
                </div>

                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        id="searchActivity"
                        class="form-control"
                        placeholder="Cari nama atau penyelenggara kegiatan..."
                        autocomplete="off"
                    >
                </div>
            </div>

            @if ($trainings->count() > 0)
                <div id="activityList">
                    @foreach ($trainings as $index => $training)
                        <section
                            id="training-{{ $training->id }}"
                            class="activity-card"
                            data-search="{{ strtolower($training->training_name . ' ' . $training->organizer . ' ' . $training->venue) }}"
                        >
                            <div class="activity-header">
                                <div class="activity-heading">
                                    <span class="activity-number">{{ $index + 1 }}</span>

                                    <div class="min-w-0">
                                        <h5 class="activity-title">{{ $training->training_name }}</h5>
                                        <div class="activity-meta">
                                            <span><i class="bi bi-building"></i>{{ $training->organizer ?: '-' }}</span>
                                            <span>
                                                <i class="bi bi-calendar3"></i>
                                                {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                                                @if ($training->end_date)
                                                    s.d. {{ $training->end_date->format('d/m/Y') }}
                                                @endif
                                            </span>
                                            <span><i class="bi bi-geo-alt"></i>{{ $training->venue ?: '-' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <span class="app-badge app-badge-success">
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
                                            'style' => 'report',
                                            'iconStyle' => 'berry'
                                        ],
                                        [
                                            'type' => 'evaluasi_penyelenggaraan',
                                            'title' => 'Evaluasi Penyelenggaraan',
                                            'subtitle' => 'Dokumen hasil evaluasi penyelenggaraan kegiatan.',
                                            'icon' => 'bi-clipboard-check',
                                            'style' => 'evaluation',
                                            'iconStyle' => ''
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

                                        <article class="report-doc-card {{ $item['style'] }} {{ $status === 'revision' ? 'needs-revision' : '' }}">
                                            <div class="report-doc-head">
                                                <div class="report-doc-title-wrap">
                                                    <span class="app-icon-box {{ $item['iconStyle'] }}">
                                                        <i class="bi {{ $item['icon'] }}"></i>
                                                    </span>
                                                    <div class="min-w-0">
                                                        <h6 class="report-doc-title">{{ $item['title'] }}</h6>
                                                        <div class="report-doc-subtitle">{{ $item['subtitle'] }}</div>
                                                    </div>
                                                </div>

                                                @if (!$document)
                                                    <span class="app-badge app-badge-muted">
                                                        <i class="bi bi-file-earmark-minus"></i>
                                                        Belum Diunggah
                                                    </span>
                                                @elseif ($status === 'verified')
                                                    <span class="app-badge app-badge-success">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        Terverifikasi
                                                    </span>
                                                @elseif ($status === 'revision')
                                                    <span class="app-badge app-badge-revision">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                        Perlu Revisi
                                                    </span>
                                                @else
                                                    <span class="app-badge app-badge-warning">
                                                        <i class="bi bi-clock-fill"></i>
                                                        Menunggu Pemeriksaan
                                                    </span>
                                                @endif
                                            </div>

                                            @if ($document)
                                                <div class="file-box">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    <div class="min-w-0 flex-grow-1">
                                                        <div class="file-box-name">{{ $document->original_name }}</div>
                                                        <div class="file-box-meta">
                                                            {{ number_format(($document->file_size ?? 0) / 1024, 1, ',', '.') }} KB
                                                            <span class="mx-1">·</span>
                                                            Oleh {{ $document->uploader?->name ?? '-' }}
                                                            <span class="mx-1">·</span>
                                                            {{ $uploadedAt?->format('d/m/Y H:i') ?? '-' }}
                                                        </div>
                                                        <div class="mt-2">
                                                            <a
                                                                href="{{ route('training-documents.download', $document) }}"
                                                                class="app-btn app-btn-soft-blue app-btn-sm"
                                                                target="_blank"
                                                                rel="noopener"
                                                            >
                                                                <i class="bi bi-download"></i>
                                                                Unduh Dokumen
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($status === 'revision')
                                                    <div class="revision-note-panel">
                                                        <div class="revision-note-title">
                                                            <i class="bi bi-exclamation-circle-fill"></i>
                                                            Catatan Revisi dari Dalmut
                                                        </div>
                                                        <div style="white-space: pre-line;">{{ $document->verification_notes ?: 'Dokumen diminta untuk diperbaiki.' }}</div>
                                                        @if ($document->verifier || $document->verified_at)
                                                            <div class="revision-note-meta">
                                                                {{ $document->verifier?->name ?? 'Dalmut' }}@if ($document->verified_at) · {{ $document->verified_at->format('d/m/Y H:i') }}@endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                @elseif ($status === 'verified' && $document->verification_notes)
                                                    <div class="verified-note-panel">
                                                        <div class="fw-bold mb-1" style="font-size: 12.5px;">
                                                            <i class="bi bi-check-circle-fill me-1"></i>
                                                            Catatan Verifikasi
                                                        </div>
                                                        <div style="white-space: pre-line;">{{ $document->verification_notes }}</div>
                                                    </div>
                                                @endif
                                            @endif

                                            @if ($canUpload && !$document)
                                                <div class="upload-panel">
                                                    <form
                                                        action="{{ route('trainings.documents.store', $training) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >
                                                        @csrf
                                                        <input type="hidden" name="document_type" value="{{ $item['type'] }}">

                                                        <label class="app-form-label">
                                                            <i class="bi bi-cloud-arrow-up me-1"></i>
                                                            Pilih File {{ $item['title'] }}
                                                        </label>

                                                        <input
                                                            type="file"
                                                            name="document_file"
                                                            class="form-control"
                                                            accept=".pdf,.doc,.docx"
                                                            required
                                                        >

                                                        <small class="app-field-hint">Format PDF, DOC, atau DOCX (maksimal 10 MB).</small>

                                                        <button type="submit" class="app-btn app-btn-primary w-100 mt-3">
                                                            <i class="bi bi-cloud-arrow-up"></i>
                                                            Unggah Dokumen
                                                        </button>
                                                    </form>
                                                </div>
                                            @elseif ($canUpload && $document && $status === 'revision')
                                                <div class="upload-panel reupload-panel">
                                                    <form
                                                        action="{{ route('training-documents.reupload', $document) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >
                                                        @csrf
                                                        @method('PATCH')

                                                        <label class="app-form-label" style="color: #9A3B62;">
                                                            <i class="bi bi-arrow-repeat me-1"></i>
                                                            Unggah Ulang {{ $item['title'] }}
                                                        </label>

                                                        <div class="text-secondary mb-2" style="font-size: 12.5px; overflow-wrap: anywhere;">
                                                            File baru akan menggantikan <strong>{{ $document->original_name }}</strong>.
                                                        </div>

                                                        <input
                                                            type="file"
                                                            name="document_file"
                                                            class="form-control"
                                                            accept=".pdf,.doc,.docx"
                                                            required
                                                        >

                                                        <small class="app-field-hint">
                                                            Format PDF, DOC, DOCX (maks. 10 MB). Status otomatis kembali menjadi Menunggu Pemeriksaan.
                                                        </small>

                                                        <button type="submit" class="app-btn app-btn-berry w-100 mt-3">
                                                            <i class="bi bi-cloud-arrow-up"></i>
                                                            Unggah Ulang
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif

                                            @if ($canReview && $document && $status === 'pending')
                                                <div class="review-panel">
                                                    <div class="review-heading">
                                                        <i class="bi bi-shield-check me-1" style="color: var(--berry);"></i>
                                                        Pemeriksaan Dokumen oleh Dalmut
                                                    </div>

                                                    <form action="{{ route('training-documents.verify', $document) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')

                                                        <label class="app-form-label">Catatan Verifikasi (Opsional)</label>
                                                        <textarea
                                                            name="verification_notes"
                                                            class="form-control"
                                                            rows="2"
                                                            placeholder="Tambahkan catatan pemeriksaan jika diperlukan..."
                                                        ></textarea>

                                                        <button type="submit" class="app-btn app-btn-success w-100 mt-2">
                                                            <i class="bi bi-check-circle"></i>
                                                            Verifikasi Dokumen
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('training-documents.request-revision', $document) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')

                                                        <label class="app-form-label">
                                                            Catatan Permintaan Revisi <span class="app-required">*</span>
                                                        </label>
                                                        <textarea
                                                            name="verification_notes"
                                                            class="form-control"
                                                            rows="2"
                                                            placeholder="Jelaskan bagian dokumen yang perlu diperbaiki..."
                                                            required
                                                        ></textarea>

                                                        <button type="submit" class="app-btn app-btn-soft-warning w-100 mt-2">
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

                <div class="no-search-result" id="noSearchResult">
                    <div class="app-empty-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h6 class="fw-bold" style="color: var(--purple-dark);">Kegiatan Tidak Ditemukan</h6>
                    <p class="mb-0" style="font-size: 13px;">Coba gunakan kata kunci nama atau penyelenggara kegiatan yang berbeda.</p>
                </div>
            @else
                <section class="app-card mb-0">
                    <div class="app-empty-state">
                        <div class="app-empty-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h6>Belum Ada Kegiatan yang Selesai</h6>
                        <p>
                            Kegiatan akan tampil di halaman ini setelah status pelaksanaannya ditandai Selesai. Pengunggahan Laporan Penyelenggara dan Evaluasi Penyelenggaraan dapat dilakukan pada tahap tersebut.
                        </p>
                    </div>
                </section>
            @endif

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

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
                    noSearchResult.style.display = visibleCount === 0 ? 'block' : 'none';
                }
            });
        }
    </script>

</body>
</html>
