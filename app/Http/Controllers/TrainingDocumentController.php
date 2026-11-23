<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingDocument;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class TrainingDocumentController extends Controller
{
    private function authorizeUploader(): void
    {
        abort_unless(
            in_array(Auth::user()->role?->slug, ['admin', 'penglat'], true),
            403
        );
    }

    private function authorizeReviewer(): void
    {
        abort_unless(
            in_array(Auth::user()->role?->slug, ['admin', 'dalmut'], true),
            403
        );
    }

    public function index(Training $training)
    {
        $training->load('creator');

        $documents = $training->documents()
            ->with(['uploader', 'verifier'])
            ->get();

        return view('trainings.documents', compact(
            'training',
            'documents'
        ));
    }

    public function store(Request $request, Training $training)
    {
        $this->authorizeUploader();

        $validated = $request->validate([
            'document_type' => 'required|in:kak,sk,jadwal,laporan_penyelenggara,evaluasi_penyelenggaraan',
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $documentType = $validated['document_type'];

        if (
            in_array($documentType, [
                'laporan_penyelenggara',
                'evaluasi_penyelenggaraan',
            ], true) &&
            $training->execution_status !== 'selesai'
        ) {
            return back()->withErrors([
                'document_file' => 'Laporan penyelenggara dan evaluasi hanya dapat diunggah setelah kegiatan selesai.',
            ]);
        }

        $file = $request->file('document_file');

        $path = $file->store(
            "training-documents/{$training->id}",
            'private'
        );

        if (!$path) {
            return back()->withErrors([
                'document_file' => 'Dokumen gagal disimpan ke penyimpanan server.',
            ]);
        }

        $driveData = null;

        try {
            $driveService = app(GoogleDriveService::class);
            $driveData = $driveService->upload($file);
        } catch (Throwable $e) {
            logger()->warning('Google Drive upload failed, document saved locally.', [
                'training_id' => $training->id,
                'document_type' => $documentType,
                'error' => $e->getMessage(),
            ]);
        }

        $existingDocument = TrainingDocument::where('training_id', $training->id)
            ->where('document_type', $documentType)
            ->first();

        $oldPath = $existingDocument?->file_path;

        TrainingDocument::updateOrCreate(
            [
                'training_id' => $training->id,
                'document_type' => $documentType,
            ],
            [
                'original_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'drive_file_id' => $driveData['file_id'] ?? null,
                'drive_url' => $driveData['web_view_link'] ?? null,
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'uploaded_by' => Auth::id(),
                'verification_status' => 'pending',
                'verification_notes' => null,
                'verified_by' => null,
                'verified_at' => null,
            ]
        );

        if (
            $oldPath &&
            $oldPath !== $path &&
            Storage::disk('private')->exists($oldPath)
        ) {
            Storage::disk('private')->delete($oldPath);
        }

        if ($driveData) {
            return back()->with(
                'success',
                'Dokumen berhasil diunggah dan disimpan ke Google Drive.'
            );
        }

        return back()->with(
            'success',
            'Dokumen berhasil disimpan di server. Sinkronisasi Google Drive belum berhasil dan dapat dilanjutkan setelah akses Google dipulihkan.'
        );
    }

    public function update(Request $request, TrainingDocument $document)
    {
        $this->authorizeUploader();

        abort_if($document->verification_status === 'verified', 403);

        $request->validate([
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if (
            in_array($document->document_type, [
                'laporan_penyelenggara',
                'evaluasi_penyelenggaraan',
            ], true) &&
            $document->training?->execution_status !== 'selesai'
        ) {
            return back()->withErrors([
                'document_file' => 'Laporan hanya dapat diperbarui setelah kegiatan selesai.',
            ]);
        }

        $file = $request->file('document_file');

        $path = $file->store(
            "training-documents/{$document->training_id}",
            'private'
        );

        if (!$path) {
            return back()->withErrors([
                'document_file' => 'Dokumen gagal disimpan ke penyimpanan server.',
            ]);
        }

        $driveData = null;

        try {
            $driveService = app(GoogleDriveService::class);
            $driveData = $driveService->upload($file);
        } catch (Throwable $e) {
            logger()->warning('Google Drive update failed, document saved locally.', [
                'document_id' => $document->id,
                'error' => $e->getMessage(),
            ]);
        }

        $oldPath = $document->file_path;

        $document->update([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'drive_file_id' => $driveData['file_id'] ?? null,
            'drive_url' => $driveData['web_view_link'] ?? null,
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'uploaded_by' => Auth::id(),
            'verification_status' => 'pending',
            'verification_notes' => null,
            'verified_by' => null,
            'verified_at' => null,
        ]);

        if (
            $oldPath &&
            $oldPath !== $path &&
            Storage::disk('private')->exists($oldPath)
        ) {
            Storage::disk('private')->delete($oldPath);
        }

        return back()->with(
            'success',
            $driveData
                ? 'Dokumen berhasil diperbarui dan disimpan ke Google Drive.'
                : 'Dokumen berhasil diperbarui dan disimpan di server.'
        );
    }

    public function destroy(TrainingDocument $document)
    {
        $this->authorizeUploader();

        abort_if($document->verification_status === 'verified', 403);

        if (
            $document->file_path &&
            Storage::disk('private')->exists($document->file_path)
        ) {
            Storage::disk('private')->delete($document->file_path);
        }

        $document->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }

    public function verify(Request $request, TrainingDocument $document)
    {
        $this->authorizeReviewer();

        $request->validate([
            'verification_notes' => 'nullable|string|max:2000',
        ]);

        $document->update([
            'verification_status' => 'verified',
            'verification_notes' => $request->verification_notes,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Dokumen berhasil diverifikasi.');
    }

    public function requestRevision(Request $request, TrainingDocument $document)
    {
        $this->authorizeReviewer();

        $validated = $request->validate([
            'verification_notes' => 'required|string|max:2000',
        ]);

        $document->update([
            'verification_status' => 'revision',
            'verification_notes' => $validated['verification_notes'],
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Permintaan revisi dokumen berhasil dikirim.');
    }

    public function download(TrainingDocument $document)
    {
        if ($document->drive_url) {
            return redirect()->away($document->drive_url);
        }

        if (
            !$document->file_path ||
            !Storage::disk('private')->exists($document->file_path)
        ) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('private')->download(
            $document->file_path,
            $document->original_name
        );
    }
}
