<?php

return [
    'tool_name' => 'Laravel Generator Advanced',

    'defaults' => [
        'route_prefix' => env('LARA_GEN_ADV_ROUTE_PREFIX', 'laravel-generator-advanced'),

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
