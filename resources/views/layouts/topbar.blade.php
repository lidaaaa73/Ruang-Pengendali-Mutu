@php
    $topbarUser = auth()->user();
    $topbarInitial = strtoupper(mb_substr($topbarUser?->name ?? 'P', 0, 1));
    $crumbs = $breadcrumbs ?? [['label' => $title ?? 'Dashboard']];
@endphp

<header class="app-topbar">
    <div class="app-topbar-left">
        <button type="button" class="app-menu-toggle" id="appSidebarToggle" aria-label="Buka menu navigasi">
            <i class="bi bi-list"></i>
        </button>

        <nav aria-label="Breadcrumb">
            <ol class="app-topbar-breadcrumb">
                @foreach ($crumbs as $index => $crumb)
                    @if ($index > 0)
                        <li class="crumb-sep" aria-hidden="true">
                            <i class="bi bi-chevron-right"></i>
                        </li>
                    @endif

                    <li>
                        @if (!empty($crumb['url']) && !$loop->last)
                            <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                        @else
                            <span class="crumb-current">{{ $crumb['label'] }}</span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>

    <div class="app-topbar-right">
        <span class="app-role-tag">
            <i class="bi bi-shield-check"></i>
            {{ $topbarUser?->role?->name ?? 'Pengguna' }}
        </span>

        <div class="app-user-chip">
            <span class="app-user-chip-avatar">{{ $topbarInitial }}</span>
            <span class="app-user-chip-name">{{ $topbarUser?->name }}</span>
        </div>
    </div>
</header>
