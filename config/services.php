<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


'facebook' => [
    'client_id' => '1489531594390975', // configure with your app id
    'client_secret' => 'b07512ec6205735280431e724a08adab', // your app secret
    'redirect' => 'http://localhost/streetlights/public/auth/callback', // leave blank for now
    ],

'twitter' => [
    'client_id' => 'uN0peBdL9J9VYQjAGvCVffC1U',
    'client_secret' => '6WzD2FArevu364GzseMNNqFXNvLpUbUiIRg8Hx9FFoepiJN9r0',
    'redirect' => 'http://localhost/streetlights/public/auth/twitter/callback',
],

];

