<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Throwable;

class GoogleDriveSettingsController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role?->slug === 'admin',
            403,
            'Akses hanya untuk admin.'
        );
    }

    private function tokenPath(): string
    {
        return config('services.google_drive.token_path');
    }

    private function folderPath(): string
    {
        return config('services.google_drive.folder_path');
    }

    private function getStoredToken(): array
    {
        $path = $this->tokenPath();

        if (!File::exists($path)) {
            throw new RuntimeException('Akun Google Drive belum terhubung.');
        }

        $token = json_decode(
            Crypt::decryptString(File::get($path)),
            true
        );

        if (!is_array($token) || empty($token['access_token'])) {
            throw new RuntimeException('Token Google Drive tidak valid.');
        }

        return $token;
    }

    private function saveToken(array $token): void
    {
        $path = $this->tokenPath();

        File::ensureDirectoryExists(dirname($path));

        File::put(
            $path,
            Crypt::encryptString(json_encode($token))
        );
    }

    private function googleClient(): Client
    {
        $client = new Client();

        $client->setClientId(config('services.google_drive.client_id'));
        $client->setClientSecret(config('services.google_drive.client_secret'));
        $client->setRedirectUri(config('services.google_drive.redirect_uri'));
        $client->addScope(Drive::DRIVE_FILE);
        $client->setAccessType('offline');

        return $client;
    }

    private function getValidAccessToken(): string
    {
        $client = $this->googleClient();
        $token = $this->getStoredToken();

        $client->setAccessToken($token);

        if ($client->isAccessTokenExpired()) {
            $refreshToken = $token['refresh_token'] ?? null;

            if (!$refreshToken) {
                throw new RuntimeException(
                    'Refresh token tidak ditemukan. Hubungkan ulang akun Google.'
                );
            }

            $newToken = $client->fetchAccessTokenWithRefreshToken(
                $refreshToken
            );

            if (isset($newToken['error'])) {
                throw new RuntimeException(
                    'Gagal memperbarui akses Google Drive.'
                );
            }

            $newToken['refresh_token'] = $newToken['refresh_token']
                ?? $refreshToken;

            $this->saveToken($newToken);
            $token = $newToken;
        }

        return $token['access_token'];
    }

    public function index()
    {
        $this->authorizeAdmin();

        $connected = File::exists($this->tokenPath());
        $folderId = null;

        if (File::exists($this->folderPath())) {
            try {
                $folderId = Crypt::decryptString(
                    File::get($this->folderPath())
                );
            } catch (Throwable $e) {
                $folderId = null;
            }
        }

        return view('admin.google-drive.index', [
            'connected' => $connected,
            'folderId' => $folderId,
            'pickerApiKey' => config('services.google_drive.picker_api_key'),
            'projectNumber' => config('services.google_drive.project_number'),
        ]);
    }

    public function accessToken()
    {
        $this->authorizeAdmin();

        try {
            return response()->json([
                'access_token' => $this->getValidAccessToken(),
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }
    }

    public function saveFolder(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'folder_id' => 'required|string|max:255',
        ]);

        try {
            $this->getValidAccessToken();

            $path = $this->folderPath();

            File::ensureDirectoryExists(dirname($path));

            File::put(
                $path,
                Crypt::encryptString($validated['folder_id'])
            );

            return response()->json([
                'success' => true,
                'message' => 'Folder Google Drive berhasil disimpan.',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
