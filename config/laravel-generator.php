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

            'ui_package_path' => 'vendor/tanhongit/laravel-generator-ui',

            'assets_folder' => 'src/',

            'laravel_generator_assets_path' => env('TH_LARAVEL_GENERATOR_ASSETS_PATH',
                config('laravel-generator.defaults.paths.ui_package_path') . '/' . config('laravel-generator.defaults.paths.assets_folder')),
        ],
    ],
];
