<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrainingController extends Controller
{
    private function ensureAdminOrPenglat(): void
    {
        abort_unless(
            in_array(auth()->user()->role?->slug, ['admin', 'penglat'], true),
            403,
            'Anda tidak memiliki akses untuk melakukan tindakan ini.'
        );
    }

    private function ensureAdminOrDalmut(): void
    {
        abort_unless(
            in_array(auth()->user()->role?->slug, ['admin', 'dalmut'], true),
            403,
            'Anda tidak memiliki akses untuk memberikan keputusan persetujuan kegiatan.'
        );
    }

    public function index(): View
    {
        $trainings = Training::with(['creator', 'approvalDecider'])
            ->latest()
            ->paginate(10);

        return view('trainings.index', compact('trainings'));
    }

    public function create(): View
    {
        $this->ensureAdminOrPenglat();

        return view('trainings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureAdminOrPenglat();

        $validated = $request->validate([
            'training_name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'organizer' => ['required', 'string', 'max:255'],
            'venue' => ['required', 'string', 'max:255'],
            'participant_count' => ['required', 'integer', 'min:0'],
            'event_notes' => ['nullable', 'string'],
            'funding_source' => ['nullable', 'string', 'max:255'],
            'budget_year' => ['nullable', 'integer', 'min:2000', 'max:2100'],
        ]);

        $validated['created_by'] = auth()->id();
        $validated['execution_status'] = 'akan_dilaksanakan';
        $validated['approval_status'] = 'draft';

        Training::create($validated);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Data kegiatan pelatihan berhasil ditambahkan.');
    }

    public function show(Training $training): View
    {
        $training->load([
            'creator',
            'documents.uploader',
            'approvalDecider'
        ]);

        return view('trainings.show', compact('training'));
    }

    public function edit(Training $training): View
    {
        $this->ensureAdminOrPenglat();

        return view('trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training): RedirectResponse
    {
        $this->ensureAdminOrPenglat();

        $validated = $request->validate([
            'training_name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'organizer' => ['required', 'string', 'max:255'],
            'venue' => ['required', 'string', 'max:255'],
            'participant_count' => ['required', 'integer', 'min:0'],
            'event_notes' => ['nullable', 'string'],
            'funding_source' => ['nullable', 'string', 'max:255'],
            'budget_year' => ['nullable', 'integer', 'min:2000', 'max:2100'],
        ]);

        $training->update($validated);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Data kegiatan pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training): RedirectResponse
    {
        $this->ensureAdminOrPenglat();

        $training->delete();

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Data kegiatan pelatihan berhasil dihapus.');
    }

    public function markCompleted(Training $training): RedirectResponse
    {
        $this->ensureAdminOrPenglat();

        abort_if(
            $training->approval_status !== 'approved',
            422,
            'Kegiatan harus disetujui terlebih dahulu sebelum ditandai selesai.'
        );

        abort_if(
            $training->execution_status === 'selesai',
            422,
            'Kegiatan ini sudah ditandai selesai.'
        );

        abort_if(
            in_array($training->execution_status, ['ditunda', 'dibatalkan'], true),
            422,
            'Kegiatan yang ditunda atau dibatalkan tidak dapat ditandai selesai.'
        );

        abort_unless(
            in_array($training->execution_status, ['akan_dilaksanakan', 'sedang_berlangsung'], true),
            422,
            'Status kegiatan tidak memenuhi syarat untuk ditandai selesai.'
        );

        $training->update([
            'execution_status' => 'selesai',
        ]);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Kegiatan pelatihan berhasil ditandai selesai. Dokumen laporan sudah dapat diunggah.');
    }

    public function approve(Training $training): RedirectResponse
    {
        $this->ensureAdminOrDalmut();

        abort_if(
            $training->approval_status === 'approved',
            422,
            'Kegiatan ini sudah disetujui.'
        );

        $requiredDocuments = ['kak', 'sk', 'jadwal'];

        foreach ($requiredDocuments as $documentType) {
            $verified = $training->documents()
                ->where('document_type', $documentType)
                ->where('verification_status', 'verified')
                ->exists();

            if (!$verified) {
                return redirect()
                    ->route('trainings.index')
                    ->with(
                        'error',
                        'Kegiatan belum dapat disetujui. Pastikan dokumen KAK, SK, dan Jadwal Pelatihan sudah terverifikasi.'
                    );
            }
        }

        $training->update([
            'approval_status' => 'approved',
            'approval_notes' => null,
            'approval_decided_by' => auth()->id(),
            'approval_decided_at' => now(),
        ]);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Kegiatan pelatihan berhasil disetujui.');
    }

    public function requestRevision(
        Request $request,
        Training $training
    ): RedirectResponse {
        $this->ensureAdminOrDalmut();

        abort_if(
            $training->approval_status === 'approved',
            422,
            'Kegiatan yang sudah disetujui tidak dapat diminta revisi melalui tindakan ini.'
        );

        $validated = $request->validate([
            'approval_notes' => ['required', 'string', 'max:2000'],
        ]);

        $training->update([
            'approval_status' => 'revision',
            'approval_notes' => $validated['approval_notes'],
            'approval_decided_by' => auth()->id(),
            'approval_decided_at' => now(),
        ]);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Kegiatan berhasil dikembalikan untuk revisi.');
    }

    public function reject(
        Request $request,
        Training $training
    ): RedirectResponse {
        $this->ensureAdminOrDalmut();

        abort_if(
            $training->approval_status === 'approved',
            422,
            'Kegiatan yang sudah disetujui tidak dapat ditolak melalui tindakan ini.'
        );

        $validated = $request->validate([
            'approval_notes' => ['required', 'string', 'max:2000'],
        ]);

        $training->update([
            'approval_status' => 'rejected',
            'approval_notes' => $validated['approval_notes'],
            'approval_decided_by' => auth()->id(),
            'approval_decided_at' => now(),
        ]);

        return redirect()
            ->route('trainings.index')
            ->with('success', 'Kegiatan pelatihan berhasil ditolak.');
    }
}