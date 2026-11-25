<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaturan Google Drive | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .status-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding: 12px 14px;
            margin-bottom: 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
        }

        .folder-box {
            padding: 16px;
            margin-bottom: 16px;
            border: 1.5px dashed var(--lavender);
            border-radius: var(--radius-md);
            background: var(--surface-subtle);
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #F1ECF6;
        }

        .step-item:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--surface-tint);
            color: var(--purple-dark);
            font-size: 12.5px;
            font-weight: 700;
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'google-drive'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Pengaturan Google Drive']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-cloud-check"></i>
                        Integrasi Penyimpanan Dokumen
                    </div>
                    <h1 class="app-page-title">Pengaturan Google Drive</h1>
                    <p class="app-page-subtitle">
                        Hubungkan akun Google resmi Bapelkes dan tentukan folder tujuan penyimpanan dokumen kegiatan pelatihan.
                    </p>
                </div>

                @if ($connected)
                    <span class="app-badge app-badge-success">
                        <i class="bi bi-check-circle-fill"></i>
                        Akun Terhubung
                    </span>
                @else
                    <span class="app-badge app-badge-danger">
                        <i class="bi bi-x-circle-fill"></i>
                        Belum Terhubung
                    </span>
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

            <div id="driveFeedback" class="d-none"></div>

            <div class="row g-4">
                <div class="col-12 col-xl-7">
                    <section class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box">
                                    <i class="bi bi-google"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">Koneksi Akun Google</h5>
                                    <p class="app-card-subtitle">Otorisasi akun Google Bapelkes untuk sinkronisasi dokumen otomatis.</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="status-row">
                                <span class="fw-semibold">Status Koneksi OAuth</span>

                                @if ($connected)
                                    <span class="app-badge app-badge-success">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Terhubung
                                    </span>
                                @else
                                    <span class="app-badge app-badge-danger">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Belum Terhubung
                                    </span>
                                @endif
                            </div>

                            <div class="app-info-banner mb-4">
                                <i class="bi bi-info-circle-fill"></i>
                                <div>
                                    Akun Google yang terhubung digunakan oleh sistem untuk mengunggah dokumen pelatihan ke Google Drive.
                                    Apabila koneksi Google sedang terganggu, dokumen tetap tersimpan aman pada penyimpanan lokal server.
                                </div>
                            </div>

                            @if (!$connected)
                                <a href="{{ route('admin.google-drive.connect') }}" class="app-btn app-btn-primary">
                                    <i class="bi bi-google"></i>
                                    Hubungkan Akun Google
                                </a>
                            @else
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                    <span class="text-secondary" style="font-size: 13px;">
                                        <i class="bi bi-shield-check me-1" style="color: #256041;"></i>
                                        Akun Google Bapelkes telah aktif dan siap digunakan.
                                    </span>

                                    <a href="{{ route('admin.google-drive.connect') }}" class="app-btn app-btn-outline app-btn-sm">
                                        <i class="bi bi-arrow-repeat"></i>
                                        Hubungkan Ulang Akun
                                    </a>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>

                <div class="col-12 col-xl-5">
                    <section class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box berry">
                                    <i class="bi bi-folder2-open"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">Folder Penyimpanan</h5>
                                    <p class="app-card-subtitle">Folder tujuan di Google Drive untuk seluruh dokumen kegiatan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="folder-box">
                                @if ($folderId)
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="app-icon-box berry">
                                            <i class="bi bi-folder-fill"></i>
                                        </span>
                                        <div class="min-w-0 flex-grow-1">
                                            <div class="fw-semibold" style="color: var(--purple-dark);">Folder Tujuan Aktif</div>
                                            <div class="text-secondary text-break" style="font-size: 12px;">
                                                ID: {{ $folderId }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-2">
                                        <i class="bi bi-folder-x fs-2 text-secondary"></i>
                                        <div class="fw-semibold mt-2" style="color: var(--purple-dark);">Belum Ada Folder Dipilih</div>
                                        <div class="text-secondary mt-1" style="font-size: 12.5px;">
                                            Pilih folder Google Drive sebagai tujuan arsip dokumen.
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <button
                                type="button"
                                id="selectFolderButton"
                                class="app-btn app-btn-primary w-100"
                                {{ !$connected ? 'disabled' : '' }}
                            >
                                <i class="bi bi-folder-plus"></i>
                                {{ $folderId ? 'Ganti Folder Google Drive' : 'Pilih Folder Google Drive' }}
                            </button>

                            @if (!$connected)
                                <small class="app-field-hint">
                                    Hubungkan akun Google terlebih dahulu sebelum memilih folder penyimpanan.
                                </small>
                            @endif
                        </div>
                    </section>
                </div>
            </div>

            <section class="app-card mt-4 mb-0">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box blue">
                            <i class="bi bi-list-check"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Panduan Pengaturan Integrasi</h5>
                            <p class="app-card-subtitle">Tahapan konfigurasi penyimpanan Google Drive Bapelkes.</p>
                        </div>
                    </div>
                </div>

                <div class="app-card-body">
                    <div class="step-item">
                        <span class="step-number">1</span>
                        <div>
                            <div class="fw-semibold">Hubungkan akun Google resmi Bapelkes</div>
                            <div class="text-secondary" style="font-size: 13px;">
                                Masuk menggunakan akun Gmail resmi Bapelkes dan berikan persetujuan akses Drive kepada aplikasi.
                            </div>
                        </div>
                    </div>

                    <div class="step-item">
                        <span class="step-number">2</span>
                        <div>
                            <div class="fw-semibold">Tentukan folder penyimpanan tujuan</div>
                            <div class="text-secondary" style="font-size: 13px;">
                                Klik tombol Pilih Folder Google Drive untuk menentukan direktori pengarsipan dokumen pelatihan.
                            </div>
                        </div>
                    </div>

                    <div class="step-item">
                        <span class="step-number">3</span>
                        <div>
                            <div class="fw-semibold">Sinkronisasi dokumen otomatis aktif</div>
                            <div class="text-secondary" style="font-size: 13px;">
                                Setiap dokumen persyaratan dan laporan yang diunggah melalui sistem akan tersimpan otomatis ke folder yang dipilih.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://apis.google.com/js/api.js"></script>

    <script>
        const pickerApiKey = @json(config('services.google_drive.picker_api_key'));
        const projectNumber = @json($projectNumber);
        const tokenUrl = @json(route('admin.google-drive.access-token'));
        const saveFolderUrl = @json(route('admin.google-drive.save-folder'));
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const feedbackBox = document.getElementById('driveFeedback');

        let pickerLoaded = false;

        function showFeedback(type, message) {
            if (!feedbackBox) {
                return;
            }
            const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill';
            const cls = type === 'success' ? 'app-alert-success' : 'app-alert-danger';
            feedbackBox.className = 'alert app-alert ' + cls + ' alert-dismissible fade show';
            feedbackBox.innerHTML =
                '<i class="bi ' + icon + ' mt-1"></i>' +
                '<div>' + String(message).replace(/</g, '&lt;').replace(/>/g, '&gt;') + '</div>' +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>';
            feedbackBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function loadPicker() {
            if (pickerLoaded) {
                openPicker();
                return;
            }

            gapi.load('picker', {
                callback: function () {
                    pickerLoaded = true;
                    openPicker();
                }
            });
        }

        async function openPicker() {
            try {
                const response = await fetch(tokenUrl, {
                    headers: {
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                const tokenData = await response.json();

                if (!response.ok || !tokenData.access_token) {
                    throw new Error(tokenData.message || 'Gagal mengambil akses Google Drive.');
                }

                const folderView = new google.picker.DocsView(
                    google.picker.ViewId.FOLDERS
                );

                folderView.setSelectFolderEnabled(true);
                folderView.setIncludeFolders(true);

                const picker = new google.picker.PickerBuilder()
                    .setAppId(String(projectNumber))
                    .setDeveloperKey(pickerApiKey)
                    .setOAuthToken(tokenData.access_token)
                    .addView(folderView)
                    .setTitle('Pilih Folder Penyimpanan Bapelkes')
                    .setCallback(pickerCallback)
                    .build();

                picker.setVisible(true);
            } catch (error) {
                showFeedback('danger', error.message);
            }
        }

        async function pickerCallback(data) {
            if (data.action !== google.picker.Action.PICKED) {
                return;
            }

            const folder = data.docs[0];

            if (!folder || !folder.id) {
                showFeedback('danger', 'Folder tidak ditemukan.');
                return;
            }

            try {
                const response = await fetch(saveFolderUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        folder_id: folder.id
                    })
                });

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(result.message || 'Gagal menyimpan folder.');
                }

                showFeedback('success', result.message);
                window.setTimeout(function () {
                    window.location.reload();
                }, 900);
            } catch (error) {
                showFeedback('danger', error.message);
            }
        }

        const selectFolderButton = document.getElementById('selectFolderButton');
        if (selectFolderButton) {
            selectFolderButton.addEventListener('click', function () {
                loadPicker();
            });
        }
    </script>

</body>
</html>
