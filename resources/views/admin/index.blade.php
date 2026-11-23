<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Akun | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple-deep: #523F77;
            --purple-medium: #67538A;
            --berry: #B35A8A;
            --pink: #F6B7C7;
            --lavender: #B6A5CE;
            --periwinkle: #7880AE;
            --powder-blue: #A3BBD7;
            --page-bg: #F8F6FA;
            --surface: #FFFFFF;
            --border: #E9E3EF;
            --text-primary: #352D40;
            --text-secondary: #71697B;
            --soft-purple: #F0EBF7;
            --soft-pink: #FBEAF1;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 90% 5%, rgba(182, 165, 206, 0.13), transparent 25%),
                var(--page-bg);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 22px 34px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--border);
        }

        .topbar h2 {
            margin: 0 0 5px;
            color: var(--purple-deep);
            font-size: 23px;
            font-weight: 700;
        }

        .topbar p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 12px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            background: linear-gradient(135deg, #F0EBF7, #FBEAF1);
            border: 1px solid var(--border);
            border-radius: 30px;
            color: var(--purple-deep);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .role-badge i {
            font-size: 15px;
            color: var(--berry);
        }

        .page-content {
            padding: 30px 34px;
        }

        .page-intro {
            margin-bottom: 25px;
        }

        .breadcrumb-text {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 14px;
            color: var(--text-secondary);
            font-size: 11px;
        }

        .breadcrumb-text i {
            font-size: 10px;
            color: var(--lavender);
        }

        .breadcrumb-text span:last-child {
            color: var(--purple-medium);
            font-weight: 600;
        }

        .page-title {
            margin: 0 0 7px;
            color: var(--text-primary);
            font-size: 21px;
            font-weight: 700;
        }

        .page-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.7;
        }

        .content-card {
            overflow: hidden;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 8px 28px rgba(82, 63, 119, 0.055);
        }

        .card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 22px 25px;
            background: linear-gradient(110deg, #FFFFFF 0%, #FBF8FD 65%, #FCF4F8 100%);
            border-bottom: 1px solid var(--border);
        }

        .heading-content {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .heading-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--purple-medium), var(--berry));
            border-radius: 13px;
            color: #FFFFFF;
            font-size: 20px;
            box-shadow: 0 5px 13px rgba(103, 83, 138, 0.18);
        }

        .card-heading h5 {
            margin: 0 0 5px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 11px;
        }

        .pending-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            background: var(--soft-purple);
            border: 1px solid #E4D9F0;
            border-radius: 30px;
            color: var(--purple-medium);
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .pending-badge i {
            color: var(--berry);
        }

        .table-responsive {
            padding: 12px 20px 20px;
        }

        .table {
            min-width: 850px;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            padding: 16px 13px;
            background: #F7F4FA;
            border-bottom: 1px solid var(--border);
            color: var(--purple-medium);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.2px;
            white-space: nowrap;
        }

        .table thead th:first-child {
            border-radius: 9px 0 0 9px;
        }

        .table thead th:last-child {
            border-radius: 0 9px 9px 0;
        }

        .table tbody td {
            padding: 17px 13px;
            border-bottom: 1px solid #F0ECF4;
            color: var(--text-primary);
            font-size: 12px;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr {
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: #FCFAFD;
        }

        .number-cell {
            color: var(--text-secondary) !important;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 210px;
        }

        .user-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #EAE3F4, #F9E2EC);
            border: 1px solid #E9DFF0;
            border-radius: 12px;
            color: var(--purple-medium);
            font-size: 17px;
        }

        .user-name {
            margin-bottom: 5px;
            color: var(--text-primary);
            font-size: 12px;
            font-weight: 700;
        }

        .user-email {
            color: var(--text-secondary);
            font-size: 11px;
        }

        .department-text {
            color: var(--text-secondary);
            font-weight: 500;
        }

        .date-text {
            color: var(--text-primary);
            font-weight: 500;
            white-space: nowrap;
        }

        .role-select {
            min-width: 145px;
            padding: 9px 30px 9px 11px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background-color: #FFFFFF;
            color: var(--text-primary);
            font-size: 11px;
            font-family: 'Poppins', sans-serif;
        }

        .role-select:focus {
            border-color: var(--lavender);
            box-shadow: 0 0 0 3px rgba(182, 165, 206, 0.2);
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-approve {
            background: linear-gradient(135deg, var(--purple-medium), var(--berry));
            border: 1px solid transparent;
            color: #FFFFFF;
        }

        .btn-approve:hover {
            background: linear-gradient(135deg, var(--purple-deep), var(--berry));
            border-color: transparent;
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(179, 90, 138, 0.2);
        }

        .btn-reject {
            background: #FFFFFF;
            border: 1px solid #EBCBD9;
            color: #B34E78;
        }

        .btn-reject:hover {
            background: #FBEAF1;
            border-color: #E4B4C9;
            color: #963D65;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 12px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 76px;
            height: 76px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #F0EBF7, #FBEAF1);
            border: 1px solid #E9DFF0;
            border-radius: 50%;
            color: var(--purple-medium);
            font-size: 31px;
            box-shadow: 0 6px 18px rgba(103, 83, 138, 0.08);
        }

        .empty-state h5 {
            margin-bottom: 9px;
            color: var(--text-primary);
            font-size: 16px;
            font-weight: 700;
        }

        .empty-state p {
            max-width: 400px;
            margin: 0 auto;
            color: var(--text-secondary);
            font-size: 12px;
            line-height: 1.8;
        }

        .alert-success {
            background: #F2EDF8;
            border: 1px solid #DED2EB;
            border-radius: 11px;
            color: var(--purple-deep);
            font-size: 12px;
        }

        .alert-danger {
            border-radius: 11px;
            font-size: 12px;
        }

        .alert-danger ul {
            padding-left: 18px;
        }

        .pagination {
            margin-top: 20px;
            gap: 5px;
        }

        .page-link {
            min-width: 34px;
            border: 1px solid var(--border);
            border-radius: 8px !important;
            color: var(--purple-medium);
            font-size: 11px;
            text-align: center;
        }

        .page-link:hover {
            background: var(--soft-purple);
            border-color: var(--lavender);
            color: var(--purple-deep);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--purple-medium), var(--berry));
            border-color: transparent;
            color: #FFFFFF;
        }

        .page-item.disabled .page-link {
            color: #B7AFBF;
        }

        @media (max-width: 991px) {
            .page-content {
                padding: 25px 22px;
            }

            .topbar {
                padding: 20px 22px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
            }

            .topbar {
                align-items: flex-start;
                padding: 17px 18px;
            }

            .topbar h2 {
                font-size: 19px;
            }

            .topbar p {
                max-width: 230px;
                font-size: 10px;
                line-height: 1.7;
            }

            .role-badge {
                padding: 7px 10px;
                font-size: 10px;
            }

            .page-content {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .card-heading {
                align-items: flex-start;
                padding: 18px 15px;
            }

            .card-heading p {
                max-width: 220px;
                line-height: 1.7;
            }

            .pending-badge {
                font-size: 9px;
                padding: 7px 9px;
            }

            .table-responsive {
                padding: 10px 12px 15px;
            }
        }

        @media (max-width: 420px) {
            .topbar {
                gap: 8px;
            }

            .role-badge {
                gap: 5px;
                font-size: 9px;
            }

            .heading-icon {
                width: 39px;
                height: 39px;
                font-size: 17px;
            }

            .card-heading h5 {
                font-size: 12px;
            }

            .card-heading p {
                font-size: 10px;
            }

            .empty-state {
                padding: 55px 15px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.sidebar', [
        'active' => 'users',
        'pendingUsersCount' => $users->total()
    ])

    <main class="main-content">
        <header class="topbar">
            <div>
                <h2>Persetujuan Akun</h2>
                <p>Kelola pendaftaran pengguna Ruang Pengendalian Mutu Bapelkes.</p>
            </div>

            <span class="role-badge">
                <i class="bi bi-shield-check"></i>
                {{ auth()->user()->role?->name ?? 'Administrator' }}
            </span>
        </header>

        <div class="page-content">
            <div class="page-intro">
                <div class="breadcrumb-text">
                    <span>Dashboard</span>
                    <i class="bi bi-chevron-right"></i>
                    <span>Persetujuan Akun</span>
                </div>

                <h4 class="page-title">Manajemen Persetujuan Akun</h4>
                <p class="page-description">
                    Periksa pendaftaran pengguna dan tentukan peran sebelum memberikan akses ke sistem.
                </p>
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <div>
                            <strong>Terjadi kesalahan.</strong>
                            <ul class="mb-0 mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <section class="content-card">
                <div class="card-heading">
                    <div class="heading-content">
                        <div class="heading-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <div>
                            <h5>Daftar Pendaftaran Pengguna</h5>
                            <p>Kelola akun pengguna yang menunggu persetujuan admin.</p>
                        </div>
                    </div>

                    <span class="pending-badge">
                        <i class="bi bi-clock-history"></i>
                        {{ $users->total() }} Pendaftar
                    </span>
                </div>

                @if ($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama dan Email</th>
                                    <th>Bagian</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Peran Pengguna</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td class="number-cell">
                                            {{ $users->firstItem() + $index }}
                                        </td>

                                        <td>
                                            <div class="user-info">
                                                <div class="user-avatar">
                                                    <i class="bi bi-person"></i>
                                                </div>

                                                <div>
                                                    <div class="user-name">{{ $user->name }}</div>
                                                    <div class="user-email">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="department-text">
                                                {{ $user->department ?: '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="date-text">
                                                {{ $user->created_at->format('d/m/Y') }}
                                            </span>
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
                                                    class="form-select form-select-sm role-select"
                                                    required
                                                >
                                                    <option value="">Pilih peran</option>

                                                    @foreach (\App\Models\Role::whereIn('slug', ['penglat', 'dalmut'])->orderBy('name')->get() as $role)
                                                        <option value="{{ $role->id }}">
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>

                                        <td>
                                            <div class="action-buttons">
                                                <button
                                                    type="submit"
                                                    form="approve-form-{{ $user->id }}"
                                                    class="btn btn-action btn-approve"
                                                >
                                                    <i class="bi bi-check-lg"></i>
                                                    Setujui
                                                </button>

                                                <form
                                                    action="{{ route('admin.users.reject', $user) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menolak pendaftaran akun ini?')"
                                                >
                                                    @csrf

                                                    <button type="submit" class="btn btn-action btn-reject">
                                                        <i class="bi bi-x-lg"></i>
                                                        Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <h5>Tidak Ada Pendaftaran Baru</h5>
                        <p>
                            Belum ada akun yang menunggu persetujuan.
                            Pendaftaran baru akan muncul di halaman ini.
                        </p>
                    </div>
                @endif
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>