@php
    $sidebarUser = auth()->user();
    $sidebarRoleSlug = $sidebarUser?->role?->slug;
    $sidebarPendingCount = $pendingUsersCount ?? (
        $sidebarRoleSlug === 'admin'
            ? \App\Models\User::where('account_status', 'pending')->count()
            : 0
    );
    $userInitial = strtoupper(mb_substr($sidebarUser?->name ?? 'P', 0, 1));
@endphp

<div class="app-sidebar-backdrop" id="appSidebarBackdrop"></div>

<aside class="app-sidebar" id="appSidebar" aria-label="Navigasi Utama">
    <div class="sidebar-brand">
        <div class="brand-wrap">
            <div class="brand-image">
                <img src="{{ asset('images/profil-bapelkes.jpeg') }}" alt="Gedung Bapelkes">
            </div>

            <div class="min-w-0">
                <h5 class="brand-title">Ruang Pengendalian Mutu</h5>
                <div class="brand-subtitle">Bapelkes · Sistem Internal</div>
            </div>
        </div>

        <button type="button" class="sidebar-close-btn" id="appSidebarClose" aria-label="Tutup menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-label">Menu Utama</div>

        <a href="{{ route('dashboard') }}"
            class="sidebar-link {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        <div class="sidebar-label">Pengelolaan Mutu</div>

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
            <i class="bi bi-bar-chart-line"></i>
            <span>Rekap Kegiatan</span>
        </a>

        @if ($sidebarRoleSlug === 'admin')
            <div class="sidebar-label">Administrasi</div>

            <a href="{{ route('admin.users.index') }}"
                class="sidebar-link {{ ($active ?? '') === 'users' ? 'active' : '' }}">
                <i class="bi bi-person-check"></i>
                <span>Persetujuan Akun</span>

                @if ($sidebarPendingCount > 0)
                    <span class="menu-count">{{ $sidebarPendingCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.google-drive.index') }}"
                class="sidebar-link {{ ($active ?? '') === 'google-drive' ? 'active' : '' }}">
                <i class="bi bi-cloud-check"></i>
                <span>Pengaturan Google Drive</span>
            </a>
        @endif
    </nav>

    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">{{ $userInitial }}</div>

            <div class="user-info">
                <div class="user-name">{{ $sidebarUser?->name }}</div>
                <div class="user-email">{{ $sidebarUser?->email }}</div>

                <span class="sidebar-role-pill">
                    <i class="bi bi-shield-check"></i>
                    {{ $sidebarUser?->role?->name ?? 'Pengguna' }}
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

<script>
    (function () {
        if (window.__bapelkesSidebarReady) {
            return;
        }
        window.__bapelkesSidebarReady = true;

        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('appSidebar');
            const backdrop = document.getElementById('appSidebarBackdrop');
            const closeBtn = document.getElementById('appSidebarClose');
            const toggleBtn = document.getElementById('appSidebarToggle');

            function openSidebar() {
                if (sidebar) {
                    sidebar.classList.add('open');
                }
                if (backdrop) {
                    backdrop.classList.add('show');
                }
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                if (sidebar) {
                    sidebar.classList.remove('open');
                }
                if (backdrop) {
                    backdrop.classList.remove('show');
                }
                document.body.style.overflow = '';
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', openSidebar);
            }
            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebar);
            }
            if (backdrop) {
                backdrop.addEventListener('click', closeSidebar);
            }
        });
    })();
</script>
