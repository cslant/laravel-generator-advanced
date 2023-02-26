<?php

return [
    'default' => 'default',
    'generators' => [
        'default' => [
            'path' => 'app',

            'routes' => [
                /* Route for laravel generator tool */
                'tool' => env('TH_LARAVEL_GENERATOR_URL', 'laravel-generator'),
            ],
        ],
    ],

    'defaults' => [],
];