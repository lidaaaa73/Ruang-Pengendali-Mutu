<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingDocument;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    private const array REPORT_DOCUMENT_TYPES = [
        'laporan_penyelenggara',
        'evaluasi_penyelenggaraan',
    ];

    private const array DOCUMENT_TYPE_LABELS = [
        'kak' => 'KAK',
        'sk' => 'SK Penyelenggaraan',
        'jadwal' => 'Jadwal Pelatihan',
        'laporan_penyelenggara' => 'Laporan Penyelenggara',
        'evaluasi_penyelenggaraan' => 'Evaluasi Penyelenggaraan',
    ];

    public function index(): Response
    {
        $user = auth()->user();
        $roleSlug = $user->role?->slug;

        $pendingUsersCount = 0;
        $totalTrainings = 0;
        $totalDocuments = 0;
        $pendingApprovalTrainingsCount = 0;

        $revisionDocumentsCount = 0;
        $revisionTrainingsCount = 0;
        $revisionGroups = collect();
        $revisionUpdatedAt = now()->format('d/m/Y H:i:s');

        $upcomingTrainings = Training::with('documents')
            ->where('approval_status', 'approved')
            ->where('execution_status', 'akan_dilaksanakan')
            ->whereDate('start_date', '>=', today())
            ->orderBy('start_date')
            ->get();

        if ($roleSlug === 'admin') {
            $pendingUsersCount = User::where('account_status', 'pending')->count();
            $totalTrainings = Training::count();
            $totalDocuments = TrainingDocument::count();
            $pendingApprovalTrainingsCount = Training::where(function ($query) {
                $query->whereNull('approval_status')
                    ->orWhereNotIn('approval_status', [
                        'approved',
                        'revision',
                        'rejected',
                    ]);
            })->count();
        }

        if ($roleSlug === 'penglat') {
            $revisionData = $this->buildPenglatRevisionData($user->id);
            $revisionDocumentsCount = $revisionData['total_revision_documents'];
            $revisionTrainingsCount = $revisionData['total_revision_trainings'];
            $revisionGroups = $revisionData['groups'];
            $revisionUpdatedAt = $revisionData['updated_at'];
        }

        return response()
            ->view('dashboard', compact(
                'pendingUsersCount',
                'revisionDocumentsCount',
                'revisionTrainingsCount',
                'revisionGroups',
                'revisionUpdatedAt',
                'upcomingTrainings',
                'totalTrainings',
                'totalDocuments',
                'pendingApprovalTrainingsCount'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    public function revisionSummary(): JsonResponse
    {
        $user = auth()->user();

        abort_unless(
            $user && $user->role?->slug === 'penglat',
            403
        );

        $data = $this->buildPenglatRevisionData($user->id);

        return response()
            ->json([
                'total_revision_documents' => $data['total_revision_documents'],
                'total_revision_trainings' => $data['total_revision_trainings'],
                'updated_at' => $data['updated_at'],
                'groups' => $data['groups']->values()->all(),
            ])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    private function buildPenglatRevisionData(int $userId): array
    {
        $documents = TrainingDocument::with(['training', 'verifier'])
            ->where('uploaded_by', $userId)
            ->where('verification_status', 'revision')
            ->whereHas('training')
            ->orderByDesc('verified_at')
            ->orderByDesc('updated_at')
            ->get();

        $groups = $documents
            ->groupBy('training_id')
            ->map(function (Collection $items): array {
                $training = $items->first()->training;

                $formattedDocuments = $items->map(function (TrainingDocument $document) use ($training): array {
                    $isReport = in_array($document->document_type, self::REPORT_DOCUMENT_TYPES, true);
                    $requestedAt = $document->verified_at ?? $document->updated_at;

                    return [
                        'id' => $document->id,
                        'document_type' => $document->document_type,
                        'document_label' => self::DOCUMENT_TYPE_LABELS[$document->document_type] ?? $document->document_type,
                        'original_name' => $document->original_name,
                        'status_label' => 'Perlu Revisi',
                        'verification_notes' => $document->verification_notes ?: 'Dokumen diminta untuk diperbaiki.',
                        'verifier_name' => $document->verifier?->name ?? 'Dalmut',
                        'requested_at' => $requestedAt?->format('d/m/Y H:i') ?? '-',
                        'destination_label' => $isReport ? 'Laporan Kegiatan' : 'Dokumen Kegiatan',
                        'action_url' => $isReport
                            ? route('admin.quality-control.reports') . '#training-' . $training->id
                            : route('trainings.documents.index', $training),
                    ];
                })->values()->all();

                $dateRange = $training->start_date?->format('d/m/Y') ?? '-';
                if ($training->end_date) {
                    $dateRange .= ' s.d. ' . $training->end_date->format('d/m/Y');
                }

                return [
                    'training_id' => $training->id,
                    'training_name' => $training->training_name,
                    'organizer' => $training->organizer ?: '-',
                    'date_range' => $dateRange,
                    'revision_count' => count($formattedDocuments),
                    'documents' => $formattedDocuments,
                ];
            })
            ->values();

        return [
            'total_revision_documents' => $documents->count(),
            'total_revision_trainings' => $groups->count(),
            'groups' => $groups,
            'updated_at' => now()->format('d/m/Y H:i:s'),
        ];
    }
}
