<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .kpi-grid-5 {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 20px;
        }

        .period-tabs {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 16px;
            padding: 5px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--surface-subtle);
        }

        .period-tab {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border: 0;
            border-radius: var(--radius-sm);
            background: transparent;
            color: var(--text-secondary);
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s ease, color 0.15s ease;
        }

        .period-tab:hover {
            background: #FFFFFF;
            color: var(--purple-dark);
        }

        .period-tab.active {
            background: var(--purple-dark);
            color: #FFFFFF;
        }

        .filter-actions-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .filter-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .chart-box {
            position: relative;
            height: 290px;
            width: 100%;
        }

        .breakdown-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid #F1ECF6;
        }

        .breakdown-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--surface-subtle);
            color: var(--text-primary);
            font-size: 12px;
        }

        .breakdown-chip strong {
            color: var(--berry);
        }

        .status-legend-list {
            display: grid;
            gap: 8px;
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px solid #F1ECF6;
        }

        .status-legend-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-secondary);
            font-size: 12.5px;
        }

        .status-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 7px;
            border-radius: 50%;
        }

        .training-link {
            color: var(--purple-dark);
            font-weight: 600;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .training-link:hover {
            color: var(--berry);
            text-decoration: underline;
        }

        @media (max-width: 1279.98px) {
            .kpi-grid-5 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 767.98px) {
            .kpi-grid-5 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .filter-btn-group {
                width: 100%;
            }

            .filter-btn-group > * {
                flex: 1;
            }
        }

        @media (max-width: 479.98px) {
            .kpi-grid-5 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'recap'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Rekap Kegiatan Pelatihan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-bar-chart-line"></i>
                        Analisis &amp; Pelaporan Bapelkes
                    </div>
                    <h1 class="app-page-title">Rekap Kegiatan Pelatihan</h1>
                    <p class="app-page-subtitle">
                        Pantau perkembangan dan rekapitulasi kegiatan pelatihan berdasarkan periode tahunan, triwulan, dan bulanan.
                    </p>
                </div>

                <span class="app-badge app-badge-neutral">
                    <i class="bi bi-calendar3"></i>
                    {{ $periodLabel }}
                </span>
            </div>

            <section class="kpi-grid-5">
                <div class="app-kpi-card accent-berry">
                    <div class="app-kpi-top">
                        <span class="app-kpi-label">Total Kegiatan</span>
                        <span class="app-icon-box berry"><i class="bi bi-calendar2-check"></i></span>
                    </div>
                    <div class="app-kpi-value">{{ number_format($stats['total_trainings'], 0, ',', '.') }}</div>
                    <div class="app-kpi-note">Sesuai periode &amp; filter aktif</div>
                </div>

                <div class="app-kpi-card accent-lavender">
                    <div class="app-kpi-top">
                        <span class="app-kpi-label">Total Peserta</span>
                        <span class="app-icon-box"><i class="bi bi-people-fill"></i></span>
                    </div>
                    <div class="app-kpi-value">{{ number_format($stats['total_participants'], 0, ',', '.') }}</div>
                    <div class="app-kpi-note">Akumulasi peserta pelatihan</div>
                </div>

                <div class="app-kpi-card accent-success">
                    <div class="app-kpi-top">
                        <span class="app-kpi-label">Kegiatan Selesai</span>
                        <span class="app-icon-box success"><i class="bi bi-check-circle-fill"></i></span>
                    </div>
                    <div class="app-kpi-value">{{ number_format($stats['completed_count'], 0, ',', '.') }}</div>
                    <div class="app-kpi-note">Telah tuntas dilaksanakan</div>
                </div>

                <div class="app-kpi-card accent-blue">
                    <div class="app-kpi-top">
                        <span class="app-kpi-label">Sedang Berlangsung</span>
                        <span class="app-icon-box blue"><i class="bi bi-play-circle-fill"></i></span>
                    </div>
                    <div class="app-kpi-value">{{ number_format($stats['ongoing_count'], 0, ',', '.') }}</div>
                    <div class="app-kpi-note">Sedang aktif berjalan</div>
                </div>

                <div class="app-kpi-card">
                    <div class="app-kpi-top">
                        <span class="app-kpi-label">Akan Dilaksanakan</span>
                        <span class="app-icon-box"><i class="bi bi-calendar-event"></i></span>
                    </div>
                    <div class="app-kpi-value">{{ number_format($stats['upcoming_count'], 0, ',', '.') }}</div>
                    <div class="app-kpi-note">Dijadwalkan mendatang</div>
                </div>
            </section>

            <section class="app-card">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box berry">
                            <i class="bi bi-funnel"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Filter Periode &amp; Kriteria Rekap</h5>
                            <p class="app-card-subtitle">Pengelompokan periode menggunakan tanggal mulai pelaksanaan (start date) dan terpisah dari tahun anggaran.</p>
                        </div>
                    </div>
                </div>

                <div class="app-card-body">
                    <div class="period-tabs">
                        <button type="button" class="period-tab {{ $filters['period_type'] === 'yearly' ? 'active' : '' }}" data-period="yearly">
                            <i class="bi bi-calendar-range"></i>
                            Rekap Tahunan
                        </button>
                        <button type="button" class="period-tab {{ $filters['period_type'] === 'quarterly' ? 'active' : '' }}" data-period="quarterly">
                            <i class="bi bi-grid-3x3-gap"></i>
                            Rekap Triwulan
                        </button>
                        <button type="button" class="period-tab {{ $filters['period_type'] === 'monthly' ? 'active' : '' }}" data-period="monthly">
                            <i class="bi bi-calendar-month"></i>
                            Rekap Bulanan
                        </button>
                    </div>

                    <form action="{{ route('recap.index') }}" method="GET" id="recapFilterForm">
                        <div class="row g-3 align-items-end">
                            <div class="col-12 col-md-4 col-lg-3">
                                <label for="period_type" class="app-form-label">Jenis Periode Rekap</label>
                                <select name="period_type" id="period_type" class="form-select">
                                    <option value="yearly" @selected($filters['period_type'] === 'yearly')>Rekap Tahunan</option>
                                    <option value="quarterly" @selected($filters['period_type'] === 'quarterly')>Rekap Triwulan</option>
                                    <option value="monthly" @selected($filters['period_type'] === 'monthly')>Rekap Bulanan</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <label for="year" class="app-form-label">Tahun Pelaksanaan</label>
                                <select name="year" id="year" class="form-select">
                                    <option value="" id="allYearsOption" @selected($filters['year'] === null)>
                                        Semua Tahun
                                    </option>
                                    @foreach ($availableYears as $yearOption)
                                        <option value="{{ $yearOption }}" @selected((int) $filters['year'] === (int) $yearOption)>
                                            {{ $yearOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3 {{ $filters['period_type'] === 'quarterly' ? '' : 'd-none' }}" id="quarterFieldGroup">
                                <label for="quarter" class="app-form-label">Triwulan</label>
                                <select name="quarter" id="quarter" class="form-select">
                                    <option value="">Semua Triwulan (I–IV)</option>
                                    @foreach ($quarters as $quarterKey => $quarterMeta)
                                        <option value="{{ $quarterKey }}" @selected((int) $filters['quarter'] === (int) $quarterKey)>
                                            {{ $quarterMeta['label'] }} ({{ $quarterMeta['range'] }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3 {{ $filters['period_type'] === 'monthly' ? '' : 'd-none' }}" id="monthFieldGroup">
                                <label for="month" class="app-form-label">Bulan</label>
                                <select name="month" id="month" class="form-select">
                                    <option value="">Semua Bulan (Jan–Des)</option>
                                    @foreach ($months as $monthKey => $monthName)
                                        <option value="{{ $monthKey }}" @selected((int) $filters['month'] === (int) $monthKey)>
                                            {{ $monthName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="organizer" class="app-form-label">Penyelenggara</label>
                                <select name="organizer" id="organizer" class="form-select">
                                    <option value="">Semua Penyelenggara</option>
                                    @foreach ($organizers as $organizerOption)
                                        <option value="{{ $organizerOption }}" @selected($filters['organizer'] === $organizerOption)>
                                            {{ $organizerOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="approval_status" class="app-form-label">Status Persetujuan</label>
                                <select name="approval_status" id="approval_status" class="form-select">
                                    <option value="">Semua Status Persetujuan</option>
                                    @foreach ($approvalStatuses as $statusKey => $statusLabel)
                                        <option value="{{ $statusKey }}" @selected($filters['approval_status'] === $statusKey)>
                                            {{ $statusLabel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="execution_status" class="app-form-label">Status Pelaksanaan</label>
                                <select name="execution_status" id="execution_status" class="form-select">
                                    <option value="">Semua Status Pelaksanaan</option>
                                    @foreach ($executionStatuses as $statusKey => $statusLabel)
                                        <option value="{{ $statusKey }}" @selected($filters['execution_status'] === $statusKey)>
                                            {{ $statusLabel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="filter-actions-row">
                            <div class="filter-btn-group">
                                <button type="submit" class="app-btn app-btn-primary">
                                    <i class="bi bi-search"></i>
                                    Terapkan Filter
                                </button>

                                <a href="{{ route('recap.index') }}" class="app-btn app-btn-outline">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    Reset Filter
                                </a>
                            </div>

                            <div class="filter-btn-group">
                                <a href="{{ route('recap.export.excel', request()->query()) }}" class="app-btn app-btn-soft-success">
                                    <i class="bi bi-file-earmark-excel"></i>
                                    Export Excel (.xlsx)
                                </a>

                                <a href="{{ route('recap.export.pdf', request()->query()) }}" class="app-btn app-btn-soft-danger">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Export PDF (.pdf)
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <section class="row g-4 mb-4">
                <div class="col-12 col-xl-8">
                    <div class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box">
                                    <i class="bi bi-bar-chart-fill"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">{{ $periodBreakdown['chart_title'] }}</h5>
                                    <p class="app-card-subtitle">{{ $periodBreakdown['chart_subtitle'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="chart-box">
                                <canvas id="periodChart"></canvas>
                            </div>

                            @if (count($periodBreakdown['rows']) > 0)
                                <div class="breakdown-list">
                                    @foreach ($periodBreakdown['rows'] as $row)
                                        <span class="breakdown-chip">
                                            <span>{{ $row['label'] }}:</span>
                                            <strong>{{ $row['count'] }}</strong>
                                            <span class="text-secondary">({{ number_format($row['participants'], 0, ',', '.') }} peserta)</span>
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="app-card h-100 mb-0">
                        <div class="app-card-header">
                            <div class="app-card-header-left">
                                <span class="app-icon-box blue">
                                    <i class="bi bi-pie-chart-fill"></i>
                                </span>
                                <div>
                                    <h5 class="app-card-title">Distribusi Status Kegiatan</h5>
                                    <p class="app-card-subtitle">Proporsi status pelaksanaan pada filter aktif.</p>
                                </div>
                            </div>
                        </div>

                        <div class="app-card-body">
                            <div class="chart-box">
                                <canvas id="statusChart"></canvas>
                            </div>

                            <div class="status-legend-list">
                                <div class="status-legend-row">
                                    <span><span class="status-dot" style="background: #2E6F4D;"></span>Selesai</span>
                                    <strong>{{ $stats['completed_count'] }}</strong>
                                </div>
                                <div class="status-legend-row">
                                    <span><span class="status-dot" style="background: #5B7CA3;"></span>Sedang Berlangsung</span>
                                    <strong>{{ $stats['ongoing_count'] }}</strong>
                                </div>
                                <div class="status-legend-row">
                                    <span><span class="status-dot" style="background: #67538A;"></span>Akan Dilaksanakan</span>
                                    <strong>{{ $stats['upcoming_count'] }}</strong>
                                </div>
                                <div class="status-legend-row">
                                    <span><span class="status-dot" style="background: #C48B3B;"></span>Ditunda</span>
                                    <strong>{{ $stats['delayed_count'] }}</strong>
                                </div>
                                <div class="status-legend-row">
                                    <span><span class="status-dot" style="background: #B35A8A;"></span>Dibatalkan</span>
                                    <strong>{{ $stats['cancelled_count'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="app-card mb-0">
                <div class="app-card-header">
                    <div class="app-card-header-left">
                        <span class="app-icon-box berry">
                            <i class="bi bi-table"></i>
                        </span>
                        <div>
                            <h5 class="app-card-title">Daftar Kegiatan Pelatihan</h5>
                            <p class="app-card-subtitle">
                                Menampilkan kegiatan pada <strong>{{ $periodLabel }}</strong> ({{ $activeFilterSummary }}).
                            </p>
                        </div>
                    </div>

                    <span class="app-badge app-badge-neutral">
                        {{ number_format($trainings->count(), 0, ',', '.') }} kegiatan
                    </span>
                </div>

                <div class="app-card-body">
                    <div class="app-table-wrap">
                        <table class="table app-table" style="min-width: 1020px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kegiatan Pelatihan</th>
                                    <th>Penyelenggara</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th class="text-end">Jumlah Peserta</th>
                                    <th class="text-center">Tahun Anggaran</th>
                                    <th>Status Persetujuan</th>
                                    <th>Status Pelaksanaan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($trainings as $training)
                                    @php
                                        $approvalKey = array_key_exists($training->approval_status ?? '', $approvalStatuses)
                                            ? $training->approval_status
                                            : 'draft';
                                        $approvalLabel = $approvalStatuses[$approvalKey] ?? 'Menunggu Persetujuan';
                                        $approvalBadgeClass = match ($approvalKey) {
                                            'approved' => 'app-badge-success',
                                            'revision' => 'app-badge-revision',
                                            'rejected' => 'app-badge-danger',
                                            default => 'app-badge-warning',
                                        };

                                        $executionKey = $training->execution_status ?? '';
                                        $executionLabel = $executionStatuses[$executionKey] ?? '-';
                                        $executionBadgeClass = match ($executionKey) {
                                            'selesai' => 'app-badge-success',
                                            'sedang_berlangsung' => 'app-badge-info',
                                            'ditunda' => 'app-badge-warning',
                                            'dibatalkan' => 'app-badge-danger',
                                            default => 'app-badge-neutral',
                                        };
                                    @endphp

                                    <tr>
                                        <td>
                                            <span class="app-row-number">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('trainings.show', $training) }}" class="training-link">
                                                {{ $training->training_name }}
                                            </a>
                                        </td>

                                        <td>{{ $training->organizer ?: '-' }}</td>

                                        <td class="text-nowrap">{{ $training->start_date?->format('d/m/Y') ?? '-' }}</td>

                                        <td class="text-nowrap">{{ $training->end_date?->format('d/m/Y') ?? '-' }}</td>

                                        <td class="text-end text-nowrap fw-semibold" style="font-variant-numeric: tabular-nums;">
                                            {{ number_format((int) ($training->participant_count ?? 0), 0, ',', '.') }}
                                            <span class="fw-normal text-secondary">orang</span>
                                        </td>

                                        <td class="text-center">{{ $training->budget_year ?: '-' }}</td>

                                        <td>
                                            <span class="app-badge {{ $approvalBadgeClass }}">{{ $approvalLabel }}</span>
                                        </td>

                                        <td>
                                            <span class="app-badge {{ $executionBadgeClass }}">{{ $executionLabel }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            <div class="app-empty-state">
                                                <div class="app-empty-icon">
                                                    <i class="bi bi-calendar-x"></i>
                                                </div>
                                                <h6>Belum Ada Kegiatan pada Periode Ini</h6>
                                                <p>
                                                    Tidak ditemukan kegiatan pelatihan yang sesuai dengan periode dan filter yang aktif. Ubah filter atau tekan Reset Filter.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <script>
        (function () {
            const periodSelect = document.getElementById('period_type');
            const yearSelect = document.getElementById('year');
            const allYearsOption = document.getElementById('allYearsOption');
            const quarterGroup = document.getElementById('quarterFieldGroup');
            const monthGroup = document.getElementById('monthFieldGroup');
            const quarterSelect = document.getElementById('quarter');
            const monthSelect = document.getElementById('month');
            const periodTabs = document.querySelectorAll('.period-tab');
            const filterForm = document.getElementById('recapFilterForm');

            function syncPeriodControls(periodType) {
                const isYearly = periodType === 'yearly';
                const isQuarterly = periodType === 'quarterly';
                const isMonthly = periodType === 'monthly';

                quarterGroup.classList.toggle('d-none', !isQuarterly);
                monthGroup.classList.toggle('d-none', !isMonthly);

                if (!isQuarterly) {
                    quarterSelect.value = '';
                }

                if (!isMonthly) {
                    monthSelect.value = '';
                }

                allYearsOption.hidden = !isYearly;
                allYearsOption.disabled = !isYearly;

                if (!isYearly && !yearSelect.value && yearSelect.options.length > 1) {
                    yearSelect.value = yearSelect.options[1].value;
                }

                periodTabs.forEach(function (tab) {
                    tab.classList.toggle('active', tab.dataset.period === periodType);
                });
            }

            periodSelect.addEventListener('change', function () {
                syncPeriodControls(this.value);
            });

            periodTabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    const chosen = this.dataset.period;
                    periodSelect.value = chosen;
                    syncPeriodControls(chosen);
                    filterForm.submit();
                });
            });

            syncPeriodControls(periodSelect.value);

            const periodLabels = @json($periodBreakdown['labels']);
            const periodCounts = @json($periodBreakdown['counts']);
            const statusLabels = @json($statusChart['labels']);
            const statusCounts = @json($statusChart['counts']);

            const periodCanvas = document.getElementById('periodChart');
            if (periodCanvas) {
                new Chart(periodCanvas, {
                    type: 'bar',
                    data: {
                        labels: periodLabels,
                        datasets: [
                            {
                                label: 'Jumlah Kegiatan',
                                data: periodCounts,
                                backgroundColor: 'rgba(103, 83, 138, 0.82)',
                                hoverBackgroundColor: '#B35A8A',
                                borderColor: '#523F77',
                                borderWidth: 1,
                                borderRadius: 6,
                                maxBarThickness: 44
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    color: '#625970',
                                    font: {
                                        family: 'Poppins',
                                        size: 12
                                    }
                                },
                                grid: {
                                    color: '#EFEAF5'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#2B2338',
                                    font: {
                                        family: 'Poppins',
                                        size: 11.5
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            const statusCanvas = document.getElementById('statusChart');
            if (statusCanvas) {
                const totalStatus = statusCounts.reduce(function (sum, value) {
                    return sum + value;
                }, 0);

                new Chart(statusCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: totalStatus > 0 ? statusLabels : ['Belum Ada Data'],
                        datasets: [
                            {
                                data: totalStatus > 0 ? statusCounts : [1],
                                backgroundColor: totalStatus > 0
                                    ? ['#2E6F4D', '#5B7CA3', '#67538A', '#C48B3B', '#B35A8A']
                                    : ['#E8E1EF'],
                                borderColor: '#FFFFFF',
                                borderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '64%',
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }
        })();
    </script>

</body>
</html>
