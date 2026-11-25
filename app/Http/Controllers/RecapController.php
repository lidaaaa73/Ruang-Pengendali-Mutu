<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options as DompdfOptions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use OpenSpout\Common\Entity\Cell\DateTimeCell;
use OpenSpout\Common\Entity\Cell\EmptyCell;
use OpenSpout\Common\Entity\Cell\NumericCell;
use OpenSpout\Common\Entity\Cell\StringCell;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\BorderName;
use OpenSpout\Common\Entity\Style\BorderPart;
use OpenSpout\Common\Entity\Style\BorderStyle;
use OpenSpout\Common\Entity\Style\BorderWidth;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\XLSX\Options as XlsxOptions;
use OpenSpout\Writer\XLSX\Writer as XlsxWriter;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RecapController extends Controller
{
    private const array MONTHS = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    private const array QUARTERS = [
        1 => [
            'label' => 'Triwulan I',
            'range' => 'Januari–Maret',
            'start_month' => 1,
            'end_month' => 3,
        ],
        2 => [
            'label' => 'Triwulan II',
            'range' => 'April–Juni',
            'start_month' => 4,
            'end_month' => 6,
        ],
        3 => [
            'label' => 'Triwulan III',
            'range' => 'Juli–September',
            'start_month' => 7,
            'end_month' => 9,
        ],
        4 => [
            'label' => 'Triwulan IV',
            'range' => 'Oktober–Desember',
            'start_month' => 10,
            'end_month' => 12,
        ],
    ];

    private const array APPROVAL_STATUS_LABELS = [
        'approved' => 'Disetujui',
        'revision' => 'Perlu Revisi',
        'rejected' => 'Ditolak',
        'draft' => 'Menunggu Persetujuan',
    ];

    private const array EXECUTION_STATUS_LABELS = [
        'selesai' => 'Selesai',
        'sedang_berlangsung' => 'Sedang Berlangsung',
        'akan_dilaksanakan' => 'Akan Dilaksanakan',
        'ditunda' => 'Ditunda',
        'dibatalkan' => 'Dibatalkan',
    ];

    public function index(Request $request): View
    {
        $data = $this->buildRecapData($request);

        return view('recap.index', $data);
    }

    public function exportExcel(Request $request): BinaryFileResponse
    {
        $data = $this->buildRecapData($request);
        $filename = $this->buildExportFilename($data['filters'], 'xlsx');

        $tempDir = sys_get_temp_dir();
        $tempFilePath = rtrim($tempDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . Str::uuid() . '.xlsx';

        $options = new XlsxOptions(
            FALLBACK_STYLE: new Style(
                fontSize: 10,
                fontColor: '352D40',
                fontName: 'Calibri',
                cellVerticalAlignment: CellVerticalAlignment::CENTER,
            ),
            tempFolder: $tempDir,
        );

        $options->setColumnWidth(7, 1);
        $options->setColumnWidth(36, 2);
        $options->setColumnWidth(24, 3);
        $options->setColumnWidth(15, 4);
        $options->setColumnWidth(15, 5);
        $options->setColumnWidth(15, 6);
        $options->setColumnWidth(16, 7);
        $options->setColumnWidth(22, 8);
        $options->setColumnWidth(22, 9);

        $options->mergeCells(0, 1, 8, 1);
        $options->mergeCells(0, 2, 8, 2);
        $options->mergeCells(0, 3, 8, 3);
        $options->mergeCells(0, 4, 8, 4);
        $options->mergeCells(0, 5, 8, 5);

        $border = new Border(
            new BorderPart(BorderName::TOP, 'D9CDE6', BorderWidth::THIN, BorderStyle::SOLID),
            new BorderPart(BorderName::RIGHT, 'D9CDE6', BorderWidth::THIN, BorderStyle::SOLID),
            new BorderPart(BorderName::BOTTOM, 'D9CDE6', BorderWidth::THIN, BorderStyle::SOLID),
            new BorderPart(BorderName::LEFT, 'D9CDE6', BorderWidth::THIN, BorderStyle::SOLID),
        );

        $titleStyle = new Style(
            fontBold: true,
            fontSize: 14,
            fontColor: 'FFFFFF',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::LEFT,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            backgroundColor: '523F77',
        );

        $subtitleStyle = new Style(
            fontBold: true,
            fontSize: 10,
            fontColor: '523F77',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::LEFT,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            backgroundColor: 'F3EEF8',
        );

        $metaStyle = new Style(
            fontSize: 10,
            fontColor: '51445D',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::LEFT,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            backgroundColor: 'FBF9FD',
        );

        $summaryHeaderStyle = new Style(
            fontBold: true,
            fontSize: 10,
            fontColor: '523F77',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::CENTER,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            border: $border,
            backgroundColor: 'F9DCE9',
        );

        $summaryValueStyle = new Style(
            fontBold: true,
            fontSize: 11,
            fontColor: '352D40',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::CENTER,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            border: $border,
            backgroundColor: 'FFFFFF',
            format: '#,##0',
        );

        $tableHeaderStyle = new Style(
            fontBold: true,
            fontSize: 10,
            fontColor: 'FFFFFF',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::CENTER,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            shouldWrapText: true,
            border: $border,
            backgroundColor: '67538A',
        );

        $cellTextStyle = new Style(
            fontSize: 10,
            fontColor: '352D40',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::LEFT,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            shouldWrapText: true,
            border: $border,
        );

        $cellCenterStyle = new Style(
            fontSize: 10,
            fontColor: '352D40',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::CENTER,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            shouldWrapText: true,
            border: $border,
        );

        $cellNumberStyle = new Style(
            fontSize: 10,
            fontColor: '352D40',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::RIGHT,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            border: $border,
            format: '#,##0',
        );

        $cellDateStyle = new Style(
            fontSize: 10,
            fontColor: '352D40',
            fontName: 'Calibri',
            cellAlignment: CellAlignment::CENTER,
            cellVerticalAlignment: CellVerticalAlignment::CENTER,
            border: $border,
            format: 'dd/mm/yyyy',
        );

        $cellTextAltStyle = $cellTextStyle->withBackgroundColor('FAF7FC');
        $cellCenterAltStyle = $cellCenterStyle->withBackgroundColor('FAF7FC');
        $cellNumberAltStyle = $cellNumberStyle->withBackgroundColor('FAF7FC');
        $cellDateAltStyle = $cellDateStyle->withBackgroundColor('FAF7FC');

        $writer = new XlsxWriter($options);
        $writer->openToFile($tempFilePath);
        $writer->getCurrentSheet()->setName('Rekap Kegiatan');

        $writer->addRow(new Row([
            new StringCell('LAPORAN REKAP KEGIATAN PELATIHAN', $titleStyle),
        ], height: 28));

        $writer->addRow(new Row([
            new StringCell('Ruang Pengendalian Mutu Bapelkes', $subtitleStyle),
        ], height: 20));

        $writer->addRow(new Row([
            new StringCell('Periode Rekap: ' . $data['periodLabel'], $metaStyle),
        ], height: 19));

        $writer->addRow(new Row([
            new StringCell('Filter Aktif: ' . $data['activeFilterSummary'], $metaStyle),
        ], height: 19));

        $writer->addRow(new Row([
            new StringCell('Tanggal Pembuatan Laporan: ' . $data['generatedAt'], $metaStyle),
        ], height: 19));

        $writer->addRow(Row::fromValues(['']));

        $writer->addRow(new Row([
            new StringCell('Total Kegiatan', $summaryHeaderStyle),
            new StringCell('Total Peserta', $summaryHeaderStyle),
            new StringCell('Kegiatan Selesai', $summaryHeaderStyle),
            new StringCell('Sedang Berlangsung', $summaryHeaderStyle),
            new StringCell('Akan Dilaksanakan', $summaryHeaderStyle),
        ], height: 22));

        $writer->addRow(new Row([
            new NumericCell($data['stats']['total_trainings'], $summaryValueStyle),
            new NumericCell($data['stats']['total_participants'], $summaryValueStyle),
            new NumericCell($data['stats']['completed_count'], $summaryValueStyle),
            new NumericCell($data['stats']['ongoing_count'], $summaryValueStyle),
            new NumericCell($data['stats']['upcoming_count'], $summaryValueStyle),
        ], height: 22));

        $writer->addRow(Row::fromValues(['']));

        $writer->addRow(new Row([
            new StringCell('No.', $tableHeaderStyle),
            new StringCell('Nama Kegiatan Pelatihan', $tableHeaderStyle),
            new StringCell('Penyelenggara', $tableHeaderStyle),
            new StringCell('Tanggal Mulai', $tableHeaderStyle),
            new StringCell('Tanggal Selesai', $tableHeaderStyle),
            new StringCell('Jumlah Peserta', $tableHeaderStyle),
            new StringCell('Tahun Anggaran', $tableHeaderStyle),
            new StringCell('Status Persetujuan', $tableHeaderStyle),
            new StringCell('Status Pelaksanaan', $tableHeaderStyle),
        ], height: 26));

        if ($data['trainings']->isEmpty()) {
            $options->mergeCells(0, 11, 8, 11);
            $writer->addRow(new Row([
                new StringCell('Tidak ada data kegiatan pelatihan untuk periode dan filter yang dipilih.', $cellCenterStyle),
            ], height: 24));
        } else {
            foreach ($data['trainings'] as $index => $training) {
                $isAlt = $index % 2 === 1;
                $textStyle = $isAlt ? $cellTextAltStyle : $cellTextStyle;
                $centerStyle = $isAlt ? $cellCenterAltStyle : $cellCenterStyle;
                $numberStyle = $isAlt ? $cellNumberAltStyle : $cellNumberStyle;
                $dateStyle = $isAlt ? $cellDateAltStyle : $cellDateStyle;

                $startDateCell = $training->start_date
                    ? new DateTimeCell($training->start_date->toDateTimeImmutable(), $dateStyle)
                    : new StringCell('-', $centerStyle);

                $endDateCell = $training->end_date
                    ? new DateTimeCell($training->end_date->toDateTimeImmutable(), $dateStyle)
                    : new StringCell('-', $centerStyle);

                $budgetYearCell = $training->budget_year
                    ? new NumericCell((int) $training->budget_year, $centerStyle)
                    : new StringCell('-', $centerStyle);

                $writer->addRow(new Row([
                    new NumericCell($index + 1, $centerStyle),
                    new StringCell((string) $training->training_name, $textStyle),
                    new StringCell($training->organizer ?: '-', $textStyle),
                    $startDateCell,
                    $endDateCell,
                    new NumericCell((int) ($training->participant_count ?? 0), $numberStyle),
                    $budgetYearCell,
                    new StringCell($this->approvalStatusLabel($training->approval_status), $centerStyle),
                    new StringCell($this->executionStatusLabel($training->execution_status), $centerStyle),
                ], height: 22));
            }

            $totalRowStyle = new Style(
                fontBold: true,
                fontSize: 10,
                fontColor: '523F77',
                fontName: 'Calibri',
                cellAlignment: CellAlignment::RIGHT,
                cellVerticalAlignment: CellVerticalAlignment::CENTER,
                border: $border,
                backgroundColor: 'F3EEF8',
            );

            $totalNumberStyle = $totalRowStyle->withFormat('#,##0');

            $writer->addRow(new Row([
                new EmptyCell(null, $totalRowStyle),
                new StringCell('Total (' . $data['stats']['total_trainings'] . ' Kegiatan)', $totalRowStyle->withCellAlignment(CellAlignment::LEFT)),
                new EmptyCell(null, $totalRowStyle),
                new EmptyCell(null, $totalRowStyle),
                new EmptyCell(null, $totalRowStyle),
                new NumericCell($data['stats']['total_participants'], $totalNumberStyle),
                new EmptyCell(null, $totalRowStyle),
                new EmptyCell(null, $totalRowStyle),
                new EmptyCell(null, $totalRowStyle),
            ], height: 24));
        }

        $writer->close();

        return response()
            ->download($tempFilePath, $filename, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->deleteFileAfterSend(true);
    }

    public function exportPdf(Request $request): Response
    {
        $data = $this->buildRecapData($request);
        $filename = $this->buildExportFilename($data['filters'], 'pdf');

        $html = view('recap.pdf', $data)->render();

        $options = new DompdfOptions();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $canvas = $dompdf->getCanvas();
        $font = $dompdf->getFontMetrics()->getFont('DejaVu Sans', 'normal');
        $canvas->page_text(725, 566, 'Halaman {PAGE_NUM} dari {PAGE_COUNT}', $font, 8, [0.44, 0.41, 0.48]);
        $canvas->page_text(28, 566, 'Ruang Pengendalian Mutu Bapelkes · Dicetak ' . $data['generatedAt'], $font, 8, [0.44, 0.41, 0.48]);

        return response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function buildRecapData(Request $request): array
    {
        $availableYears = $this->availableExecutionYears();
        $defaultYear = $availableYears->first() ?? now()->year;

        $periodType = (string) $request->input('period_type', 'yearly');
        if (!in_array($periodType, ['yearly', 'quarterly', 'monthly'], true)) {
            $periodType = 'yearly';
        }

        $rawYear = $request->input('year');
        $selectedYear = is_numeric($rawYear) && (int) $rawYear >= 2000 && (int) $rawYear <= 2100
            ? (int) $rawYear
            : null;

        if ($periodType !== 'yearly' && $selectedYear === null) {
            $selectedYear = $defaultYear;
        }

        $rawQuarter = $request->input('quarter');
        $selectedQuarter = $periodType === 'quarterly' && is_numeric($rawQuarter) && isset(self::QUARTERS[(int) $rawQuarter])
            ? (int) $rawQuarter
            : null;

        $rawMonth = $request->input('month');
        $selectedMonth = $periodType === 'monthly' && is_numeric($rawMonth) && isset(self::MONTHS[(int) $rawMonth])
            ? (int) $rawMonth
            : null;

        $organizer = trim((string) $request->input('organizer', ''));
        $approvalStatus = (string) $request->input('approval_status', '');
        if (!array_key_exists($approvalStatus, self::APPROVAL_STATUS_LABELS)) {
            $approvalStatus = '';
        }

        $executionStatus = (string) $request->input('execution_status', '');
        if (!array_key_exists($executionStatus, self::EXECUTION_STATUS_LABELS)) {
            $executionStatus = '';
        }

        $filters = [
            'period_type' => $periodType,
            'year' => $selectedYear,
            'quarter' => $selectedQuarter,
            'month' => $selectedMonth,
            'organizer' => $organizer,
            'approval_status' => $approvalStatus,
            'execution_status' => $executionStatus,
        ];

        $query = Training::query()
            ->whereNotNull('start_date')
            ->orderByDesc('start_date')
            ->orderBy('training_name');

        if ($periodType === 'yearly' && $selectedYear !== null) {
            $query->whereBetween('start_date', [
                "{$selectedYear}-01-01",
                "{$selectedYear}-12-31",
            ]);
        } elseif ($periodType === 'quarterly' && $selectedYear !== null) {
            if ($selectedQuarter !== null) {
                $quarterMeta = self::QUARTERS[$selectedQuarter];
                $startDate = Carbon::create($selectedYear, $quarterMeta['start_month'], 1)->startOfMonth()->toDateString();
                $endDate = Carbon::create($selectedYear, $quarterMeta['end_month'], 1)->endOfMonth()->toDateString();
                $query->whereBetween('start_date', [$startDate, $endDate]);
            } else {
                $query->whereBetween('start_date', [
                    "{$selectedYear}-01-01",
                    "{$selectedYear}-12-31",
                ]);
            }
        } elseif ($periodType === 'monthly' && $selectedYear !== null) {
            if ($selectedMonth !== null) {
                $startDate = Carbon::create($selectedYear, $selectedMonth, 1)->startOfMonth()->toDateString();
                $endDate = Carbon::create($selectedYear, $selectedMonth, 1)->endOfMonth()->toDateString();
                $query->whereBetween('start_date', [$startDate, $endDate]);
            } else {
                $query->whereBetween('start_date', [
                    "{$selectedYear}-01-01",
                    "{$selectedYear}-12-31",
                ]);
            }
        }

        if ($organizer !== '') {
            $query->where('organizer', $organizer);
        }

        if ($approvalStatus !== '') {
            if ($approvalStatus === 'draft') {
                $query->where(function ($subQuery) {
                    $subQuery->whereNull('approval_status')
                        ->orWhereNotIn('approval_status', ['approved', 'revision', 'rejected']);
                });
            } else {
                $query->where('approval_status', $approvalStatus);
            }
        }

        if ($executionStatus !== '') {
            $query->where('execution_status', $executionStatus);
        }

        $trainings = $query->get();

        $stats = [
            'total_trainings' => $trainings->count(),
            'total_participants' => (int) $trainings->sum('participant_count'),
            'completed_count' => $trainings->where('execution_status', 'selesai')->count(),
            'ongoing_count' => $trainings->where('execution_status', 'sedang_berlangsung')->count(),
            'upcoming_count' => $trainings->where('execution_status', 'akan_dilaksanakan')->count(),
            'delayed_count' => $trainings->where('execution_status', 'ditunda')->count(),
            'cancelled_count' => $trainings->where('execution_status', 'dibatalkan')->count(),
        ];

        $periodBreakdown = $this->buildPeriodBreakdown($trainings, $filters, $availableYears);
        $statusChart = $this->buildStatusChartData($stats);

        $organizers = Training::query()
            ->whereNotNull('organizer')
            ->where('organizer', '!=', '')
            ->distinct()
            ->orderBy('organizer')
            ->pluck('organizer');

        return [
            'trainings' => $trainings,
            'filters' => $filters,
            'availableYears' => $availableYears,
            'organizers' => $organizers,
            'months' => self::MONTHS,
            'quarters' => self::QUARTERS,
            'approvalStatuses' => self::APPROVAL_STATUS_LABELS,
            'executionStatuses' => self::EXECUTION_STATUS_LABELS,
            'stats' => $stats,
            'periodBreakdown' => $periodBreakdown,
            'statusChart' => $statusChart,
            'periodLabel' => $this->buildPeriodLabel($filters),
            'activeFilterSummary' => $this->buildActiveFilterSummary($filters),
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];
    }

    private function availableExecutionYears(): Collection
    {
        $years = Training::query()
            ->whereNotNull('start_date')
            ->pluck('start_date')
            ->map(fn ($date) => Carbon::parse($date)->year)
            ->unique()
            ->sortDesc()
            ->values();

        if ($years->isEmpty()) {
            return collect([now()->year]);
        }

        return $years;
    }

    private function buildPeriodBreakdown(Collection $trainings, array $filters, Collection $availableYears): array
    {
        $periodType = $filters['period_type'];

        if ($periodType === 'yearly') {
            $years = $filters['year'] !== null
                ? collect([$filters['year']])
                : $availableYears->sort()->values();

            $labels = [];
            $counts = [];
            $participants = [];
            $rows = [];

            foreach ($years as $year) {
                $group = $trainings->filter(fn (Training $item) => $item->start_date?->year === (int) $year);
                $count = $group->count();
                $participantSum = (int) $group->sum('participant_count');

                $labels[] = (string) $year;
                $counts[] = $count;
                $participants[] = $participantSum;
                $rows[] = [
                    'label' => 'Tahun ' . $year,
                    'range' => 'Januari–Desember ' . $year,
                    'count' => $count,
                    'participants' => $participantSum,
                ];
            }

            return [
                'chart_title' => 'Perbandingan Jumlah Kegiatan per Tahun Pelaksanaan',
                'chart_subtitle' => 'Perkembangan jumlah kegiatan pelatihan berdasarkan tahun tanggal mulai.',
                'labels' => $labels,
                'counts' => $counts,
                'participants' => $participants,
                'rows' => $rows,
            ];
        }

        if ($periodType === 'quarterly') {
            $labels = [];
            $counts = [];
            $participants = [];
            $rows = [];

            $targetQuarters = $filters['quarter'] !== null
                ? [$filters['quarter'] => self::QUARTERS[$filters['quarter']]]
                : self::QUARTERS;

            foreach ($targetQuarters as $quarterNumber => $quarterMeta) {
                $group = $trainings->filter(function (Training $item) use ($quarterMeta): bool {
                    $month = $item->start_date?->month;

                    return $month !== null
                        && $month >= $quarterMeta['start_month']
                        && $month <= $quarterMeta['end_month'];
                });

                $count = $group->count();
                $participantSum = (int) $group->sum('participant_count');

                $labels[] = $quarterMeta['label'] . ' (' . $quarterMeta['range'] . ')';
                $counts[] = $count;
                $participants[] = $participantSum;
                $rows[] = [
                    'label' => $quarterMeta['label'],
                    'range' => $quarterMeta['range'] . ' ' . $filters['year'],
                    'count' => $count,
                    'participants' => $participantSum,
                ];
            }

            return [
                'chart_title' => 'Perbandingan Jumlah Kegiatan per Triwulan (' . $filters['year'] . ')',
                'chart_subtitle' => 'Distribusi kegiatan pelatihan untuk setiap triwulan pada tahun ' . $filters['year'] . '.',
                'labels' => $labels,
                'counts' => $counts,
                'participants' => $participants,
                'rows' => $rows,
            ];
        }

        $labels = [];
        $counts = [];
        $participants = [];
        $rows = [];

        $targetMonths = $filters['month'] !== null
            ? [$filters['month'] => self::MONTHS[$filters['month']]]
            : self::MONTHS;

        foreach ($targetMonths as $monthNumber => $monthName) {
            $group = $trainings->filter(fn (Training $item) => $item->start_date?->month === (int) $monthNumber);
            $count = $group->count();
            $participantSum = (int) $group->sum('participant_count');

            $labels[] = $monthName;
            $counts[] = $count;
            $participants[] = $participantSum;
            $rows[] = [
                'label' => $monthName,
                'range' => $monthName . ' ' . $filters['year'],
                'count' => $count,
                'participants' => $participantSum,
            ];
        }

        return [
            'chart_title' => 'Perkembangan Jumlah Kegiatan per Bulan (' . $filters['year'] . ')',
            'chart_subtitle' => 'Distribusi kegiatan pelatihan Januari hingga Desember pada tahun ' . $filters['year'] . '.',
            'labels' => $labels,
            'counts' => $counts,
            'participants' => $participants,
            'rows' => $rows,
        ];
    }

    private function buildStatusChartData(array $stats): array
    {
        return [
            'labels' => [
                'Selesai',
                'Sedang Berlangsung',
                'Akan Dilaksanakan',
                'Ditunda',
                'Dibatalkan',
            ],
            'counts' => [
                $stats['completed_count'],
                $stats['ongoing_count'],
                $stats['upcoming_count'],
                $stats['delayed_count'],
                $stats['cancelled_count'],
            ],
        ];
    }

    private function buildPeriodLabel(array $filters): string
    {
        if ($filters['period_type'] === 'yearly') {
            return $filters['year'] !== null
                ? 'Rekap Tahunan — Tahun ' . $filters['year']
                : 'Rekap Tahunan — Semua Tahun Pelaksanaan';
        }

        if ($filters['period_type'] === 'quarterly') {
            if ($filters['quarter'] !== null) {
                $quarterMeta = self::QUARTERS[$filters['quarter']];

                return 'Rekap Triwulan — ' . $quarterMeta['label'] . ' (' . $quarterMeta['range'] . ') ' . $filters['year'];
            }

            return 'Rekap Triwulan (Triwulan I–IV) — Tahun ' . $filters['year'];
        }

        if ($filters['month'] !== null) {
            return 'Rekap Bulanan — ' . self::MONTHS[$filters['month']] . ' ' . $filters['year'];
        }

        return 'Rekap Bulanan (Januari–Desember) — Tahun ' . $filters['year'];
    }

    private function buildActiveFilterSummary(array $filters): string
    {
        $parts = [];

        if ($filters['organizer'] !== '') {
            $parts[] = 'Penyelenggara: ' . $filters['organizer'];
        }

        if ($filters['approval_status'] !== '') {
            $parts[] = 'Persetujuan: ' . self::APPROVAL_STATUS_LABELS[$filters['approval_status']];
        }

        if ($filters['execution_status'] !== '') {
            $parts[] = 'Pelaksanaan: ' . self::EXECUTION_STATUS_LABELS[$filters['execution_status']];
        }

        return $parts !== [] ? implode(' | ', $parts) : 'Semua Penyelenggara & Semua Status';
    }

    private function buildExportFilename(array $filters, string $extension): string
    {
        if ($filters['period_type'] === 'yearly') {
            $suffix = $filters['year'] !== null ? (string) $filters['year'] : 'semua_tahun';

            return "rekap_kegiatan_tahunan_{$suffix}.{$extension}";
        }

        if ($filters['period_type'] === 'quarterly') {
            if ($filters['quarter'] !== null) {
                return "rekap_kegiatan_triwulan_{$filters['quarter']}_{$filters['year']}.{$extension}";
            }

            return "rekap_kegiatan_triwulan_{$filters['year']}.{$extension}";
        }

        if ($filters['month'] !== null) {
            $monthSlug = Str::lower(self::MONTHS[$filters['month']]);

            return "rekap_kegiatan_bulanan_{$monthSlug}_{$filters['year']}.{$extension}";
        }

        return "rekap_kegiatan_bulanan_{$filters['year']}.{$extension}";
    }

    private function approvalStatusLabel(?string $status): string
    {
        if ($status !== null && array_key_exists($status, self::APPROVAL_STATUS_LABELS)) {
            return self::APPROVAL_STATUS_LABELS[$status];
        }

        return 'Menunggu Persetujuan';
    }

    private function executionStatusLabel(?string $status): string
    {
        if ($status !== null && array_key_exists($status, self::EXECUTION_STATUS_LABELS)) {
            return self::EXECUTION_STATUS_LABELS[$status];
        }

        return '-';
    }
}
