<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Akun | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .applicant-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 210px;
        }

        .applicant-avatar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border: 1px solid #DFD5EB;
            border-radius: 10px;
            background: var(--surface-tint);
            color: var(--purple-dark);
            font-size: 13.5px;
            font-weight: 700;
        }

        .applicant-name {
            color: var(--text-primary);
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.4;
        }

        .applicant-email {
            color: var(--text-secondary);
            font-size: 12px;
        }

        .role-select {
            min-width: 155px;
            min-height: 36px;
            padding: 5px 28px 5px 10px;
            font-size: 13px;
        }

        .action-row {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
    </style>
</head>

<body>

    @php
        $assignableRoles = \App\Models\Role::whereIn('slug', ['penglat', 'dalmut'])
            ->orderBy('name')
            ->get();
    @endphp

    @include('layouts.sidebar', [
        'active' => 'users',
        'pendingUsersCount' => $users->total()
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Persetujuan Akun']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-person-check"></i>
                        Administrasi Pengguna
                    </div>
                    <h1 class="app-page-title">Persetujuan Akun Pengguna</h1>
                    <p class="app-page-subtitle">
                        Periksa pengajuan pendaftaran pengguna internal dan tetapkan peran sebelum memberikan akses ke sistem.
                    </p>
                </div>

                <span class="app-badge app-badge-neutral">
                    <i class="bi bi-clock-history"></i>
                    {{ $users->total() }} Menunggu Persetujuan
                </span>
            </div>

            @if (session('status'))
                <div class="alert app-alert app-alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill mt-1"></i>
                    <div>{{ session('status') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert app-alert app-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>
                        <strong>Terjadi kesalahan saat memproses permintaan.</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <section class="app-card">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box berry">
                            <i class="bi bi-people"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Daftar Pendaftaran Menunggu Verifikasi</h5>
                            <p class="app-card-subtitle">Pilih peran Penglat atau Dalmut sebelum menyetujui akun.</p>
                        </div>
                    </div>
                </div>

                <div class="app-card-body">
                    @if ($users->count() > 0)
                        <div class="app-table-wrap">
                            <table class="table app-table" style="min-width: 820px;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama &amp; Email</th>
                                        <th>Bagian / Unit</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tetapkan Peran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>
                                                <span class="app-row-number">{{ $users->firstItem() + $index }}</span>
                                            </td>

                                            <td>
                                                <div class="applicant-info">
                                                    <span class="applicant-avatar">
                                                        {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <div class="applicant-name">{{ $user->name }}</div>
                                                        <div class="applicant-email">{{ $user->email }}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-secondary">
                                                {{ $user->department ?: '-' }}
                                            </td>

                                            <td class="text-nowrap">
                                                {{ $user->created_at->format('d/m/Y') }}
                                            </td>

                                            <td>
                                                <form
                                                    id="approve-form-{{ $user->id }}"
                                                    action="{{ route('admin.users.approve', $user) }}"
                                                    method="POST"
                                                >
                                                    @csrf

                                                    <select
                                                        name="role_id"
                                                        class="form-select role-select"
                                                        aria-label="Pilih peran untuk {{ $user->name }}"
                                                        required
                                                    >
                                                        <option value="">Pilih peran</option>
                                                        @foreach ($assignableRoles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>

                                            <td>
                                                <div class="action-row">
                                                    <button
                                                        type="submit"
                                                        form="approve-form-{{ $user->id }}"
                                                        class="app-btn app-btn-primary app-btn-sm"
                                                    >
                                                        <i class="bi bi-check-lg"></i>
                                                        Setujui
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="app-btn app-btn-soft-danger app-btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#rejectUserModal"
                                                        data-reject-url="{{ route('admin.users.reject', $user) }}"
                                                        data-user-name="{{ $user->name }}"
                                                        data-user-email="{{ $user->email }}"
                                                    >
                                                        <i class="bi bi-x-lg"></i>
                                                        Tolak
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($users->hasPages())
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">
                                <span class="text-secondary" style="font-size: 12.5px;">
                                    Menampilkan {{ $users->firstItem() }}–{{ $users->lastItem() }} dari {{ $users->total() }} pendaftar
                                </span>
                                {{ $users->links() }}
                            </div>
                        @endif
                    @else
                        <div class="app-empty-state">
                            <div class="app-empty-icon">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                            <h6>Tidak Ada Pendaftaran Menunggu</h6>
                            <p>
                                Seluruh pengajuan akun telah diproses. Pendaftaran pengguna baru akan tampil otomatis di halaman ini.
                            </p>
                        </div>
                    @endif
                </div>
            </section>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <div class="modal fade" id="rejectUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-x me-2" style="color: var(--berry);"></i>
                        Konfirmasi Penolakan Akun
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <p class="text-secondary mb-3">
                        Apakah Anda yakin ingin menolak pendaftaran akun berikut?
                    </p>

                    <div class="modal-highlight-box mb-3">
                        <div id="rejectUserName"></div>
                        <div class="text-secondary fw-normal mt-1" style="font-size: 12.5px;" id="rejectUserEmail"></div>
                    </div>

                    <p class="text-secondary mb-0" style="font-size: 12.5px;">
                        Pengguna yang ditolak tidak akan dapat masuk ke dalam sistem.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="app-btn app-btn-outline" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <form id="rejectUserForm" method="POST">
                        @csrf
                        <button type="submit" class="app-btn app-btn-danger">
                            <i class="bi bi-x-lg"></i>
                            Ya, Tolak Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function () {
            const rejectModal = document.getElementById('rejectUserModal');
            if (!rejectModal) {
                return;
            }

            rejectModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                document.getElementById('rejectUserForm').action = trigger.getAttribute('data-reject-url');
                document.getElementById('rejectUserName').textContent = trigger.getAttribute('data-user-name');
                document.getElementById('rejectUserEmail').textContent = trigger.getAttribute('data-user-email');
            });
        })();
    </script>
</body>
</html>
