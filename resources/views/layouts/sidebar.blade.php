<style>
    :root {
        --purple-dark: #523F77;
        --purple-medium: #67538A;
        --berry: #B35A8A;
        --pink: #F6B7C7;
        --lavender: #B6A5CE;
        --periwinkle: #7880AE;
        --powder-blue: #A3BBD7;
        --sidebar-text: #F7F3FA;
        --sidebar-muted: #D4C9E3;
    }

    .app-sidebar {
        position: fixed;
        inset: 0 auto 0 0;
        z-index: 1030;
        display: flex;
        flex-direction: column;
        width: 260px;
        height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
        background:
            radial-gradient(circle at 15% 85%, rgba(246,183,199,.12), transparent 30%),
            linear-gradient(180deg, #5B477F 0%, #463463 100%);
        color: #fff;
        box-shadow: 5px 0 25px rgba(54, 39, 78, .12);
        scrollbar-width: thin;
        scrollbar-color: rgba(255,255,255,.25) transparent;
    }

    .app-sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .app-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,.25);
        border-radius: 10px;
    }

    .app-sidebar .sidebar-brand {
        display: flex;
        align-items: center;
        min-height: 105px;
        padding: 20px 17px;
        border-bottom: 1px solid rgba(255,255,255,.13);
    }

    .app-sidebar .brand-image {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        overflow: hidden;
        border: 2px solid rgba(255,255,255,.6);
        border-radius: 13px;
        background: #F5EEF8;
        box-shadow: 0 4px 12px rgba(0,0,0,.15);
    }

    .app-sidebar .brand-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .app-sidebar .brand-title {
        margin: 0;
        color: #fff;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 700;
        letter-spacing: -.2px;
    }

    .app-sidebar .brand-subtitle {
        margin-top: 3px;
        color: var(--sidebar-muted);
        font-size: 12px;
    }

    .app-sidebar .sidebar-label {
        padding: 25px 19px 10px;
        color: #E7BBD0;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .app-sidebar .sidebar-link {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 49px;
        margin: 4px 11px;
        padding: 11px 13px;
        border-radius: 10px;
        color: var(--sidebar-text);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background .2s ease, color .2s ease;
    }

    .app-sidebar .sidebar-link:hover {
        color: #fff;
        background: rgba(255,255,255,.12);
    }

    .app-sidebar .sidebar-link.active {
        color: var(--purple-dark);
        background: #F6EAF1;
        box-shadow: 0 4px 14px rgba(28, 18, 48, .12);
        font-weight: 700;
    }

    .app-sidebar .sidebar-link.active::before {
        position: absolute;
        top: 9px;
        bottom: 9px;
        left: 0;
        width: 4px;
        border-radius: 0 5px 5px 0;
        background: var(--berry);
        content: "";
    }

    .app-sidebar .sidebar-link i {
        width: 21px;
        flex-shrink: 0;
        color: #E3C9E0;
        font-size: 19px;
        text-align: center;
    }

    .app-sidebar .sidebar-link.active i {
        color: var(--berry);
    }

    .app-sidebar .sidebar-link:hover i {
        color: var(--pink);
    }

    .app-sidebar .sidebar-link span:not(.menu-count) {
        line-height: 1.5;
    }

    .app-sidebar .menu-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 25px;
        height: 24px;
        margin-left: auto;
        padding: 0 7px;
        border-radius: 20px;
        background: var(--pink);
        color: var(--purple-dark);
        font-size: 12px;
        font-weight: 700;
    }

    .app-sidebar .sidebar-footer {
        margin-top: auto;
        padding: 19px 15px 20px;
        border-top: 1px solid rgba(255,255,255,.14);
        background: rgba(30, 20, 47, .18);
    }

    .app-sidebar .user-profile {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
        margin-bottom: 16px;
    }

    .app-sidebar .user-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border: 1px solid rgba(255,255,255,.3);
        border-radius: 50%;
        background: #F6EAF1;
        color: var(--purple-dark);
        font-size: 19px;
    }

    .app-sidebar .user-info {
        min-width: 0;
    }

    .app-sidebar .user-name {
        overflow: hidden;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .app-sidebar .user-email {
        overflow: hidden;
        margin-top: 3px;
        color: var(--sidebar-muted);
        font-size: 11px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .app-sidebar .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 7px;
        padding: 5px 10px;
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 20px;
        background: rgba(246,183,199,.15);
        color: #FCE7EF;
        font-size: 11px;
        font-weight: 600;
    }

    .app-sidebar .btn-logout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        min-height: 43px;
        border: 1px solid rgba(255,255,255,.4);
        border-radius: 9px;
        background: transparent;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .app-sidebar .btn-logout:hover {
        border-color: #fff;
        background: #fff;
        color: var(--purple-dark);
    }

    @media (max-width: 767px) {
        .app-sidebar {
            position: relative;
            width: 100%;
            height: auto;
            min-height: auto;
            overflow: visible;
        }

        .app-sidebar .sidebar-brand {
            min-height: 85px;
            padding: 16px 18px;
        }

        .app-sidebar .sidebar-label {
            padding-top: 18px;
        }

        .app-sidebar .sidebar-footer {
            margin-top: 12px;
        }
    }
</style>

<aside class="app-sidebar">
    <div class="sidebar-brand">
        <div class="d-flex align-items-center gap-3">
            <div class="brand-image">
                <img src="{{ asset('images/profil-bapelkes.jpeg') }}" alt="Gedung Bapelkes">
            </div>

            <div class="flex-grow-1">
                <h5 class="brand-title">Ruang Pengendalian Mutu</h5>
                <div class="brand-subtitle">Bapelkes</div>
            </div>
        </div>
    </div>

    <nav class="pb-3">
        <div class="sidebar-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}"
            class="sidebar-link {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        @if (auth()->user()->role?->slug === 'admin')
            <div class="sidebar-label">ADMINISTRASI</div>

            <a href="{{ route('admin.users.index') }}"
                class="sidebar-link {{ ($active ?? '') === 'users' ? 'active' : '' }}">
                <i class="bi bi-person-check"></i>
                <span>Persetujuan Akun</span>

                @if (($pendingUsersCount ?? 0) > 0)
                    <span class="menu-count">{{ $pendingUsersCount }}</span>
                @endif
            </a>
        @endif

        <div class="sidebar-label">PENGELOLAAN MUTU</div>

        <a href="{{ route('trainings.index') }}"
            class="sidebar-link {{ ($active ?? '') === 'trainings' ? 'active' : '' }}">
            <i class="bi bi-calendar2-check"></i>
            <span>Data Kegiatan Pelatihan</span>
        </a>

        <a href="{{ route('admin.quality-control.reports') }}"
            class="sidebar-link {{ ($active ?? '') === 'reports' ? 'active' : '' }}">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span>Laporan Kegiatan</span>
        </a>

        <a href="{{ route('recap.index') }}"
            class="sidebar-link {{ ($active ?? '') === 'recap' ? 'active' : '' }}">
            <i class="bi bi-clipboard-data"></i>
            <span>Rekap Dokumen</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div class="user-info flex-grow-1">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-email">{{ auth()->user()->email }}</div>

                <span class="role-badge">
                    <i class="bi bi-shield-check"></i>
                    {{ auth()->user()->role?->name ?? 'Pengguna' }}
                </span>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i>
                Keluar dari Sistem
            </button>
        </form>
    </div>
</aside>
