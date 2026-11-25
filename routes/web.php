<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserApprovalController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingDocumentController;
use App\Http\Controllers\RecapController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\GoogleDriveOAuthController;
use App\Http\Controllers\GoogleDriveSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [RegistrationController::class, 'showRegistration'])
        ->name('register');

    Route::post('/register', [RegistrationController::class, 'register'])
        ->name('register.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/revision-summary', [DashboardController::class, 'revisionSummary'])
        ->name('dashboard.revision-summary');

    Route::resource('trainings', TrainingController::class);

    Route::patch('/trainings/{training}/mark-completed', [TrainingController::class, 'markCompleted'])
        ->name('trainings.mark-completed');

    Route::patch('/trainings/{training}/approve', [TrainingController::class, 'approve'])
        ->name('trainings.approve');

    Route::patch('/trainings/{training}/request-revision', [TrainingController::class, 'requestRevision'])
        ->name('trainings.request-revision');

    Route::patch('/trainings/{training}/reject', [TrainingController::class, 'reject'])
        ->name('trainings.reject');

    Route::get('/recap', [RecapController::class, 'index'])
        ->name('recap.index');

    Route::get('/recap/export', [RecapController::class, 'exportExcel'])
        ->name('recap.export');

    Route::get('/recap/export/excel', [RecapController::class, 'exportExcel'])
        ->name('recap.export.excel');

    Route::get('/recap/export/pdf', [RecapController::class, 'exportPdf'])
        ->name('recap.export.pdf');

    Route::get('/trainings/{training}/documents', [TrainingDocumentController::class, 'index'])
        ->name('trainings.documents.index');

    Route::post('/trainings/{training}/documents', [TrainingDocumentController::class, 'store'])
        ->name('trainings.documents.store');

    Route::get('/training-documents/{document}/download', [TrainingDocumentController::class, 'download'])
        ->name('training-documents.download');

    Route::delete('/training-documents/{document}', [TrainingDocumentController::class, 'destroy'])
        ->name('training-documents.destroy');

    Route::put('/training-documents/{document}', [TrainingDocumentController::class, 'update'])
        ->name('training-documents.update');

    Route::patch('/training-documents/{document}/reupload', [TrainingDocumentController::class, 'reupload'])
        ->name('training-documents.reupload');

    Route::patch('/training-documents/{document}/verify', [TrainingDocumentController::class, 'verify'])
        ->name('training-documents.verify');

    Route::patch('/training-documents/{document}/request-revision', [TrainingDocumentController::class, 'requestRevision'])
        ->name('training-documents.request-revision');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/google-drive', [GoogleDriveSettingsController::class, 'index'])
            ->name('google-drive.index');

        Route::get('/google-drive/connect', [GoogleDriveOAuthController::class, 'connect'])
            ->name('google-drive.connect');

        Route::get('/google-drive/callback', [GoogleDriveOAuthController::class, 'callback'])
            ->name('google-drive.callback');

        Route::get('/google-drive/access-token', [GoogleDriveSettingsController::class, 'accessToken'])
            ->name('google-drive.access-token');

        Route::post('/google-drive/folder', [GoogleDriveSettingsController::class, 'saveFolder'])
            ->name('google-drive.save-folder');

        Route::get('/users', [UserApprovalController::class, 'index'])
            ->name('users.index');

        Route::post('/users/{user}/approve', [UserApprovalController::class, 'approve'])
            ->name('users.approve');

        Route::post('/users/{user}/reject', [UserApprovalController::class, 'reject'])
            ->name('users.reject');

        Route::get('/laporan-kegiatan', [QualityControlController::class, 'reports'])
            ->name('quality-control.reports');
    });

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
