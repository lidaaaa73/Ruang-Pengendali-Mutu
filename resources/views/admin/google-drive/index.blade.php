<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaturan Google Drive | Ruang Pengendalian Mutu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --green-primary: #245C4A;
            --green-secondary: #397D65;
            --green-light: #DDECE3;
            --green-background: #F3F7F4;
            --green-border: #D6E3DA;
            --text-primary: #24352D;
            --text-secondary: #64756B;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--green-background);
            color: var(--text-primary);
            min-height: 100vh;
            margin: 0;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            background: #fff;
            padding: 17px 30px;
            border-bottom: 1px solid var(--green-border);
        }

        .role-badge {
            background: var(--green-light);
            color: var(--green-primary);
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .section-card {
            background: #fff;
            border: 1px solid var(--green-border);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(36, 92, 74, 0.04);
        }

        .section-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--green-light);
            color: var(--green-primary);
            border-radius: 14px;
            font-size: 25px;
            flex-shrink: 0;
        }

        .section-title {
            color: var(--green-primary);
        }

        .text-muted-custom {
            color: var(--text-secondary);
        }

        .status-connected {
            background: #E2F3E8;
            color: #247347;
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-disconnected {
            background: #FCE8E6;
            color: #B42318;
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-green {
            background: var(--green-primary);
            color: #fff;
            border: 1px solid var(--green-primary);
            border-radius: 9px;
            padding: 11px 18px;
            font-weight: 500;
        }

        .btn-green:hover {
            background: var(--green-secondary);
            color: #fff;
        }

        .btn-outline-green {
            background: #fff;
            color: var(--green-primary);
            border: 1px solid var(--green-primary);
            border-radius: 9px;
            padding: 11px 18px;
            font-weight: 500;
        }

        .btn-outline-green:hover {
            background: var(--green-light);
            color: var(--green-primary);
        }

        .info-box {
            background: var(--green-background);
            border: 1px solid var(--green-border);
            border-radius: 12px;
        }

        .folder-box {
            background: #fff;
            border: 1px dashed var(--green-secondary);
            border-radius: 12px;
            padding: 20px;
        }

        .step-number {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--green-light);
            color: var(--green-primary);
            border-radius: 50%;
            font-weight: 600;
            flex-shrink: 0;
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

@include('layouts.sidebar', [
    'active' => 'google-drive',
    'pendingUsersCount' => 0
])

<div class="main-content">

    <header class="topbar d-flex justify-content-between align-items-center gap-3">
        <div>
            <div class="fw-semibold">Pengaturan Google Drive</div>
            <small class="text-muted-custom">Integrasi penyimpanan dokumen Bapelkes</small>
        </div>

        <span class="role-badge">
            {{ auth()->user()->role?->name ?? 'Admin' }}
        </span>
    </header>

    <main class="container-fluid p-4 p-lg-5">

        <div class="mb-4">
            <h4 class="fw-bold section-title mb-2">Integrasi Google Drive</h4>
            <p class="text-muted-custom mb-0">
                Hubungkan akun Google Bapelkes untuk menyimpan dokumen kegiatan pelatihan secara langsung.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">

            <div class="col-12 col-xl-7">
                <div class="section-card p-4 h-100">

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="section-icon">
                            <i class="bi bi-google"></i>
                        </div>

                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">Koneksi Akun Google</h5>
                            <p class="text-muted-custom small mb-0">
                                Hubungkan akun Google yang digunakan untuk penyimpanan dokumen.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <span class="fw-semibold">Status koneksi</span>

                        @if ($connected)
                            <span class="status-connected">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                Terhubung
                            </span>
                        @else
                            <span class="status-disconnected">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                Belum terhubung
                            </span>
                        @endif
                    </div>

                    <div class="info-box p-3 mb-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-info-circle-fill text-success mt-1"></i>
                            <div class="small text-muted-custom">
                                Akun Google yang dihubungkan akan digunakan oleh sistem untuk mengunggah dokumen kegiatan ke Google Drive.
                            </div>
                        </div>
                    </div>

                    @if (!$connected)
                        <a href="{{ route('admin.google-drive.connect') }}"
                           class="btn btn-green">
                            <i class="bi bi-google me-2"></i>
                            Hubungkan Akun Google
                        </a>
                    @else
                        <div class="alert alert-success mb-0">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            Akun Google sudah berhasil dihubungkan.
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-12 col-xl-5">
                <div class="section-card p-4 h-100">

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="section-icon">
                            <i class="bi bi-folder2-open"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1">Folder Penyimpanan</h5>
                            <p class="text-muted-custom small mb-0">
                                Tentukan folder tujuan dokumen.
                            </p>
                        </div>
                    </div>

                    <div class="folder-box mb-3">
                        @if ($folderId)
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-folder-fill fs-2 text-warning"></i>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="fw-semibold">Folder sudah dipilih</div>
                                    <small class="text-muted-custom text-break">
                                        ID: {{ $folderId }}
                                    </small>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-3">
                                <i class="bi bi-folder-x fs-1 text-muted"></i>
                                <p class="fw-semibold mt-2 mb-1">Belum Ada Folder</p>
                                <small class="text-muted-custom">
                                    Pilih folder Google Drive untuk penyimpanan dokumen.
                                </small>
                            </div>
                        @endif
                    </div>

                    <button
                        type="button"
                        id="selectFolderButton"
                        class="btn btn-outline-green w-100"
                        {{ !$connected ? 'disabled' : '' }}
                    >
                        <i class="bi bi-folder-plus me-2"></i>
                        Pilih Folder Google Drive
                    </button>

                    @if (!$connected)
                        <small class="text-muted-custom d-block mt-2">
                            Hubungkan akun Google terlebih dahulu untuk memilih folder.
                        </small>
                    @endif

                </div>
            </div>

        </div>

        <div class="section-card p-4 mt-4">

            <h5 class="fw-bold section-title mb-4">
                <i class="bi bi-list-check me-2"></i>
                Panduan Pengaturan
            </h5>

            <div class="d-flex gap-3 mb-4">
                <div class="step-number">1</div>
                <div>
                    <div class="fw-semibold">Hubungkan akun Google</div>
                    <small class="text-muted-custom">
                        Login menggunakan akun Gmail Bapelkes dan berikan izin akses kepada aplikasi.
                    </small>
                </div>
            </div>

            <div class="d-flex gap-3 mb-4">
                <div class="step-number">2</div>
                <div>
                    <div class="fw-semibold">Pilih folder penyimpanan</div>
                    <small class="text-muted-custom">
                        Pilih folder Google Drive yang akan digunakan untuk menyimpan dokumen pelatihan.
                    </small>
                </div>
            </div>

            <div class="d-flex gap-3">
                <div class="step-number">3</div>
                <div>
                    <div class="fw-semibold">Gunakan integrasi Google Drive</div>
                    <small class="text-muted-custom">
                        Dokumen yang diunggah melalui sistem akan disimpan ke folder Google Drive yang sudah dipilih.
                    </small>
                </div>
            </div>

        </div>

        <div class="text-center mt-5 text-muted-custom small">
            Sistem Informasi Internal Bapelkes
        </div>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://apis.google.com/js/api.js"></script>

<script>
    const pickerApiKey = @json(config('services.google_drive.picker_api_key'));
    const projectNumber = @json($projectNumber);
    const tokenUrl = @json(route('admin.google-drive.access-token'));
    const saveFolderUrl = @json(route('admin.google-drive.save-folder'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let pickerLoaded = false;

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
            alert(error.message);
        }
    }

    async function pickerCallback(data) {
        if (data.action !== google.picker.Action.PICKED) {
            return;
        }

        const folder = data.docs[0];

        if (!folder || !folder.id) {
            alert('Folder tidak ditemukan.');
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

            alert(result.message);
            window.location.reload();

        } catch (error) {
            alert(error.message);
        }
    }

    document.getElementById('selectFolderButton').addEventListener('click', function () {
        loadPicker();
    });
</script>

</body>
</html>
