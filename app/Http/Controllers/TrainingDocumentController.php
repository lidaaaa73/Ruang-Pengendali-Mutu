<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingDocument;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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

    private function isReportDocument(string $documentType): bool
    {
        return in_array($documentType, [
            'laporan_penyelenggara',
            'evaluasi_penyelenggaraan',
        ], true);
    }

    private function uploadToGoogleDrive(UploadedFile $file, array $context): ?array
    {
        try {
            $driveService = app(GoogleDriveService::class);

            return $driveService->upload($file);
        } catch (Throwable $e) {
            logger()->warning('Google Drive upload failed, document saved locally.', array_merge($context, [
                'error' => $e->getMessage(),
            ]));

            return null;
        }
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
            $this->isReportDocument($documentType) &&
            $training->execution_status !== 'selesai'
        ) {
            return back()->withErrors([
                'document_file' => 'Laporan penyelenggara dan evaluasi hanya dapat diunggah setelah kegiatan selesai.',
            ]);
        }

        $existingDocument = TrainingDocument::where('training_id', $training->id)
            ->where('document_type', $documentType)
            ->first();

        if ($existingDocument && $existingDocument->verification_status === 'verified') {
            return back()->withErrors([
                'document_file' => 'Dokumen ini sudah terverifikasi dan tidak dapat diganti.',
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

        $driveData = $this->uploadToGoogleDrive($file, [
            'training_id' => $training->id,
            'document_type' => $documentType,
        ]);

        $oldPath = $existingDocument?->file_path;

        $payload = [
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
        ];

        try {
            if ($existingDocument) {
                $existingDocument->update($payload);
            } else {
                TrainingDocument::create(array_merge([
                    'training_id' => $training->id,
                    'document_type' => $documentType,
                ], $payload));
            }
        } catch (Throwable $e) {
            if (Storage::disk('private')->exists($path)) {
                Storage::disk('private')->delete($path);
            }

            throw $e;
        }

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

    public function reupload(Request $request, TrainingDocument $document)
    {
        $this->authorizeUploader();

        abort_if(
            $document->verification_status === 'verified',
            403,
            'Dokumen yang sudah terverifikasi tidak dapat diunggah ulang.'
        );

        abort_unless(
            $document->verification_status === 'revision',
            422,
            'Hanya dokumen yang berstatus Perlu Revisi yang dapat diunggah ulang.'
        );

        $request->validate([
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if (
            $this->isReportDocument($document->document_type) &&
            $document->training?->execution_status !== 'selesai'
        ) {
            return back()->withErrors([
                'document_file' => 'Laporan penyelenggara dan evaluasi hanya dapat diunggah ulang setelah kegiatan selesai.',
            ]);
        }

        $file = $request->file('document_file');

        $path = $file->store(
            "training-documents/{$document->training_id}",
            'private'
        );

        if (!$path) {
            return back()->withErrors([
                'document_file' => 'Dokumen pengganti gagal disimpan ke penyimpanan server.',
            ]);
        }

        $driveData = $this->uploadToGoogleDrive($file, [
            'document_id' => $document->id,
            'training_id' => $document->training_id,
            'document_type' => $document->document_type,
        ]);

        $oldPath = $document->file_path;

        try {
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
        } catch (Throwable $e) {
            if (Storage::disk('private')->exists($path)) {
                Storage::disk('private')->delete($path);
            }

            throw $e;
        }

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
                'Dokumen hasil revisi berhasil diunggah ulang ke Google Drive dan kini menunggu pemeriksaan Dalmut.'
            );
        }

        return back()->with(
            'success',
            'Dokumen hasil revisi berhasil diunggah ulang di server dan kini menunggu pemeriksaan Dalmut. Sinkronisasi Google Drive belum berhasil dan dapat dilanjutkan setelah akses Google dipulihkan.'
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
            $this->isReportDocument($document->document_type) &&
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

        $driveData = $this->uploadToGoogleDrive($file, [
            'document_id' => $document->id,
            'training_id' => $document->training_id,
            'document_type' => $document->document_type,
        ]);

        $oldPath = $document->file_path;

        try {
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
        } catch (Throwable $e) {
            if (Storage::disk('private')->exists($path)) {
                Storage::disk('private')->delete($path);
            }

            throw $e;
        }

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

        abort_if(
            $document->verification_status === 'verified',
            422,
            'Dokumen ini sudah terverifikasi.'
        );

        abort_unless(
            $document->verification_status === 'pending',
            422,
            'Dokumen hanya dapat diverifikasi ketika berstatus Menunggu Pemeriksaan.'
        );

        $validated = $request->validate([
            'verification_notes' => 'nullable|string|max:2000',
        ]);

        $notes = isset($validated['verification_notes'])
            ? trim($validated['verification_notes'])
            : null;

        $document->update([
            'verification_status' => 'verified',
            'verification_notes' => $notes !== '' ? $notes : null,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Dokumen berhasil diverifikasi.');
    }

    public function requestRevision(Request $request, TrainingDocument $document)
    {
        $this->authorizeReviewer();

        abort_if(
            $document->verification_status === 'verified',
            422,
            'Dokumen yang sudah terverifikasi tidak dapat diminta revisi.'
        );

        abort_unless(
            $document->verification_status === 'pending',
            422,
            'Permintaan revisi hanya dapat dilakukan pada dokumen yang berstatus Menunggu Pemeriksaan.'
        );

        $validated = $request->validate([
            'verification_notes' => 'required|string|max:2000',
        ]);

        $document->update([
            'verification_status' => 'revision',
            'verification_notes' => trim($validated['verification_notes']),
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
