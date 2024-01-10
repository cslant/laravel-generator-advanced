<?php

return [
    'default' => 'default',

    'app_name' => 'Laravel Generator Advanced',

    'generators' => [
        'default' => [
            'path' => 'app',

            'routes' => [
                /* Route for laravel generator tool */
                'tool' => env('LARA_GEN_ADV_TOOL_ROUTE', 'laravel-generator-advanced'),
            ],
        ],
    ],

    'defaults' => [
        'paths' => [
            /* Edit to include full URL in ui for assets */
            'use_absolute_path' => env('LARA_GEN_ADV_USE_ABSOLUTE_PATH', true),

            'views' => base_path('resources/views/vendor/laravel-generator-advanced'),

            'ui_package_path' => 'vendor/cslant/laravel-generator-ui',

            'assets_folder' => 'dist/',

            'lara_gen_adv_assets_path' => env(
                'LARA_GEN_ADV_ASSETS_PATH',
                'vendor/cslant/laravel-generator-ui/dist/'
            ),
        ],
    ],
];
