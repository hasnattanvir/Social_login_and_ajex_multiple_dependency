<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // social link

    'google' => [
        'client_id' => "410788226889-3646fbt0068o76v50npbe7npojmlirjh.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'facebook' => [
        'client_id' =>"476966117262603",
        'client_secret' =>"33b60fd78f1007a0ffda6d258a45d2e7",
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'github' => [
        // 'client_id' => env('GITHUB_CLIENT_ID'),
        'client_id'=>"4c54f94970061249d7af",
        'client_secret' => "3010b861b29859c10185a731d3e7e210db1b097c",
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

];
