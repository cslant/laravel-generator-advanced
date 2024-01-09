<?php

return [
    'default' => 'default',

    'app_name' => 'Laravel Generator',

    'generators' => [
        'default' => [
            'path' => 'app',

            'routes' => [
                /* Route for laravel generator tool */
                'tool' => env('TH_LARAVEL_GENERATOR_TOOL_ROUTE', 'laravel-generator'),
            ],
        ],
    ],

    'defaults' => [
        'paths' => [
            /* Edit to include full URL in ui for assets */
            'use_absolute_path' => env('TH_LARAVEL_GENERATOR_USE_ABSOLUTE_PATH', true),

            'views' => base_path('resources/views/vendor/laravel-generator'),

            'ui_package_path' => 'vendor/cslant/laravel-generator-ui',

            'assets_folder' => 'dist/',

            'laravel_generator_assets_path' => env(
                'TH_LARAVEL_GENERATOR_ASSETS_PATH',
                'vendor/cslant/laravel-generator-ui/dist/'
            ),
        ],
    ],
];
