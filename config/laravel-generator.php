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

    'defaults' => [
        'paths' => [
            'views' => base_path('resources/views/vendor/laravel-generator'),

            'laravel_generator_assets_path' => env('TH_LARAVEL_GENERATOR_ASSETS_PATH', 'vendor/tanhongit/laravel-generator-api/assets'),
        ],
    ],
];