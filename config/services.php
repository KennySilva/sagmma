<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

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
        // 'client_id' => '338446953179692',
        'client_secret' => '368e45eb87ead8993746935bbc9128d0',
        // 'client_secret' => '241e9ce4d953d96c5f6c88fef14ce83a',
        'redirect' => 'http://localhost:8000/social/callback/facebook',
        // 'redirect' => 'http://localhost:8000/socialauth/facebook/callback',
    ],

    'google' => [
        'client_id' => '11562201575-8pnrtoortglane5c3bv8nocvfkoiros5.apps.googleusercontent.com',
        'client_secret' => '3eYSOk6V0uyafey-Y694YnGy',
        'redirect' => 'http://sagmma.dev:83/social/callback/google',
        // 'redirect' => 'http://localhost:8000/socialauth/google/callback',
    ],




];
