<?php

const UI_PACKAGE_PATH = 'vendor/tanhongit/laravel-generator-ui';

const ASSETS_FOLDER = 'src/';

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
            /*
             * Edit to include full URL in ui for assets
             */
            'use_absolute_path' => env('TH_LARAVEL_GENERATOR_USE_ABSOLUTE_PATH', true),

            'views' => base_path('resources/views/vendor/laravel-generator'),

            'ui_package_path' => UI_PACKAGE_PATH,

            'assets_folder' => ASSETS_FOLDER,

            'laravel_generator_assets_path' => env(
                'TH_LARAVEL_GENERATOR_ASSETS_PATH',
                UI_PACKAGE_PATH . '/' . ASSETS_FOLDER
            ),
        ],
    ],
];
