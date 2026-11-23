<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RecapController extends Controller
{
    private function requiredDocuments(): array
    {
        return [
            'kak' => 'KAK',
            'sk' => 'SK',
            'jadwal' => 'Jadwal Pelatihan',
            'laporan_penyelenggara' => 'Laporan Penyelenggara',
            'evaluasi_penyelenggaraan' => 'Evaluasi Penyelenggaraan',
        ];
    }

    private function filteredTrainings(Request $request)
    {
        $query = Training::with('documents')
            ->orderByDesc('start_date');

        if ($request->filled('budget_year')) {
            $query->where('budget_year', $request->budget_year);
        }

        if ($request->filled('execution_status')) {
            $query->where('execution_status', $request->execution_status);
        }

        if ($request->filled('organizer')) {
            $query->where('organizer', $request->organizer);
        }

        return $query;
    }

    private function summarizeTraining(Training $training): array
    {
        $requiredDocuments = $this->requiredDocuments();
        $documents = $training->documents;

        $uploadedCount = 0;
        $verifiedCount = 0;
        $revisionCount = 0;
        $pendingCount = 0;
        $documentStatuses = [];

        foreach ($requiredDocuments as $type => $label) {
            $document = $documents
                ->where('document_type', $type)
                ->sortByDesc('created_at')
                ->first();

            if (!$document) {
                $documentStatuses[$type] = 'Belum Diunggah';
                continue;
            }

            $uploadedCount++;

            if ($document->verification_status === 'verified') {
                $documentStatuses[$type] = 'Terverifikasi';
                $verifiedCount++;
            } elseif ($document->verification_status === 'revision') {
                $documentStatuses[$type] = 'Perlu Revisi';
                $revisionCount++;
            } else {
                $documentStatuses[$type] = 'Menunggu Pemeriksaan';
                $pendingCount++;
            }
        }

        return [
            'training' => $training,
            'document_statuses' => $documentStatuses,
            'uploaded_count' => $uploadedCount,
            'verified_count' => $verifiedCount,
            'missing_count' => count($requiredDocuments) - $uploadedCount,
            'revision_count' => $revisionCount,
            'pending_count' => $pendingCount,
            'completion_percentage' => round(
                ($verifiedCount / count($requiredDocuments)) * 100
            ),
        ];
    }

    public function index(Request $request): View
    {
        $trainings = $this->filteredTrainings($request)->get();

        $recaps = $trainings->map(
            fn ($training) => $this->summarizeTraining($training)
        );

        $years = Training::query()
            ->whereNotNull('budget_year')
            ->distinct()
            ->orderByDesc('budget_year')
            ->pluck('budget_year');

        $organizers = Training::query()
            ->whereNotNull('organizer')
            ->where('organizer', '!=', '')
            ->distinct()
            ->orderBy('organizer')
            ->pluck('organizer');

        $totalTrainings = $recaps->count();

        $completeTrainings = $recaps->filter(
            fn ($recap) => $recap['verified_count'] === count($this->requiredDocuments())
        )->count();

        $totalRevisions = $recaps->sum('revision_count');
        $totalPending = $recaps->sum('pending_count');

        return view('recap.index', compact(
            'recaps',
            'years',
            'organizers',
            'totalTrainings',
            'completeTrainings',
            'totalRevisions',
            'totalPending'
        ));
    }

    public function export(Request $request): StreamedResponse
    {
        $trainings = $this->filteredTrainings($request)->get();

        $requiredDocuments = $this->requiredDocuments();

        $filename = 'rekap-kelengkapan-dokumen-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(function () use ($trainings, $requiredDocuments) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No.',
                'Nama Kegiatan',
                'Tanggal Mulai',
                'Tanggal Selesai',
                'Penyelenggara',
                'Tempat Pelaksanaan',
                'Jumlah Peserta',
                'Tahun Anggaran',
                'Status Kegiatan',
                'Status Persetujuan',
                'Status KAK',
                'Status SK',
                'Status Jadwal Pelatihan',
                'Status Laporan Penyelenggara',
                'Status Evaluasi Penyelenggaraan',
                'Jumlah Dokumen Terverifikasi',
                'Jumlah Dokumen Menunggu Pemeriksaan',
                'Jumlah Dokumen Perlu Revisi',
                'Dokumen Belum Diunggah',
                'Persentase Verifikasi',
            ], ';', '"', '');

            foreach ($trainings as $index => $training) {
                $recap = $this->summarizeTraining($training);
                $statuses = $recap['document_statuses'];

                fputcsv($handle, [
                    $index + 1,
                    $training->training_name,
                    $training->start_date?->format('d/m/Y') ?? '-',
                    $training->end_date?->format('d/m/Y') ?? '-',
                    $training->organizer ?? '-',
                    $training->venue ?? '-',
                    $training->participant_count ?? 0,
                    $training->budget_year ?? '-',
                    $training->execution_status
                        ? ucwords(str_replace('_', ' ', $training->execution_status))
                        : '-',
                    $training->approval_status
                        ? ucwords(str_replace('_', ' ', $training->approval_status))
                        : '-',
                    $statuses['kak'],
                    $statuses['sk'],
                    $statuses['jadwal'],
                    $statuses['laporan_penyelenggara'],
                    $statuses['evaluasi_penyelenggaraan'],
                    $recap['verified_count'],
                    $recap['pending_count'],
                    $recap['revision_count'],
                    $recap['missing_count'],
                    $recap['completion_percentage'] . '%',
                ], ';', '"', '');
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}