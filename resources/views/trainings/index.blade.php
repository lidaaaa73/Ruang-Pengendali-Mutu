<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .search-box {
            position: relative;
            width: 100%;
            max-width: 320px;
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

        .training-cell-title {
            max-width: 260px;
            color: var(--text-primary);
            font-weight: 600;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .training-cell-meta {
            margin-top: 3px;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.45;
        }

        .approval-note-hint {
            margin-top: 4px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .action-cluster {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            min-width: 210px;
        }

        @media (max-width: 767.98px) {
            .search-box {
                max-width: 100%;
            }
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
                ['label' => 'Data Kegiatan Pelatihan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-calendar2-check"></i>
                        Pengelolaan Mutu Pelatihan
                    </div>
                    <h1 class="app-page-title">Data Kegiatan Pelatihan</h1>
                    <p class="app-page-subtitle">
                        Kelola jadwal, status persetujuan Dalmut, dan tahapan pelaksanaan kegiatan pelatihan Bapelkes.
                    </p>
                </div>

                @if (in_array(auth()->user()->role?->slug, ['admin', 'penglat'], true))
                    <a href="{{ route('trainings.create') }}" class="app-btn app-btn-primary">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Kegiatan
                    </a>
                @endif
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
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <section class="app-card mb-0">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box">
                            <i class="bi bi-journal-text"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Daftar Kegiatan Pelatihan</h5>
                            <p class="app-card-subtitle">Total {{ number_format($trainings->total(), 0, ',', '.') }} kegiatan terdaftar pada sistem.</p>
                        </div>
                    </div>

                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input
                            type="text"
                            id="searchTraining"
                            class="form-control"
                            placeholder="Cari nama pelatihan..."
                            aria-label="Cari nama pelatihan"
                        >
                    </div>
                </div>

                <div class="app-card-body">
                    <div class="app-table-wrap">
                        <table class="table app-table" id="trainingTable" style="min-width: 1080px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pelatihan &amp; Lokasi</th>
                                    <th>Tanggal</th>
                                    <th>Penyelenggara</th>
                                    <th class="text-end">Peserta</th>
                                    <th>Persetujuan</th>
                                    <th>Pelaksanaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($trainings as $training)
                                    @php
                                        $userRole = auth()->user()->role?->slug;
                                        $canMarkCompleted =
                                            in_array($userRole, ['admin', 'penglat'], true)
                                            && $training->approval_status === 'approved'
                                            && in_array($training->execution_status, ['akan_dilaksanakan', 'sedang_berlangsung'], true);
                                        $canDecide =
                                            in_array($userRole, ['admin', 'dalmut'], true)
                                            && $training->approval_status !== 'approved';
                                        $canManage = in_array($userRole, ['admin', 'penglat'], true);
                                    @endphp

                                    <tr>
                                        <td>
                                            <span class="app-row-number">{{ $trainings->firstItem() + $loop->index }}</span>
                                        </td>

                                        <td>
                                            <div class="training-cell-title">{{ $training->training_name }}</div>
                                            <div class="training-cell-meta">
                                                <i class="bi bi-geo-alt me-1"></i>{{ $training->venue ?: '-' }}
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="fw-semibold" style="font-size: 13px;">
                                                {{ $training->start_date?->format('d/m/Y') ?? '-' }}
                                            </div>
                                            @if ($training->end_date)
                                                <div class="training-cell-meta">s.d. {{ $training->end_date->format('d/m/Y') }}</div>
                                            @endif
                                        </td>

                                        <td>{{ $training->organizer ?: '-' }}</td>

                                        <td class="text-end text-nowrap fw-semibold" style="font-variant-numeric: tabular-nums;">
                                            {{ number_format($training->participant_count, 0, ',', '.') }}
                                            <span class="fw-normal text-secondary">orang</span>
                                        </td>

                                        <td>
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
                                                    Menunggu
                                                </span>
                                            @endif

                                            @if ($training->approval_notes)
                                                <div class="approval-note-hint" title="{{ $training->approval_notes }}">
                                                    <i class="bi bi-chat-left-text me-1" style="color: var(--berry);"></i>Ada catatan
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            @switch($training->execution_status)
                                                @case('sedang_berlangsung')
                                                    <span class="app-badge app-badge-info">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                        Berlangsung
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
                                                        <i class="bi bi-calendar-check"></i>
                                                        Terjadwal
                                                    </span>
                                            @endswitch
                                        </td>

                                        <td>
                                            <div class="action-cluster">
                                                <a
                                                    href="{{ route('trainings.show', $training) }}"
                                                    class="app-btn app-btn-soft-blue app-btn-sm"
                                                    title="Lihat detail kegiatan"
                                                >
                                                    <i class="bi bi-eye"></i>
                                                    Detail
                                                </a>

                                                <a
                                                    href="{{ route('trainings.documents.index', $training) }}"
                                                    class="app-btn app-btn-soft-purple app-btn-sm"
                                                    title="Kelola dokumen kegiatan"
                                                >
                                                    <i class="bi bi-folder2-open"></i>
                                                    Dokumen
                                                </a>

                                                @if ($canMarkCompleted)
                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-success app-btn-sm"
                                                        title="Tandai kegiatan selesai"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#completeTrainingModal"
                                                        data-complete-url="{{ route('trainings.mark-completed', $training) }}"
                                                        data-training-name="{{ $training->training_name }}"
                                                    >
                                                        <i class="bi bi-check2-all"></i>
                                                        Selesai
                                                    </button>
                                                @endif

                                                @if ($canDecide)
                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-success app-btn-sm"
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
                                                        class="app-btn app-btn-soft-warning app-btn-sm"
                                                        title="Minta revisi kegiatan"
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
                                                        class="app-btn app-btn-soft-danger app-btn-sm"
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

                                                @if ($canManage)
                                                    <a
                                                        href="{{ route('trainings.edit', $training) }}"
                                                        class="app-btn app-btn-outline app-btn-sm"
                                                        title="Edit kegiatan"
                                                    >
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-danger app-btn-sm"
                                                        title="Hapus kegiatan"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteTrainingModal"
                                                        data-delete-url="{{ route('trainings.destroy', $training) }}"
                                                        data-training-name="{{ $training->training_name }}"
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="app-empty-state">
                                                <div class="app-empty-icon">
                                                    <i class="bi bi-calendar2-x"></i>
                                                </div>
                                                <h6>Belum Ada Kegiatan Pelatihan</h6>
                                                <p>Data kegiatan pelatihan yang ditambahkan akan ditampilkan di halaman ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($trainings->hasPages())
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">
                            <span class="text-secondary" style="font-size: 12.5px;">
                                Menampilkan {{ $trainings->firstItem() }}–{{ $trainings->lastItem() }} dari {{ $trainings->total() }} kegiatan
                            </span>
                            {{ $trainings->links() }}
                        </div>
                    @endif
                </div>
            </section>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <div class="modal fade" id="completeTrainingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-check2-circle me-2" style="color: #256041;"></i>
                        Konfirmasi Kegiatan Selesai
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <p class="text-secondary mb-3">
                        Apakah kegiatan pelatihan berikut benar-benar telah selesai dilaksanakan? Setelah dikonfirmasi, kegiatan akan masuk ke tahap pelaporan.
                    </p>

                    <div class="modal-highlight-box" id="completeTrainingName"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>

                    <form id="completeTrainingForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="app-btn app-btn-success">
                            <i class="bi bi-check-lg"></i>
                            Ya, Tandai Selesai
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approveTrainingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle me-2" style="color: #256041;"></i>
                        Persetujuan Kegiatan Pelatihan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <p class="text-secondary mb-3">
                        Apakah Anda yakin ingin menyetujui kegiatan pelatihan berikut? Pastikan dokumen KAK, SK Penyelenggaraan, dan Jadwal Pelatihan telah terverifikasi.
                    </p>

                    <div class="modal-highlight-box" id="approveTrainingName"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>

                    <form id="approveTrainingForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="app-btn app-btn-success">
                            <i class="bi bi-check-lg"></i>
                            Ya, Setujui
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="decisionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="decisionForm" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="modal-header">
                        <h5 class="modal-title" id="decisionTitle">Keputusan Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body">
                        <div class="app-form-label">Nama Kegiatan</div>
                        <div class="modal-highlight-box mb-3" id="decisionTrainingName"></div>

                        <p class="text-secondary mb-3" id="decisionDescription"></p>

                        <label for="approval_notes" class="app-form-label">
                            Catatan Keputusan <span class="app-required">*</span>
                        </label>

                        <textarea
                            class="form-control"
                            id="approval_notes"
                            name="approval_notes"
                            rows="4"
                            maxlength="2000"
                            placeholder="Tuliskan alasan atau catatan perbaikan..."
                            required
                        ></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="app-btn app-btn-danger" id="decisionSubmitButton">
                            Kirim Keputusan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteTrainingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-trash3 me-2" style="color: #A33753;"></i>
                        Konfirmasi Hapus Kegiatan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <p class="text-secondary mb-3">
                        Anda akan menghapus kegiatan pelatihan berikut beserta seluruh dokumen terkait:
                    </p>

                    <div class="modal-highlight-box mb-3" id="deleteTrainingName"></div>

                    <p class="text-secondary mb-0" style="font-size: 12.5px;">
                        Data yang telah dihapus tidak dapat dikembalikan.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">Batal</button>

                    <form id="deleteTrainingForm" method="POST">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchInput = document.getElementById('searchTraining');
        const tableRows = document.querySelectorAll('#trainingTable tbody tr');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase();

                tableRows.forEach(function (row) {
                    const trainingName = row.cells[1]?.innerText.toLowerCase() || '';
                    row.style.display = trainingName.includes(keyword) ? '' : 'none';
                });
            });
        }

        const completeTrainingModal = document.getElementById('completeTrainingModal');
        if (completeTrainingModal) {
            completeTrainingModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                document.getElementById('completeTrainingForm').action = trigger.getAttribute('data-complete-url');
                document.getElementById('completeTrainingName').textContent = trigger.getAttribute('data-training-name');
            });
        }

        const approveTrainingModal = document.getElementById('approveTrainingModal');
        if (approveTrainingModal) {
            approveTrainingModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                document.getElementById('approveTrainingForm').action = trigger.getAttribute('data-approve-url');
                document.getElementById('approveTrainingName').textContent = trigger.getAttribute('data-training-name');
            });
        }

        const decisionModal = document.getElementById('decisionModal');
        if (decisionModal) {
            decisionModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                document.getElementById('decisionForm').action = trigger.getAttribute('data-decision-url');
                document.getElementById('decisionTitle').textContent = trigger.getAttribute('data-decision-title');
                document.getElementById('decisionDescription').textContent = trigger.getAttribute('data-decision-description');
                document.getElementById('decisionTrainingName').textContent = trigger.getAttribute('data-training-name');

                const submitButton = document.getElementById('decisionSubmitButton');
                const buttonColor = trigger.getAttribute('data-decision-color');
                submitButton.textContent = trigger.getAttribute('data-decision-button');
                submitButton.className = buttonColor === 'warning'
                    ? 'app-btn app-btn-warning'
                    : 'app-btn app-btn-danger';

                document.getElementById('approval_notes').value = '';
            });
        }

        const deleteTrainingModal = document.getElementById('deleteTrainingModal');
        if (deleteTrainingModal) {
            deleteTrainingModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                document.getElementById('deleteTrainingName').textContent = trigger.getAttribute('data-training-name');
                document.getElementById('deleteTrainingForm').action = trigger.getAttribute('data-delete-url');
            });
        }
    </script>

</body>
</html>
