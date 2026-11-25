<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple-dark: #523F77;
            --purple-medium: #67538A;
            --berry: #B35A8A;
            --pink: #F6B7C7;
            --lavender: #B6A5CE;
            --periwinkle: #7880AE;
            --powder-blue: #A3BBD7;
            --background: #F8F6FA;
            --surface: #FFFFFF;
            --border: #E9E3EF;
            --text-primary: #352D40;
            --text-secondary: #71697B;
            --success: #49866A;
            --warning: #B17C36;
            --danger: #B65367;
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
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 82px;
            padding: 17px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .topbar-title {
            margin-bottom: 4px;
            color: var(--purple-dark);
            font-size: 20px;
            font-weight: 700;
        }

        .topbar-subtitle {
            color: var(--text-secondary);
            font-size: 14px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border-radius: 30px;
            background: #F3EEF8;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .dashboard-content {
            width: 100%;
            max-width: 1700px;
            margin: auto;
            padding: 32px 35px 45px;
        }

        .welcome-card {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            min-height: 225px;
            margin-bottom: 32px;
            padding: 35px 40px;
            border-radius: 19px;
            background: linear-gradient(115deg, #523F77 0%, #67538A 62%, #7880AE 100%);
            color: #fff;
            box-shadow: 0 8px 24px rgba(82, 63, 119, .13);
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 760px;
        }

        .welcome-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 16px;
            color: #F6DCE7;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .8px;
        }

        .welcome-card h1 {
            margin-bottom: 12px;
            color: #fff;
            font-size: clamp(25px, 3vw, 32px);
            font-weight: 700;
            line-height: 1.45;
        }

        .welcome-card p {
            max-width: 660px;
            margin-bottom: 20px;
            color: #F1EAF6;
            font-size: 15px;
            line-height: 1.9;
        }

        .welcome-role {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 15px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 30px;
            background: rgba(255,255,255,.13);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .welcome-decoration {
            position: absolute;
            right: 65px;
            bottom: -52px;
            color: white;
            font-size: 230px;
            opacity: .09;
            pointer-events: none;
        }

        .welcome-decoration-circle {
            position: absolute;
            right: -50px;
            top: -110px;
            width: 310px;
            height: 310px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 50%;
        }

        .welcome-decoration-circle::before {
            position: absolute;
            inset: 30px;
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
            content: "";
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 19px;
        }

        .section-title {
            margin: 0 0 6px;
            color: var(--purple-dark);
            font-size: 20px;
            font-weight: 700;
        }

        .section-description {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .section-icon {
            margin-right: 8px;
            color: var(--berry);
        }

        .stats-card {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 205px;
            padding: 25px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: var(--surface);
            box-shadow: 0 5px 16px rgba(82, 63, 119, 0.07);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .stats-card > * {
            position: relative;
            z-index: 1;
        }

        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(82, 63, 119, 0.13);
        }

        .stats-card.pink {
            color: #A84E7D;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 35%),
                linear-gradient(135deg, #F9DCE9 0%, #E9AFCB 55%, #DFA1C0 100%);
            border: 1px solid #E8B5CC;
            border-left: 5px solid #B35A8A;
        }

        .stats-card.lavender {
            color: #67538A;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 35%),
                linear-gradient(135deg, #E9DDF5 0%, #C9B5E1 55%, #B6A0D0 100%);
            border: 1px solid #CDBCE0;
            border-left: 5px solid #67538A;
        }

        .stats-card.blue {
            color: #557A9B;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 35%),
                linear-gradient(135deg, #E2ECF8 0%, #B7CEE8 55%, #9FB9DB 100%);
            border: 1px solid #BED1E4;
            border-left: 5px solid #7880AE;
        }

        .stats-card.rose {
            color: #A84E7D;
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 35%),
                linear-gradient(135deg, #F9DDEB 0%, #EDB5D0 55%, #E5A1C2 100%);
            border: 1px solid #E7BBD0;
            border-left: 5px solid #B35A8A;
        }

        .stats-card::after {
            position: absolute;
            z-index: 0;
            right: -30px;
            top: -45px;
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background: rgba(255,255,255,.28);
            content: "";
            pointer-events: none;
        }

        .stats-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .stats-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: rgba(255,255,255,.72);
            border: 1px solid rgba(255,255,255,.55);
            box-shadow: 0 3px 10px rgba(82,63,119,.05);
            color: inherit;
            font-size: 25px;
        }

        .stats-indicator {
            color: inherit;
            font-size: 18px;
            opacity: .8;
        }

        .stats-label {
            margin-top: 22px;
            margin-bottom: 5px;
            color: #51445D;
            font-size: 16px;
            font-weight: 600;
        }

        .stats-value {
            color: #352D40;
            font-size: 38px;
            font-weight: 700;
            line-height: 1.35;
        }

        .stats-note {
            margin-top: 5px;
            color: #5E5368;
            font-size: 14px;
            line-height: 1.6;
        }

        .content-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
            box-shadow: 0 4px 16px rgba(82, 63, 119, .04);
        }

        .content-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 21px 24px;
            border-bottom: 1px solid var(--border);
        }

        .content-card-body {
            padding: 20px 24px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 19px 0;
            border-bottom: 1px solid #F0EBF3;
        }

        .activity-item:last-child {
            border-bottom: 0;
        }

        .activity-date {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 62px;
            min-width: 62px;
            min-height: 68px;
            padding: 8px;
            border-radius: 12px;
            background: #F5EFF8;
            color: var(--purple-dark);
        }

        .activity-date strong {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.2;
        }

        .activity-date span {
            margin-top: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .activity-name {
            color: var(--text-primary);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .activity-detail {
            margin-top: 5px;
            color: var(--text-secondary);
            font-size: 13px;
            line-height: 1.7;
        }

        .activity-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 20px;
            background: #EAF3EE;
            color: #3C7656;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .empty-state {
            padding: 45px 20px;
            text-align: center;
        }

        .empty-state-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 68px;
            height: 68px;
            margin: 0 auto 17px;
            border-radius: 17px;
            background: #F3EEF8;
            color: var(--purple-medium);
            font-size: 29px;
        }

        .empty-state-title {
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 17px;
            font-weight: 700;
        }

        .empty-state-description {
            max-width: 480px;
            margin: auto;
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.8;
        }

        .dashboard-link {
            display: block;
            height: 100%;
            color: inherit;
            text-decoration: none;
        }

        .menu-card {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 205px;
            padding: 24px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .menu-card > * {
            position: relative;
            z-index: 1;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(82, 63, 119, .12);
        }

        .menu-card.pink {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(135deg, #F9DCE9 0%, #E9AFCB 100%);
            border: 1px solid #E8B5CC;
            border-left: 5px solid #B35A8A;
        }

        .menu-card.lavender {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(135deg, #E9DDF5 0%, #C9B5E1 100%);
            border: 1px solid #CDBCE0;
            border-left: 5px solid #67538A;
        }

        .menu-card.rose {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.65), transparent 38%),
                linear-gradient(135deg, #F9DDEB 0%, #EDB5D0 100%);
            border: 1px solid #E7BBD0;
            border-left: 5px solid #B35A8A;
        }

        .menu-card.blue {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(135deg, #E2ECF8 0%, #B7CEE8 100%);
            border: 1px solid #BED1E4;
            border-left: 5px solid #7880AE;
        }

        .menu-card.purple {
            background:
                radial-gradient(circle at 100% 0%, rgba(255,255,255,.7), transparent 38%),
                linear-gradient(135deg, #E6DDF1 0%, #B6A5CE 100%);
            border: 1px solid #CDBCE0;
            border-left: 5px solid #523F77;
        }

        .menu-card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 53px;
            height: 53px;
            border: 1px solid rgba(255,255,255,.65);
            border-radius: 14px;
            background: rgba(255,255,255,.72);
            box-shadow: 0 3px 10px rgba(82,63,119,.05);
            color: var(--purple-medium);
            font-size: 24px;
        }

        .menu-card-icon.pink {
            color: var(--berry);
        }

        .menu-card-icon.blue {
            color: var(--periwinkle);
        }

        .menu-card-icon.lavender {
            color: var(--purple-medium);
        }

        .menu-card-icon.powder {
            color: #557A9B;
        }

        .menu-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .menu-card-arrow {
            color: var(--purple-dark);
            font-size: 20px;
            transition: transform .2s ease;
            opacity: .75;
        }

        .menu-card:hover .menu-card-arrow {
            color: var(--berry);
            transform: translate(3px, -3px);
        }

        .menu-card h6 {
            margin-top: 19px;
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 17px;
            font-weight: 700;
        }

        .menu-card p {
            margin: 0;
            color: #51445D;
            font-size: 14px;
            line-height: 1.8;
        }

        .revision-card {
            overflow: hidden;
            border: 1px solid #EDD8E2;
            border-left: 5px solid var(--berry);
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 16px rgba(82, 63, 119, .04);
        }

        .revision-group-card {
            overflow: hidden;
            margin-bottom: 18px;
            border: 1px solid #EBD7E2;
            border-radius: 16px;
            background: var(--surface);
            box-shadow: 0 4px 16px rgba(82, 63, 119, .05);
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
            padding: 18px 22px;
            border-bottom: 1px solid #F0E6EE;
            background: linear-gradient(110deg, #FCF7FA, #F6F0FA);
        }

        .revision-group-title {
            margin: 0 0 4px;
            color: var(--purple-dark);
            font-size: 16px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .revision-group-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 16px;
            color: var(--text-secondary);
            font-size: 12px;
        }

        .revision-group-meta i {
            margin-right: 5px;
            color: var(--berry);
        }

        .revision-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .revision-table {
            width: 100%;
            min-width: 780px;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .revision-table thead th {
            padding: 13px 16px;
            background: #FAF6FC;
            border-bottom: 1px solid var(--border);
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .revision-table tbody td {
            padding: 15px 16px;
            border-bottom: 1px solid #F3EEF6;
            color: var(--text-primary);
            font-size: 13px;
            line-height: 1.7;
            vertical-align: middle;
        }

        .revision-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .revision-doc-type {
            color: var(--purple-dark);
            font-weight: 700;
        }

        .revision-doc-file {
            margin-top: 3px;
            color: var(--text-secondary);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .revision-note-preview {
            max-width: 310px;
            padding: 10px 12px;
            border: 1px solid #EECAD6;
            border-left: 3px solid var(--berry);
            border-radius: 9px;
            background: #FFF4F8;
            color: #7D334D;
            font-size: 12px;
            line-height: 1.65;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .revision-date-text {
            color: var(--text-secondary);
            font-size: 12px;
            white-space: nowrap;
        }

        .revision-refresh-bar {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .revision-sync-text {
            color: var(--text-secondary);
            font-size: 12px;
        }

        .btn-refresh-soft {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border: 1px solid #DCCEE8;
            border-radius: 9px;
            background: #FFFFFF;
            color: var(--purple-dark);
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-refresh-soft:hover {
            border-color: var(--purple-medium);
            background: #F4EFFA;
        }

        .revision-empty-box {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px 24px;
            border: 1px solid #CFE3D5;
            border-left: 5px solid var(--success);
            border-radius: 15px;
            background: #EFF7F2;
            color: #2E6446;
        }

        .revision-empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 13px;
            background: #FFFFFF;
            color: var(--success);
            font-size: 23px;
        }

        .revision-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 20px;
            background: #FCEBF1;
            color: #963F66;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-outline-berry {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 38px;
            padding: 8px 13px;
            border: 1px solid var(--berry);
            border-radius: 9px;
            background: linear-gradient(120deg, #B35A8A, #934272);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: all .2s ease;
        }

        .btn-outline-berry:hover {
            border-color: var(--purple-dark);
            background: linear-gradient(120deg, #523F77, #67538A);
            color: #FFFFFF;
        }

        .status-count {
            display: inline-flex;
            align-items: center;
            padding: 8px 13px;
            border-radius: 20px;
            background: #F3EEF8;
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .footer-text {
            padding-top: 35px;
            color: var(--text-secondary);
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .dashboard-content {
                padding: 27px 23px 35px;
            }

            .topbar {
                padding: 16px 23px;
            }

            .welcome-card {
                padding: 30px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 16px 18px;
            }

            .topbar-title {
                font-size: 18px;
            }

            .topbar-subtitle {
                font-size: 13px;
            }

            .dashboard-content {
                padding: 22px 15px 30px;
            }

            .welcome-card {
                min-height: auto;
                padding: 26px 22px;
                border-radius: 15px;
            }

            .welcome-decoration,
            .welcome-decoration-circle {
                display: none;
            }

            .welcome-card h1 {
                font-size: 24px;
            }

            .welcome-card p {
                font-size: 14px;
            }

            .section-title {
                font-size: 18px;
            }

            .section-description {
                font-size: 13px;
            }

            .section-heading {
                align-items: flex-start;
            }

            .stats-card {
                min-height: 180px;
                padding: 19px;
            }

            .stats-value {
                font-size: 31px;
            }

            .stats-label {
                font-size: 14px;
            }

            .activity-item {
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .activity-status {
                margin-left: 78px;
            }

            .menu-card {
                min-height: 190px;
                padding: 19px;
            }

            .menu-card h6 {
                font-size: 16px;
            }
        }

        @media (max-width: 420px) {
            .role-badge {
                padding: 7px 10px;
                font-size: 11px;
            }

            .stats-card {
                padding: 15px;
            }

            .stats-icon {
                width: 44px;
                height: 44px;
                font-size: 21px;
            }

            .stats-value {
                font-size: 27px;
            }

            .stats-note {
                font-size: 12px;
            }

            .activity-date {
                width: 54px;
                min-width: 54px;
            }

            .activity-status {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'dashboard',
        'pendingUsersCount' => $pendingUsersCount ?? 0
    ])

    <div class="main-content">

        <header class="topbar">
            <div>
                <div class="topbar-title">Dashboard</div>
                <div class="topbar-subtitle">Sistem Informasi Internal Bapelkes</div>
            </div>

            <span class="role-badge">
                <i class="bi bi-person-circle"></i>
                {{ auth()->user()->role?->name ?? 'Pengguna' }}
            </span>
        </header>

        <main class="dashboard-content">

            <section class="welcome-card">
                <div class="welcome-decoration-circle"></div>
                <i class="bi bi-buildings welcome-decoration"></i>

                <div class="welcome-content">
                    <div class="welcome-label">
                        <i class="bi bi-shield-check"></i>
                        SISTEM INFORMASI INTERNAL BAPELKES
                    </div>

                    <h1>
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h1>

                    <p>
                        Selamat datang di Ruang Pengendalian Mutu Bapelkes.
                        Kelola kegiatan pelatihan dan pemantauan mutu dalam satu sistem.
                    </p>

                    <span class="welcome-role">
                        <i class="bi bi-person-badge"></i>
                        {{ auth()->user()->role?->name ?? 'Pengguna' }}
                    </span>
                </div>
            </section>

            @if (auth()->user()->role?->slug === 'admin')

                <section class="mb-5">
                    <div class="section-heading">
                        <div>
                            <h5 class="section-title">Ringkasan Sistem</h5>
                            <p class="section-description">
                                Gambaran umum pengelolaan kegiatan dan dokumen Bapelkes.
                            </p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="stats-card pink">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-calendar2-check"></i>
                                    </div>
                                    <i class="bi bi-graph-up-arrow stats-indicator"></i>
                                </div>
                                <div class="stats-label">Total Kegiatan</div>
                                <div class="stats-value">
                                    {{ $totalTrainings ?? 0 }}
                                </div>
                                <div class="stats-note">Jumlah kegiatan pelatihan terdaftar dalam sistem.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="stats-card lavender">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-hourglass-split"></i>
                                    </div>
                                    <i class="bi bi-clipboard-check stats-indicator"></i>
                                </div>
                                <div class="stats-label">Menunggu Persetujuan</div>
                                <div class="stats-value">
                                    {{ $pendingApprovalTrainingsCount ?? 0 }}
                                </div>
                                <div class="stats-note">Jumlah kegiatan yang belum mendapatkan keputusan Dalmut.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="stats-card lavender">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <i class="bi bi-calendar-check stats-indicator"></i>
                                </div>
                                <div class="stats-label">Jadwal Mendatang</div>
                                <div class="stats-value">
                                    {{ $upcomingTrainingsCount ?? ($upcomingTrainings->count() ?? 0) }}
                                </div>
                                <div class="stats-note">Kegiatan yang akan dilaksanakan.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="stats-card blue">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <i class="bi bi-folder-check stats-indicator"></i>
                                </div>
                                <div class="stats-label">Total Dokumen</div>
                                <div class="stats-value">
                                    {{ $totalDocuments ?? 0 }}
                                </div>
                                <div class="stats-note">Jumlah dokumen yang tercatat dalam sistem.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="stats-card rose">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                    <i class="bi bi-clock-history stats-indicator"></i>
                                </div>
                                <div class="stats-label">Akun Menunggu</div>
                                <div class="stats-value">
                                    {{ $pendingUsersCount ?? 0 }}
                                </div>
                                <div class="stats-note">Pendaftaran pengguna yang belum disetujui.</div>
                            </div>
                        </div>
                    </div>
                </section>

            @endif

            @if (auth()->user()->role?->slug === 'penglat')

                <section class="mb-5" id="penglatRevisionSection" data-summary-url="{{ route('dashboard.revision-summary') }}">
                    <div class="section-heading flex-wrap">
                        <div>
                            <h5 class="section-title">
                                <i class="bi bi-exclamation-diamond section-icon"></i>
                                Dokumen Memerlukan Perbaikan
                            </h5>
                            <p class="section-description">
                                Pantau dokumen unggahanmu yang diminta revisi oleh Dalmut, dikelompokkan berdasarkan kegiatan pelatihan.
                            </p>
                        </div>

                        <div class="revision-refresh-bar">
                            <span class="revision-sync-text">
                                <i class="bi bi-arrow-repeat me-1"></i>
                                Diperbarui <span id="revisionUpdatedAt">{{ $revisionUpdatedAt ?? now()->format('d/m/Y H:i:s') }}</span>
                            </span>

                            <button type="button" class="btn-refresh-soft" id="refreshRevisionBtn">
                                <i class="bi bi-arrow-clockwise"></i>
                                Perbarui
                            </button>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-6">
                            <div class="stats-card pink">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-file-earmark-exclamation"></i>
                                    </div>
                                    <i class="bi bi-arrow-repeat stats-indicator"></i>
                                </div>
                                <div class="stats-label">Total Dokumen Perlu Direvisi</div>
                                <div class="stats-value" id="revisionDocumentsCountValue">
                                    {{ $revisionDocumentsCount ?? 0 }}
                                </div>
                                <div class="stats-note">Jumlah file dokumen aktif yang diminta perbaikan oleh Dalmut.</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="stats-card lavender">
                                <div class="stats-card-top">
                                    <div class="stats-icon">
                                        <i class="bi bi-calendar2-event"></i>
                                    </div>
                                    <i class="bi bi-folder2-open stats-indicator"></i>
                                </div>
                                <div class="stats-label">Kegiatan Memiliki Dokumen Revisi</div>
                                <div class="stats-value" id="revisionTrainingsCountValue">
                                    {{ $revisionTrainingsCount ?? 0 }}
                                </div>
                                <div class="stats-note">Jumlah kegiatan pelatihan yang memiliki minimal satu dokumen perlu revisi.</div>
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
                                                <i class="bi bi-journal-bookmark me-1" style="color: var(--berry);"></i>
                                                Kegiatan: {{ $group['training_name'] }}
                                            </h6>

                                            <div class="revision-group-meta">
                                                <span>
                                                    <i class="bi bi-building"></i>
                                                    {{ $group['organizer'] }}
                                                </span>
                                                <span>
                                                    <i class="bi bi-calendar3"></i>
                                                    {{ $group['date_range'] }}
                                                </span>
                                            </div>
                                        </div>

                                        <span class="revision-badge">
                                            <i class="bi bi-exclamation-circle-fill"></i>
                                            Terdapat {{ $group['revision_count'] }} dokumen yang perlu diperbaiki
                                        </span>
                                    </div>

                                    <div class="revision-table-wrap">
                                        <table class="table revision-table">
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
                                                            <span class="revision-badge">
                                                                <i class="bi bi-arrow-repeat"></i>
                                                                {{ $doc['status_label'] }}
                                                            </span>
                                                        </td>

                                                        <td>
                                                            <div class="revision-note-preview">{{ $doc['verification_notes'] }}</div>
                                                        </td>

                                                        <td>
                                                            <div class="revision-date-text">
                                                                <i class="bi bi-clock me-1"></i>
                                                                {{ $doc['requested_at'] }}
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <a href="{{ $doc['action_url'] }}" class="btn-outline-berry">
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
                                    <div class="fw-bold" style="font-size: 15px;">Tidak Ada Dokumen yang Perlu Direvisi</div>
                                    <div style="font-size: 13px; margin-top: 3px;">
                                        Saat ini seluruh dokumen unggahanmu tidak memiliki permintaan revisi aktif dari Dalmut.
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>

            @endif

            <section class="mb-5">
                <div class="section-heading">
                    <div>
                        <h5 class="section-title">
                            <i class="bi bi-calendar2-week section-icon"></i>
                            Jadwal Kegiatan Mendatang
                        </h5>
                        <p class="section-description">
                            Kegiatan yang telah disetujui dan dijadwalkan untuk dilaksanakan.
                        </p>
                    </div>

                    <span class="status-count">
                        {{ $upcomingTrainings->count() }} kegiatan
                    </span>
                </div>

                <div class="content-card">
                    @forelse ($upcomingTrainings as $training)
                        <div class="activity-item mx-4">
                            <div class="activity-date">
                                <strong>{{ \Carbon\Carbon::parse($training->start_date)->format('d') }}</strong>
                                <span>{{ \Carbon\Carbon::parse($training->start_date)->format('M Y') }}</span>
                            </div>

                            <div class="flex-grow-1">
                                <div class="activity-name">
                                    {{ $training->training_name }}
                                </div>

                                <div class="activity-detail">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($training->start_date)->format('d/m/Y') }}
                                </div>
                            </div>

                            <span class="activity-status">
                                <i class="bi bi-calendar-check"></i>
                                Akan Dilaksanakan
                            </span>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="bi bi-calendar-x"></i>
                            </div>

                            <div class="empty-state-title">
                                Belum Ada Jadwal Kegiatan
                            </div>

                            <p class="empty-state-description">
                                Belum ada kegiatan mendatang yang telah disetujui dan dijadwalkan untuk dilaksanakan.
                            </p>
                        </div>
                    @endforelse
                </div>
            </section>

            @if (auth()->user()->role?->slug === 'admin')

                <section class="mb-5">
                    <div class="section-heading">
                        <div>
                            <h5 class="section-title">
                                <i class="bi bi-people section-icon"></i>
                                Administrasi Pengguna
                            </h5>
                            <p class="section-description">
                                Kelola pendaftaran dan akses pengguna sistem.
                            </p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-12 col-lg-6">
                            <a href="{{ route('admin.users.index') }}" class="dashboard-link">
                                <div class="menu-card pink">
                                    <div class="menu-card-top">
                                        <div class="menu-card-icon pink">
                                            <i class="bi bi-person-check"></i>
                                        </div>

                                        @if (($pendingUsersCount ?? 0) > 0)
                                            <span class="revision-badge">
                                                {{ $pendingUsersCount }} menunggu
                                            </span>
                                        @else
                                            <i class="bi bi-arrow-up-right menu-card-arrow"></i>
                                        @endif
                                    </div>

                                    <h6>Persetujuan Akun</h6>
                                    <p>
                                        Periksa pendaftar dan tentukan role Penglat atau Dalmut.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>

            @endif

            <section>
                <div class="section-heading">
                    <div>
                        <h5 class="section-title">
                            <i class="bi bi-grid section-icon"></i>
                            Pengelolaan Mutu
                        </h5>
                        <p class="section-description">
                            Akses fitur utama pengelolaan kegiatan pelatihan.
                        </p>
                    </div>
                </div>

                <div class="row g-4">

                    <div class="col-12 col-lg-6">
                        <a href="{{ route('trainings.index') }}" class="dashboard-link">
                            <div class="menu-card lavender">
                                <div class="menu-card-top">
                                    <div class="menu-card-icon lavender">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <i class="bi bi-arrow-up-right menu-card-arrow"></i>
                                </div>

                                <h6>Data Kegiatan Pelatihan</h6>
                                <p>
                                    Lihat dan kelola informasi kegiatan pelatihan yang terdaftar.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-lg-6">
                        <a href="{{ route('admin.quality-control.reports') }}" class="dashboard-link">
                            <div class="menu-card blue">
                                <div class="menu-card-top">
                                    <div class="menu-card-icon blue">
                                        <i class="bi bi-file-earmark-bar-graph"></i>
                                    </div>
                                    <i class="bi bi-arrow-up-right menu-card-arrow"></i>
                                </div>

                                <h6>Laporan Kegiatan</h6>
                                <p>
                                    Unggah dan pantau laporan penyelenggara serta evaluasi setiap kegiatan.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-lg-6">
                        <a href="{{ route('recap.index') }}" class="dashboard-link">
                            <div class="menu-card purple">
                                <div class="menu-card-top">
                                    <div class="menu-card-icon lavender">
                                        <i class="bi bi-bar-chart-line"></i>
                                    </div>
                                    <i class="bi bi-arrow-up-right menu-card-arrow"></i>
                                </div>

                                <h6>Rekap Kegiatan</h6>
                                <p>
                                    Lihat rekap kegiatan pelatihan tahunan, triwulan, dan bulanan lengkap dengan grafik serta export Excel dan PDF.
                                </p>
                            </div>
                        </a>
                    </div>

                </div>
            </section>

            <footer class="footer-text">
                © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes
                <span class="mx-1">·</span>
                Sistem Informasi Internal
            </footer>

        </main>
    </div>

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
                                    '<div class="fw-bold" style="font-size: 15px;">Tidak Ada Dokumen yang Perlu Direvisi</div>' +
                                    '<div style="font-size: 13px; margin-top: 3px;">Saat ini seluruh dokumen unggahanmu tidak memiliki permintaan revisi aktif dari Dalmut.</div>' +
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
                                    '<span class="revision-badge">' +
                                        '<i class="bi bi-arrow-repeat"></i>' +
                                        escapeHtml(doc.status_label) +
                                    '</span>' +
                                '</td>' +
                                '<td>' +
                                    '<div class="revision-note-preview">' + escapeHtml(doc.verification_notes) + '</div>' +
                                '</td>' +
                                '<td>' +
                                    '<div class="revision-date-text">' +
                                        '<i class="bi bi-clock me-1"></i>' +
                                        escapeHtml(doc.requested_at) +
                                    '</div>' +
                                '</td>' +
                                '<td>' +
                                    '<a href="' + escapeHtml(doc.action_url) + '" class="btn-outline-berry">' +
                                        '<i class="bi bi-pencil-square"></i>' +
                                        'Lihat dan Perbaiki' +
                                    '</a>' +
                                '</td>' +
                            '</tr>';
                        }).join('');

                        return '<div class="revision-group-card">' +
                            '<div class="revision-group-header">' +
                                '<div>' +
                                    '<h6 class="revision-group-title">' +
                                        '<i class="bi bi-journal-bookmark me-1" style="color: var(--berry);"></i>' +
                                        'Kegiatan: ' + escapeHtml(group.training_name) +
                                    '</h6>' +
                                    '<div class="revision-group-meta">' +
                                        '<span><i class="bi bi-building"></i>' + escapeHtml(group.organizer) + '</span>' +
                                        '<span><i class="bi bi-calendar3"></i>' + escapeHtml(group.date_range) + '</span>' +
                                    '</div>' +
                                '</div>' +
                                '<span class="revision-badge">' +
                                    '<i class="bi bi-exclamation-circle-fill"></i>' +
                                    'Terdapat ' + escapeHtml(group.revision_count) + ' dokumen yang perlu diperbaiki' +
                                '</span>' +
                            '</div>' +
                            '<div class="revision-table-wrap">' +
                                '<table class="table revision-table">' +
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
