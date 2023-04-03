<?php

use Lbil\LaravelGenerator\Exceptions\LaravelGeneratorException;

if (!function_exists('laravel_generator_dist_path')) {
    /**
     * Returns laravel-generator composer dist path.
     *
     * @param string|null $asset string
     *
     * @return string
     */
    function laravel_generator_dist_path(string $asset = null): string
    {
        $defaultPath = config('laravel-generator.defaults.paths.ui_package_path') . '/dist/';
        $path = base_path(config('laravel-generator.defaults.paths.laravel_generator_assets_path', $defaultPath));

        if (!$asset) {
            return realpath($path);
        }

        return realpath($path . $asset);
    }
}

if (!function_exists('laravel_generator_asset')) {
    /**
     * Returns asset from laravel-generator composer package.
     *
     * @param $asset string
     *
     * @return string
     *
     * @throws LaravelGeneratorException
     */
    function laravel_generator_asset(string $asset): string
    {
        $file = laravel_generator_dist_path($asset);

        if (!file_exists($file)) {
            throw new LaravelGeneratorException(sprintf('%s - this Laravel Generator asset does not exist', $asset));
        }

        $useAbsolutePath = config('laravel-generator.defaults.paths.use_absolute_path', true);

        return route('laravel_generator.asset', ['asset' => $asset], $useAbsolutePath) . '?v=' . filemtime($file);
    }
}

if (!function_exists('laravel_generator_dist_path_allowed')) {
    /**
     * Returns asset allowed from laravel-generator composer package.
     *
     * @param $asset string
     *
     * @return string
     *
     * @throws LaravelGeneratorException
     */
    function laravel_generator_asset_allowed(string $asset): string
    {
        $allowed_files = [
            'favicon-16x16.png',
            'favicon-32x32.png',
        ];

        if (!in_array($asset, $allowed_files)) {
            throw new LaravelGeneratorException(sprintf('%s - this Laravel Generator asset is not allowed', $asset));
        }

        return laravel_generator_asset($asset);
    }
}
