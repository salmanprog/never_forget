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

    'google' => [
        'project_id' => env('GOOGLE_CLOUD_PROJECT_ID'),
        'key_file' => env('GOOGLE_CLOUD_KEY_FILE'),
        'places_key' => env('GOOGLE_PLACES_KEY'),
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'currency' => env('STRIPE_CURRENCY', 'usd'),
    ],
    'vonage' => [
        'key' => env('VONAGE_API_KEY'),
        'secret' => env('VONAGE_API_SECRET'),
        'brand_name' => env('VONAGE_BRAND_NAME', 'MyApp'),
    ],
    'taxjar' => [
        'api_key' => env('TAXJAR_API_KEY'),
    ],

    'twilio' => [
        'account_sid' => trim((string) env('TWILIO_ACCOUNT_SID', '')),
        'auth_token' => trim((string) env('TWILIO_AUTH_TOKEN', '')),
        'from' => trim((string) env('TWILIO_FROM_NUMBER', '')), // E.164 e.g. +18667640235 (SMS + Voice)
        'agent_phone' => trim((string) env('TWILIO_AGENT_PHONE', '')), // Optional: fallback when logged-in user has no phone (click-to-call).
    ],

    'authorize' => [
        'api_login_id' => env('AUTHORIZE_API_LOGIN_ID'),
        'transaction_key' => env('AUTHORIZE_TRANSACTION_KEY'),
        'client_key' => env('AUTHORIZE_CLIENT_KEY'),
        'mode' => env('AUTHORIZE_MODE', 'sandbox'),
        'api_url' => env('AUTHORIZE_MODE', 'sandbox') === 'live'
            ? 'https://api.authorize.net/xml/v1/request.api'
            : 'https://apitest.authorize.net/xml/v1/request.api',
    ],

];
