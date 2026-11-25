<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Rekap Kegiatan Pelatihan</title>
    <style>
        @page {
            margin: 18px 24px 32px 24px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9px;
            color: #352D40;
            line-height: 1.45;
        }

        .report-header {
            padding: 14px 16px;
            margin-bottom: 12px;
            border-radius: 6px;
            background-color: #523F77;
            color: #FFFFFF;
        }

        .report-org {
            font-size: 8px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: #F6DCE7;
            margin-bottom: 3px;
        }

        .report-title {
            margin: 0 0 4px 0;
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
        }

        .report-subtitle {
            margin: 0;
            font-size: 9.5px;
            color: #F1EAF6;
        }

        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
            background-color: #FAF7FC;
            border: 1px solid #E3D9ED;
        }

        .meta-table td {
            padding: 5px 9px;
            font-size: 8.5px;
            border-bottom: 1px solid #ECE5F3;
        }

        .meta-label {
            width: 170px;
            font-weight: bold;
            color: #523F77;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 6px 0;
            margin: 0 -6px 12px -6px;
        }

        .summary-cell {
            width: 20%;
            padding: 8px 10px;
            border: 1px solid #E5D9EC;
            border-left: 3px solid #B35A8A;
            background-color: #FCF7FA;
            vertical-align: top;
        }

        .summary-cell.lavender {
            border-left-color: #67538A;
            background-color: #F6F2FA;
        }

        .summary-cell.success {
            border-left-color: #356B4B;
            background-color: #F2F8F4;
        }

        .summary-cell.periwinkle {
            border-left-color: #7880AE;
            background-color: #F3F6FB;
        }

        .summary-label {
            font-size: 8px;
            color: #63576F;
            margin-bottom: 3px;
        }

        .summary-value {
            font-size: 15px;
            font-weight: bold;
            color: #352D40;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .data-table thead {
            display: table-header-group;
        }

        .data-table tr {
            page-break-inside: avoid;
        }

        .data-table th {
            padding: 7px 6px;
            background-color: #67538A;
            color: #FFFFFF;
            border: 1px solid #523F77;
            font-size: 8.5px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }

        .data-table td {
            padding: 6px 6px;
            border: 1px solid #DFD5EA;
            font-size: 8.5px;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .data-table tbody tr:nth-child(even) td {
            background-color: #FAF7FC;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 7.5px;
            font-weight: bold;
        }

        .badge-approved,
        .badge-selesai {
            background-color: #E6F2EA;
            color: #356B4B;
        }

        .badge-revision,
        .badge-ditunda {
            background-color: #F9EED8;
            color: #805A16;
        }

        .badge-rejected,
        .badge-dibatalkan {
            background-color: #FCEBF0;
            color: #963F5A;
        }

        .badge-draft,
        .badge-akan {
            background-color: #F0EAF7;
            color: #523F77;
        }

        .badge-ongoing {
            background-color: #E2ECF8;
            color: #466485;
        }

        .total-row td {
            background-color: #F3EEF8 !important;
            font-weight: bold;
            color: #523F77;
            border-top: 1.5px solid #67538A;
        }

        .empty-box {
            padding: 20px;
            text-align: center;
            color: #71697B;
        }
    </style>
</head>
<body>
    <div class="report-header">
        <div class="report-org">Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal</div>
        <h1 class="report-title">LAPORAN REKAP KEGIATAN PELATIHAN</h1>
        <p class="report-subtitle">{{ $periodLabel }}</p>
    </div>

    <table class="meta-table">
        <tr>
            <td class="meta-label">Periode Rekap</td>
            <td>{{ $periodLabel }}</td>
            <td class="meta-label">Tanggal Pembuatan Laporan</td>
            <td>{{ $generatedAt }}</td>
        </tr>
        <tr>
            <td class="meta-label">Filter Aktif</td>
            <td colspan="3">{{ $activeFilterSummary }}</td>
        </tr>
    </table>

    <table class="summary-table">
        <tr>
            <td class="summary-cell">
                <div class="summary-label">Total Kegiatan Pelatihan</div>
                <div class="summary-value">{{ number_format($stats['total_trainings'], 0, ',', '.') }}</div>
            </td>
            <td class="summary-cell lavender">
                <div class="summary-label">Total Peserta Pelatihan</div>
                <div class="summary-value">{{ number_format($stats['total_participants'], 0, ',', '.') }}</div>
            </td>
            <td class="summary-cell success">
                <div class="summary-label">Kegiatan Selesai</div>
                <div class="summary-value">{{ number_format($stats['completed_count'], 0, ',', '.') }}</div>
            </td>
            <td class="summary-cell periwinkle">
                <div class="summary-label">Sedang Berlangsung</div>
                <div class="summary-value">{{ number_format($stats['ongoing_count'], 0, ',', '.') }}</div>
            </td>
            <td class="summary-cell lavender">
                <div class="summary-label">Akan Dilaksanakan</div>
                <div class="summary-value">{{ number_format($stats['upcoming_count'], 0, ',', '.') }}</div>
            </td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 4%;">No.</th>
                <th style="width: 24%;">Nama Kegiatan Pelatihan</th>
                <th style="width: 16%;">Penyelenggara</th>
                <th style="width: 9%;">Tanggal Mulai</th>
                <th style="width: 9%;">Tanggal Selesai</th>
                <th style="width: 8%;">Jumlah Peserta</th>
                <th style="width: 8%;">Tahun Anggaran</th>
                <th style="width: 11%;">Status Persetujuan</th>
                <th style="width: 11%;">Status Pelaksanaan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trainings as $index => $training)
                @php
                    $approvalKey = array_key_exists($training->approval_status ?? '', $approvalStatuses)
                        ? $training->approval_status
                        : 'draft';
                    $approvalLabel = $approvalStatuses[$approvalKey] ?? 'Menunggu Persetujuan';

                    $executionKey = $training->execution_status ?? '';
                    $executionLabel = $executionStatuses[$executionKey] ?? '-';

                    $executionBadgeClass = match ($executionKey) {
                        'selesai' => 'badge-selesai',
                        'sedang_berlangsung' => 'badge-ongoing',
                        'ditunda' => 'badge-ditunda',
                        'dibatalkan' => 'badge-dibatalkan',
                        default => 'badge-akan',
                    };
                @endphp
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $training->training_name }}</td>
                    <td>{{ $training->organizer ?: '-' }}</td>
                    <td class="text-center">{{ $training->start_date?->format('d/m/Y') ?? '-' }}</td>
                    <td class="text-center">{{ $training->end_date?->format('d/m/Y') ?? '-' }}</td>
                    <td class="text-right">{{ number_format((int) ($training->participant_count ?? 0), 0, ',', '.') }}</td>
                    <td class="text-center">{{ $training->budget_year ?: '-' }}</td>
                    <td class="text-center">
                        <span class="badge badge-{{ $approvalKey }}">{{ $approvalLabel }}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge {{ $executionBadgeClass }}">{{ $executionLabel }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty-box">
                        Tidak ada data kegiatan pelatihan untuk periode dan filter yang dipilih.
                    </td>
                </tr>
            @endforelse

            @if ($trainings->isNotEmpty())
                <tr class="total-row">
                    <td colspan="5" class="text-right">Total ({{ number_format($stats['total_trainings'], 0, ',', '.') }} Kegiatan)</td>
                    <td class="text-right">{{ number_format($stats['total_participants'], 0, ',', '.') }}</td>
                    <td colspan="3"></td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
