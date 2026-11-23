<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class GoogleDriveOAuthController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role?->slug === 'admin',
            403,
            'Akses hanya untuk admin.'
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
        $client->setPrompt('consent select_account');
        $client->setIncludeGrantedScopes(true);

        return $client;
    }

    private function tokenPath(): string
    {
        return config('services.google_drive.token_path');
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

    public function connect()
    {
        $this->authorizeAdmin();

        $client = $this->googleClient();
        $state = Str::random(40);

        session([
            'google_drive_oauth_state' => $state,
        ]);

        $client->setState($state);

        return redirect()->away($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $this->authorizeAdmin();

        if ($request->filled('error')) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Koneksi Google Drive dibatalkan.');
        }

        $state = session('google_drive_oauth_state');

        abort_unless(
            $state && hash_equals($state, (string) $request->query('state')),
            403,
            'Permintaan OAuth tidak valid.'
        );

        session()->forget('google_drive_oauth_state');

        if (!$request->filled('code')) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Kode otorisasi Google tidak ditemukan.');
        }

        $client = $this->googleClient();

        try {
            $token = $client->fetchAccessTokenWithAuthCode(
                $request->query('code')
            );

            if (isset($token['error'])) {
                logger()->error('Google OAuth authorization failed', [
                    'error' => $token['error'],
                    'error_description' => $token['error_description'] ?? 'Tidak ada keterangan',
                ]);

                return redirect()
                    ->route('dashboard')
                    ->with('error', 'Gagal menghubungkan Google Drive: ' . ($token['error_description'] ?? $token['error']));
            }

            if (empty($token['access_token'])) {
                throw new RuntimeException(
                    'Google tidak memberikan access token.'
                );
            }

            if (empty($token['refresh_token'])) {
                logger()->error('Google OAuth did not return a new refresh token', [
                    'has_access_token' => true,
                    'scope' => $token['scope'] ?? null,
                ]);

                return redirect()
                    ->route('dashboard')
                    ->with('error', 'Google tidak memberikan Refresh Token baru. Silakan ulangi proses Hubungkan Google Drive dan pastikan persetujuan akses diberikan.');
            }

            $this->saveToken($token);

            logger()->info('Google Drive OAuth connected successfully', [
                'has_access_token' => true,
                'has_refresh_token' => true,
                'scope' => $token['scope'] ?? null,
            ]);

            return redirect()
                ->route('dashboard')
                ->with('success', 'Akun Google Bapelkes berhasil dihubungkan dengan Refresh Token baru.');
        } catch (Throwable $e) {
            logger()->error('Google Drive OAuth callback failed', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('dashboard')
                ->with('error', 'Gagal menghubungkan Google Drive. Silakan periksa log aplikasi.');
        }
    }
}
