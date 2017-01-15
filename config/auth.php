<?php

return [

    'driver' => 'eloquent',

    'model' => Sagmma\Models\Admin\User::class,

    'table' => 'users',

    'password' => [
        'email'  => 'emails.password',
        'table'  => 'password_resets',
        'expire' => 60,
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => Sagmma\Models\Admin\User::class,
            'table' => 'users',
        ],
    ],
];
