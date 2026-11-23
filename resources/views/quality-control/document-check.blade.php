<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrean Pemeriksaan Dokumen | Ruang Pengendalian Mutu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            margin-left: 260px;
            min-height: 100vh;
            padding: 34px 36px 45px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-title {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .summary-card {
            position: relative;
            isolation: isolate;
            display: flex;
            align-items: center;
            gap: 20px;
            min-height: 145px;
            padding: 24px;
            overflow: hidden;
            border: 1px solid #E7BBD0;
            border-left: 5px solid var(--berry);
            border-radius: 17px;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(120deg, #F9DCE9 0%, #E9B5CF 60%, #DFA1C0 100%);
            box-shadow: 0 5px 18px rgba(82, 63, 119, .06);
        }

        .summary-card::after {
            position: absolute;
            z-index: -1;
            top: -55px;
            right: -25px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255,255,255,.2);
            content: "";
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 59px;
            min-width: 59px;
            height: 59px;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 15px;
            background: rgba(255,255,255,.75);
            color: var(--berry);
            font-size: 27px;
        }

        .summary-label {
            margin-bottom: 5px;
            color: #75405F;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-value {
            color: #52334A;
            font-size: 34px;
            font-weight: 700;
            line-height: 1.3;
        }

        .summary-note {
            margin-top: 4px;
            color: #75546B;
            font-size: 12px;
        }

        .information-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 19px 21px;
            border: 1px solid #D9CBEA;
            border-radius: 13px;
            background: linear-gradient(120deg, #F1EAF8 0%, #E7DDF3 100%);
            color: var(--purple-dark);
        }

        .information-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            min-width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255,255,255,.75);
            color: var(--purple-medium);
            font-size: 20px;
        }

        .information-title {
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 700;
        }

        .information-description {
            margin: 0;
            color: #71627F;
            font-size: 13px;
            line-height: 1.8;
        }

        .content-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: var(--surface);
            box-shadow: 0 5px 20px rgba(82, 63, 119, .045);
        }

        .content-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 23px 25px;
            border-bottom: 1px solid var(--border);
        }

        .content-title {
            margin-bottom: 5px;
            color: var(--purple-dark);
            font-size: 17px;
            font-weight: 700;
        }

        .content-subtitle {
            margin: 0;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .count-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 30px;
            background: #FCEBF1;
            color: #963F66;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            min-width: 900px;
            margin-bottom: 0;
            font-size: 13px;
        }

        .table thead th {
            padding: 17px 16px;
            border-bottom: 1px solid var(--border);
            background: #F7F2FA;
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 19px 16px;
            border-color: #F0EBF3;
            color: #51445D;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background .2s ease;
        }

        .table-hover tbody tr:hover {
            background: #FCF9FD;
        }

        .number-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #F2EDF7;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 700;
        }

        .training-name {
            max-width: 280px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
            line-height: 1.7;
        }

        .document-name {
            max-width: 230px;
            overflow-wrap: anywhere;
            color: var(--text-primary);
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        .document-type {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border: 1px solid #DCD0EA;
            border-radius: 8px;
            background: #F5F0FA;
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .pending-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border: 1px solid #F1DCA8;
            border-radius: 30px;
            background: #FFF5DB;
            color: #91650D;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-review {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 15px;
            border: 1px solid var(--purple-dark);
            border-radius: 9px;
            background: linear-gradient(120deg, #67538A, #523F77);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: all .2s ease;
        }

        .btn-review:hover {
            border-color: var(--berry);
            background: linear-gradient(120deg, #B35A8A, #923D70);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 13px rgba(179, 90, 138, .16);
        }

        .empty-state {
            padding: 65px 20px;
            text-align: center;
        }

        .empty-state-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 78px;
            height: 78px;
            margin: 0 auto 18px;
            border-radius: 21px;
            background: linear-gradient(135deg, #F1E9F8, #E5D9F1);
            color: var(--purple-medium);
            font-size: 34px;
        }

        .empty-state-title {
            margin-bottom: 8px;
            color: var(--purple-dark);
            font-size: 18px;
            font-weight: 700;
        }

        .empty-state-description {
            max-width: 520px;
            margin: 0 auto;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .alert {
            border-radius: 12px;
            font-size: 14px;
        }

        .footer-text {
            padding-top: 30px;
            color: var(--text-secondary);
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .main-content {
                padding: 28px 22px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
                padding: 22px 15px 30px;
            }

            .page-header {
                flex-direction: column;
            }

            .page-title {
                font-size: 23px;
            }

            .summary-card {
                min-height: 125px;
                padding: 19px;
            }

            .content-card-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 19px;
            }

            .information-card {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'document-check',
        'pendingUsersCount' => auth()->user()->role?->slug === 'admin'
            ? \App\Models\User::where('account_status', 'pending')->count()
            : 0
    ])

    <main class="main-content">

        <div class="page-header">
            <div>
                <h1 class="page-title">Antrean Pemeriksaan Dokumen</h1>
                <p class="page-description">
                    Daftar dokumen kegiatan pelatihan yang menunggu pemeriksaan Dalmut.
                </p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                    <div>
                        <div class="summary-label">Dokumen Menunggu Pemeriksaan</div>
                        <div class="summary-value">{{ $pendingDocuments->count() }}</div>
                        <div class="summary-note">
                            Total dokumen yang belum diperiksa Dalmut.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="information-card h-100">
                    <div class="information-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>

                    <div>
                        <div class="information-title">Informasi Pemeriksaan</div>
                        <p class="information-description">
                            Pilih dokumen untuk membuka halaman dokumen kegiatan.
                            Pemeriksaan, verifikasi, dan permintaan revisi tetap dilakukan
                            melalui halaman tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-card">

            <div class="content-card-header">
                <div>
                    <h5 class="content-title">Daftar Antrean Dokumen</h5>
                    <p class="content-subtitle">
                        Dokumen yang membutuhkan pemeriksaan dan keputusan Dalmut.
                    </p>
                </div>

                <span class="count-badge">
                    <i class="bi bi-file-earmark-text"></i>
                    {{ $pendingDocuments->count() }} dokumen
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kegiatan</th>
                            <th>Jenis Dokumen</th>
                            <th>Nama File</th>
                            <th>Tanggal Unggah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pendingDocuments as $document)

                            @php
                                $documentTypes = [
                                    'kak' => 'KAK',
                                    'sk' => 'SK Penyelenggaraan',
                                    'jadwal' => 'Jadwal Pelatihan',
                                    'laporan_penyelenggara' => 'Laporan Penyelenggara',
                                    'evaluasi_penyelenggaraan' => 'Evaluasi Penyelenggaraan',
                                ];
                            @endphp

                            <tr>
                                <td>
                                    <span class="number-badge">{{ $loop->iteration }}</span>
                                </td>

                                <td>
                                    <div class="training-name">
                                        {{ $document->training?->training_name ?? 'Kegiatan tidak ditemukan' }}
                                    </div>
                                </td>

                                <td>
                                    <span class="document-type">
                                        {{ $documentTypes[$document->document_type] ?? str_replace('_', ' ', ucfirst($document->document_type)) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="document-name">
                                        <i class="bi bi-file-earmark-text me-1"></i>
                                        {{ $document->original_name }}
                                    </div>
                                </td>

                                <td>
                                    {{ $document->created_at?->format('d/m/Y H:i') ?? '-' }}
                                </td>

                                <td>
                                    <span class="pending-badge">
                                        <i class="bi bi-clock-history"></i>
                                        Menunggu Pemeriksaan
                                    </span>
                                </td>

                                <td>
                                    @if ($document->training)
                                        <a
                                            href="{{ route('trainings.documents.index', $document->training) }}"
                                            class="btn-review"
                                        >
                                            <i class="bi bi-folder2-open"></i>
                                            Buka Dokumen
                                        </a>
                                    @else
                                        <span class="text-secondary">Kegiatan tidak tersedia</span>
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="bi bi-check2-circle"></i>
                                        </div>

                                        <h5 class="empty-state-title">
                                            Tidak Ada Dokumen Menunggu Pemeriksaan
                                        </h5>

                                        <p class="empty-state-description">
                                            Semua dokumen yang masuk sudah diperiksa atau
                                            belum ada dokumen baru yang perlu diperiksa.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

        <footer class="footer-text">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
            <span class="mx-1">·</span>
            Sistem Informasi Internal
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
