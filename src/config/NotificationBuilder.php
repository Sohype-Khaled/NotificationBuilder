<?php

return [
    // models namespace
    'observers' => [
        App\User::class,
    ],
    'modelRoutes' => [
        'App\User' => 'users.show',
    ]
];
