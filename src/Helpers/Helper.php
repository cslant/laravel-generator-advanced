<?php

use TanHongIT\LaravelGenerator\Exceptions\LaravelGeneratorException;

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
            throw new LaravelGeneratorException(sprintf('(%s) - this Laravel Generator asset does not exist', $asset));
        }

        return asset(str_replace(public_path(), '', $file));
    }
}

if (! function_exists('laravel_generator_dist_path')) {
    /**
     * Returns laravel-generator composer dist path.
     *
     * @param $asset string
     *
     * @return string
     *
     * @throws LaravelGeneratorException
     */
    function laravel_generator_dist_path(string $asset): string
    {
        $allowed_files = [
            'favicon-16x16.png',
            'favicon-32x32.png',
        ];

        $defaultPath = 'vendor/tanhongit/laravel-generator-api/dist/';
        $path = base_path(config('laravel-generator.paths.laravel_generator_assets_path', $defaultPath));

        if (!$asset) {
            return realpath($path);
        }

        if (!in_array($asset, $allowed_files)) {
            throw new LaravelGeneratorException(sprintf('(%s) - this Laravel Generator asset is not allowed', $asset));
        }

        return realpath($path . $asset);
    }
}