<?php

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google_drive' => [
        'client_id' => env('GOOGLE_OAUTH_CLIENT_ID'),
        'client_secret' => env('GOOGLE_OAUTH_CLIENT_SECRET'),
        'redirect_uri' => env('GOOGLE_OAUTH_REDIRECT_URI'),
        'picker_api_key' => env('GOOGLE_PICKER_API_KEY'),
        'project_number' => env('GOOGLE_CLOUD_PROJECT_NUMBER'),
        'folder_id' => env('GOOGLE_DRIVE_FOLDER_ID'),
        'token_path' => storage_path('app/private/google-drive-token.enc'),
        'folder_path' => storage_path('app/private/google-drive-folder.enc'),
        'credentials_path' => storage_path('app/google-credentials.json'),
    ],

];
