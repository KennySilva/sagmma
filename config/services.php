<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => Sagmma\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1841088639502463',
        'client_secret' => '368e45eb87ead8993746935bbc9128d0',
        'redirect' => 'http://localhost:8000/social/callback/facebook',
        // 'redirect' => 'http://localhost:8000/socialauth/facebook/callback',
    ],

    'google' => [
        'client_id' => '11562201575-8pnrtoortglane5c3bv8nocvfkoiros5.apps.googleusercontent.com',
        'client_secret' => '3eYSOk6V0uyafey-Y694YnGy',
        // 'redirect' => 'http://sagmma.dev:83/social/callback/google',
        'redirect' => 'http://localhost:8000/social/callback/google',
    ],




];
