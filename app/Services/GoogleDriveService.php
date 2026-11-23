<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use RuntimeException;

class GoogleDriveService
{
    protected Drive $driveService;
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();

        $this->client->setClientId(
            config('services.google_drive.client_id')
        );

        $this->client->setClientSecret(
            config('services.google_drive.client_secret')
        );

        $this->client->setRedirectUri(
            config('services.google_drive.redirect_uri')
        );

        $this->client->addScope(Drive::DRIVE_FILE);
        $this->client->setAccessType('offline');

        $this->loadAccessToken();

        $this->driveService = new Drive($this->client);
    }

    protected function loadAccessToken(): void
    {
        $path = config('services.google_drive.token_path');

        if (!File::exists($path)) {
            throw new RuntimeException(
                'Akun Google Drive belum terhubung. Hubungkan akun Google terlebih dahulu.'
            );
        }

        $token = json_decode(
            Crypt::decryptString(File::get($path)),
            true
        );

        if (!is_array($token) || empty($token['access_token'])) {
            throw new RuntimeException(
                'Token Google Drive tidak valid. Silakan hubungkan ulang akun Google.'
            );
        }

        $this->client->setAccessToken($token);

        if ($this->client->isAccessTokenExpired()) {
            $refreshToken = $token['refresh_token'] ?? null;

            if (!$refreshToken) {
                throw new RuntimeException(
                    'Refresh token tidak ditemukan. Silakan hubungkan ulang akun Google.'
                );
            }

            $newToken = $this->client->fetchAccessTokenWithRefreshToken(
                $refreshToken
            );

            if (isset($newToken['error'])) {
                logger()->error('Google Drive token refresh failed', [
                    'error' => $newToken['error'],
                    'error_description' => $newToken['error_description'] ?? 'Tidak ada keterangan'
                ]);

                throw new RuntimeException(
                    'Gagal memperbarui akses Google Drive. Kode: ' .
                    $newToken['error']
                );
            }

            $newToken['refresh_token'] = $newToken['refresh_token']
                ?? $refreshToken;

            $this->saveToken($newToken);

            $this->client->setAccessToken($newToken);
        }
    }

    protected function saveToken(array $token): void
    {
        $path = config('services.google_drive.token_path');

        File::ensureDirectoryExists(dirname($path));

        File::put(
            $path,
            Crypt::encryptString(json_encode($token))
        );
    }

    protected function getFolderId(): string
    {
        $path = config('services.google_drive.folder_path');

        if (File::exists($path)) {
            $folderId = Crypt::decryptString(File::get($path));

            if ($folderId !== '') {
                return $folderId;
            }
        }

        $folderId = config('services.google_drive.folder_id');

        if (!$folderId) {
            throw new RuntimeException(
                'Folder Google Drive belum dipilih. Silakan pilih folder terlebih dahulu.'
            );
        }

        return $folderId;
    }

    public function upload(UploadedFile $file): array
    {
        $folderId = $this->getFolderId();

        $fileMetadata = new DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => [$folderId],
        ]);

        $uploadedFile = $this->driveService->files->create(
            $fileMetadata,
            [
                'data' => file_get_contents($file->getRealPath()),
                'mimeType' => $file->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id, name, webViewLink',
            ]
        );

        return [
            'file_id' => $uploadedFile->id,
            'web_view_link' => $uploadedFile->webViewLink,
        ];
    }
}
