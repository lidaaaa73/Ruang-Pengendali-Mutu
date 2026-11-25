<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Kegiatan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .training-context-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
            padding: 18px 22px;
            border: 1px solid #DFD5EB;
            border-left: 4px solid var(--purple-dark);
            border-radius: var(--radius-lg);
            background: var(--surface);
            box-shadow: var(--shadow-xs);
        }

        .training-context-title {
            margin: 0 0 4px;
            color: var(--purple-dark);
            font-size: 16.5px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .training-context-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 16px;
            color: var(--text-secondary);
            font-size: 13px;
        }

        .training-context-meta i {
            color: var(--berry);
            margin-right: 5px;
        }

        .upload-panel {
            padding: 18px 20px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
        }

        .doc-row-revision {
            background: #FFF7FA !important;
        }

        .doc-row-revision td:first-child {
            box-shadow: inset 3.5px 0 0 var(--berry);
        }

        .doc-file-cell {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            min-width: 210px;
            max-width: 280px;
        }

        .doc-file-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface-tint);
            color: var(--purple-dark);
            font-size: 16px;
        }

        .doc-file-name {
            color: var(--text-primary);
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .doc-file-size {
            margin-top: 2px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .revision-note-card {
            min-width: 200px;
            max-width: 280px;
            padding: 9px 12px;
            border: 1px solid #F1C9D8;
            border-left: 3px solid var(--berry);
            border-radius: var(--radius-sm);
            background: #FDF2F6;
            color: #7D2F4C;
            font-size: 12.5px;
            line-height: 1.55;
            overflow-wrap: anywhere;
        }

        .revision-note-title {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 3px;
            color: #9A3B62;
            font-size: 12px;
            font-weight: 700;
        }

        .revision-note-text {
            white-space: pre-line;
        }

        .revision-note-meta {
            margin-top: 5px;
            color: #9B6478;
            font-size: 11.5px;
        }

        .doc-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            min-width: 190px;
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
        $documentLabels = [
            'kak' => 'KAK',
            'sk' => 'SK Penyelenggaraan',
            'jadwal' => 'Jadwal Pelatihan',
        ];
        $verifiedDocumentTypes = $preparationDocuments
            ->where('verification_status', 'verified')
            ->pluck('document_type')
            ->all();
        $revisionDocumentTypes = $preparationDocuments
            ->where('verification_status', 'revision')
            ->pluck('document_type')
            ->all();
    @endphp

    @include('layouts.sidebar', [
        'active' => 'trainings'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Data Kegiatan Pelatihan', 'url' => route('trainings.index')],
                ['label' => 'Detail Kegiatan', 'url' => route('trainings.show', $training)],
                ['label' => 'Dokumen Kegiatan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-folder2-open"></i>
                        Dokumen Persyaratan Pelatihan
                    </div>
                    <h1 class="app-page-title">Dokumen Kegiatan</h1>
                    <p class="app-page-subtitle">
                        Kelola dokumen persyaratan (KAK, SK Penyelenggaraan, dan Jadwal Pelatihan) untuk persetujuan Dalmut.
                    </p>
                </div>

                <a href="{{ route('trainings.show', $training) }}" class="app-btn app-btn-outline">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Detail
                </a>
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
                        <strong>Dokumen belum dapat diproses.</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <section class="training-context-bar">
                <div class="min-w-0">
                    <h2 class="training-context-title">{{ $training->training_name }}</h2>
                    <div class="training-context-meta">
                        <span>
                            <i class="bi bi-calendar-event"></i>
                            {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                            @if ($training->end_date)
                                s.d. {{ $training->end_date->format('d/m/Y') }}
                            @endif
                        </span>
                        <span>
                            <i class="bi bi-building"></i>
                            {{ $training->organizer ?: '-' }}
                        </span>
                    </div>
                </div>

                <span class="app-badge app-badge-neutral">
                    <i class="bi bi-files"></i>
                    {{ $preparationDocuments->count() }} dari 3 dokumen diunggah
                </span>
            </section>

            @if ($canUploadDocuments)
                <section class="app-card">
                    <div class="app-card-header">
                        <div class="app-card-header-left">
                            <span class="app-icon-box berry">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </span>
                            <div>
                                <h5 class="app-card-title">Unggah Dokumen Persyaratan</h5>
                                <p class="app-card-subtitle">Unggah KAK, SK Penyelenggaraan, atau Jadwal Pelatihan sebelum kegiatan disetujui.</p>
                            </div>
                        </div>
                    </div>

                    <div class="app-card-body">
                        <div class="upload-panel">
                            <form
                                action="{{ route('trainings.documents.store', $training) }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf

                                <div class="row g-3 align-items-end">
                                    <div class="col-12 col-md-4">
                                        <label for="document_type" class="app-form-label">
                                            Jenis Dokumen <span class="app-required">*</span>
                                        </label>

                                        <select name="document_type" id="document_type" class="form-select" required>
                                            <option value="">Pilih jenis dokumen</option>
                                            @foreach ($documentLabels as $typeKey => $typeLabel)
                                                @php
                                                    $isVerifiedType = in_array($typeKey, $verifiedDocumentTypes, true);
                                                    $isRevisionType = in_array($typeKey, $revisionDocumentTypes, true);
                                                @endphp
                                                <option
                                                    value="{{ $typeKey }}"
                                                    @selected(old('document_type') === $typeKey && !$isVerifiedType && !$isRevisionType)
                                                    @disabled($isVerifiedType || $isRevisionType)
                                                >
                                                    {{ $typeLabel }}@if ($isVerifiedType) (Sudah Terverifikasi)@elseif ($isRevisionType) (Perlu Revisi — gunakan tombol Unggah Ulang)@endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-5">
                                        <label for="document_file" class="app-form-label">
                                            Pilih File Dokumen <span class="app-required">*</span>
                                        </label>

                                        <input
                                            type="file"
                                            name="document_file"
                                            id="document_file"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                            required
                                        >
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <button type="submit" class="app-btn app-btn-primary w-100" style="min-height: 42px;">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                            Unggah Dokumen
                                        </button>
                                    </div>
                                </div>

                                <small class="app-field-hint mt-2">
                                    Format yang diperbolehkan: PDF, DOC, atau DOCX (maksimal 10 MB). Laporan Penyelenggara dan Evaluasi diunggah melalui menu Laporan Kegiatan setelah kegiatan selesai.
                                </small>
                            </form>
                        </div>
                    </div>
                </section>
            @endif

            <section class="app-card mb-0">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box">
                            <i class="bi bi-files"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Daftar Dokumen Persyaratan</h5>
                            <p class="app-card-subtitle">Status pemeriksaan dan catatan verifikasi untuk setiap dokumen yang diunggah.</p>
                        </div>
                    </div>
                </div>

                <div class="app-card-body">
                    <div class="app-table-wrap">
                        <table class="table app-table" style="min-width: 1020px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Nama File</th>
                                    <th>Pengunggah</th>
                                    <th>Status</th>
                                    <th>Catatan Pemeriksaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($preparationDocuments as $document)
                                    @php
                                        $documentTypeLabel = $documentLabels[$document->document_type] ?? $document->document_type;
                                        $uploadedAt = $document->updated_at ?? $document->created_at;
                                    @endphp
                                    <tr class="{{ $document->verification_status === 'revision' ? 'doc-row-revision' : '' }}">
                                        <td>
                                            <span class="app-row-number">{{ $loop->iteration }}</span>
                                        </td>

                                        <td class="fw-semibold" style="color: var(--purple-dark); white-space: nowrap;">
                                            {{ $documentTypeLabel }}
                                        </td>

                                        <td>
                                            <div class="doc-file-cell">
                                                <span class="doc-file-icon">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                </span>
                                                <div class="min-w-0">
                                                    <div class="doc-file-name">{{ $document->original_name }}</div>
                                                    <div class="doc-file-size">
                                                        {{ $document->file_size ? number_format($document->file_size / 1024, 0, ',', '.') . ' KB' : '-' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="fw-medium" style="font-size: 13px;">{{ $document->uploader?->name ?? '-' }}</div>
                                            <div class="doc-file-size">
                                                <i class="bi bi-clock me-1"></i>{{ $uploadedAt?->format('d/m/Y H:i') ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            @if ($document->verification_status === 'verified')
                                                <span class="app-badge app-badge-success">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Terverifikasi
                                                </span>
                                            @elseif ($document->verification_status === 'revision')
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
                                        </td>

                                        <td>
                                            @if ($document->verification_status === 'revision')
                                                <div class="revision-note-card">
                                                    <div class="revision-note-title">
                                                        <i class="bi bi-exclamation-circle-fill"></i>
                                                        Catatan Revisi Dalmut
                                                    </div>
                                                    <div class="revision-note-text">{{ $document->verification_notes ?: 'Dokumen diminta untuk diperbaiki.' }}</div>
                                                    @if ($document->verifier || $document->verified_at)
                                                        <div class="revision-note-meta">
                                                            {{ $document->verifier?->name ?? 'Dalmut' }}@if ($document->verified_at) · {{ $document->verified_at->format('d/m/Y H:i') }}@endif
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="text-secondary" style="font-size: 13px; max-width: 260px; white-space: pre-line; overflow-wrap: anywhere;">
                                                    {{ $document->verification_notes ?: '-' }}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="doc-actions">
                                                <a
                                                    href="{{ route('training-documents.download', $document) }}"
                                                    class="app-btn app-btn-soft-blue app-btn-sm"
                                                    target="_blank"
                                                    rel="noopener"
                                                >
                                                    <i class="bi bi-download"></i>
                                                    Unduh
                                                </a>

                                                @if ($canUploadDocuments && $document->verification_status === 'revision')
                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-berry app-btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#reuploadDocument{{ $document->id }}"
                                                    >
                                                        <i class="bi bi-cloud-arrow-up"></i>
                                                        Unggah Ulang
                                                    </button>
                                                @endif

                                                @if ($canUploadDocuments && $document->verification_status === 'pending')
                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-outline app-btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDocument{{ $document->id }}"
                                                        title="Ganti file"
                                                    >
                                                        <i class="bi bi-pencil"></i>
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-danger app-btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteDocument{{ $document->id }}"
                                                        title="Hapus dokumen"
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                @endif

                                                @if ($canReviewDocuments && $document->verification_status === 'pending')
                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-success app-btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#verifyDocument{{ $document->id }}"
                                                    >
                                                        <i class="bi bi-check-circle"></i>
                                                        Verifikasi
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-warning app-btn-sm"
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
                                            <div class="app-empty-state">
                                                <div class="app-empty-icon">
                                                    <i class="bi bi-folder2-open"></i>
                                                </div>
                                                <h6>Belum Ada Dokumen Persyaratan</h6>
                                                <p>Dokumen KAK, SK Penyelenggaraan, dan Jadwal Pelatihan yang diunggah akan tampil di tabel ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    @foreach ($preparationDocuments as $document)
        @php
            $documentTypeLabel = $documentLabels[$document->document_type] ?? $document->document_type;
        @endphp

        @if ($canUploadDocuments && $document->verification_status === 'revision')
            <div class="modal fade" id="reuploadDocument{{ $document->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form
                            action="{{ route('training-documents.reupload', $document) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PATCH')

                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-cloud-arrow-up me-2" style="color: var(--berry);"></i>
                                    Unggah Ulang Dokumen
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="app-form-label">Jenis Dokumen</div>
                                    <div class="modal-highlight-box">{{ $documentTypeLabel }}</div>
                                </div>

                                <div class="mb-3">
                                    <div class="app-form-label">File Sebelumnya</div>
                                    <div class="modal-highlight-box fw-normal">
                                        <i class="bi bi-file-earmark-text me-1"></i>
                                        {{ $document->original_name }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="app-form-label">Catatan Revisi dari Dalmut</div>
                                    <div class="modal-revision-box">{{ $document->verification_notes ?: 'Dokumen diminta untuk diperbaiki.' }}</div>
                                </div>

                                <div>
                                    <label for="reupload_file_{{ $document->id }}" class="app-form-label">
                                        Pilih File Pengganti <span class="app-required">*</span>
                                    </label>
                                    <input
                                        type="file"
                                        name="document_file"
                                        id="reupload_file_{{ $document->id }}"
                                        class="form-control"
                                        accept=".pdf,.doc,.docx"
                                        required
                                    >
                                    <small class="app-field-hint">
                                        File baru menggantikan dokumen lama dan status otomatis kembali menjadi Menunggu Pemeriksaan. Format: PDF, DOC, DOCX (maks. 10 MB).
                                    </small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="app-btn app-btn-berry">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    Unggah Ulang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if ($canUploadDocuments && $document->verification_status === 'pending')
            <div class="modal fade" id="editDocument{{ $document->id }}" tabindex="-1" aria-hidden="true">
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
                                <h5 class="modal-title">
                                    <i class="bi bi-pencil-square me-2"></i>
                                    Perbarui File Dokumen
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="app-form-label">Jenis Dokumen</div>
                                    <div class="modal-highlight-box">{{ $documentTypeLabel }}</div>
                                </div>

                                <div class="mb-3">
                                    <div class="app-form-label">File Saat Ini</div>
                                    <div class="modal-highlight-box fw-normal">
                                        <i class="bi bi-file-earmark-text me-1"></i>
                                        {{ $document->original_name }}
                                    </div>
                                </div>

                                <div>
                                    <label for="document_file_{{ $document->id }}" class="app-form-label">
                                        Pilih File Pengganti <span class="app-required">*</span>
                                    </label>
                                    <input
                                        type="file"
                                        name="document_file"
                                        id="document_file_{{ $document->id }}"
                                        class="form-control"
                                        accept=".pdf,.doc,.docx"
                                        required
                                    >
                                    <small class="app-field-hint">Format: PDF, DOC, atau DOCX (maksimal 10 MB).</small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="app-btn app-btn-primary">
                                    <i class="bi bi-save"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteDocument{{ $document->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-trash3 me-2" style="color: #A33753;"></i>
                                Konfirmasi Hapus Dokumen
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <div class="modal-body">
                            <p class="text-secondary mb-3">Apakah Anda yakin ingin menghapus dokumen berikut?</p>
                            <div class="modal-highlight-box mb-3">
                                <i class="bi bi-file-earmark-text me-1"></i>
                                {{ $document->original_name }}
                            </div>
                            <p class="text-secondary mb-0" style="font-size: 12.5px;">
                                Dokumen yang telah dihapus tidak dapat dikembalikan.
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('training-documents.destroy', $document) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="app-btn app-btn-danger">
                                    <i class="bi bi-trash3"></i>
                                    Ya, Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($canReviewDocuments && $document->verification_status === 'pending')
            <div class="modal fade" id="verifyDocument{{ $document->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('training-documents.verify', $document) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-check-circle me-2" style="color: #256041;"></i>
                                    Verifikasi Dokumen
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <p class="text-secondary mb-3">Pastikan isi dokumen telah diperiksa sebelum memberikan status terverifikasi.</p>
                                <div class="modal-highlight-box mb-3">
                                    <div class="text-secondary fw-normal" style="font-size: 12px;">{{ $documentTypeLabel }}</div>
                                    {{ $document->original_name }}
                                </div>

                                <label for="verification_notes_{{ $document->id }}" class="app-form-label">
                                    Catatan Pemeriksaan (Opsional)
                                </label>
                                <textarea
                                    name="verification_notes"
                                    id="verification_notes_{{ $document->id }}"
                                    class="form-control"
                                    rows="3"
                                    maxlength="2000"
                                    placeholder="Tuliskan catatan pemeriksaan jika diperlukan..."
                                ></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="app-btn app-btn-success">
                                    <i class="bi bi-check-circle"></i>
                                    Ya, Verifikasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="revisionDocument{{ $document->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('training-documents.request-revision', $document) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-arrow-repeat me-2" style="color: var(--berry);"></i>
                                    Permintaan Revisi Dokumen
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <p class="text-secondary mb-3">Jelaskan bagian dokumen yang perlu diperbaiki oleh Penglat.</p>
                                <div class="modal-highlight-box mb-3">
                                    <div class="text-secondary fw-normal" style="font-size: 12px;">{{ $documentTypeLabel }}</div>
                                    {{ $document->original_name }}
                                </div>

                                <label for="revision_notes_{{ $document->id }}" class="app-form-label">
                                    Catatan Revisi <span class="app-required">*</span>
                                </label>
                                <textarea
                                    name="verification_notes"
                                    id="revision_notes_{{ $document->id }}"
                                    class="form-control"
                                    rows="4"
                                    maxlength="2000"
                                    required
                                    placeholder="Tuliskan poin perbaikan yang dibutuhkan..."
                                ></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="app-btn app-btn-warning">
                                    <i class="bi bi-arrow-repeat"></i>
                                    Kirim Permintaan Revisi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
