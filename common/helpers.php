<?php

use CSlant\LaraGenAdv\Exceptions\LaravelGeneratorAdvancedException;

if (!function_exists('lara_gen_adv_dist_path')) {
    /**
     * Returns laravel-generator-advanced composer dist path.
     *
     * @param  string|null  $asset
     * @return string
     */
    function lara_gen_adv_dist_path(string $asset = null): string
    {
        $defaultPath = config('lara-gen-adv.defaults.paths.ui_package_path').'/dist/';
        $assetPath = config('lara-gen-adv.defaults.paths.lara_gen_adv_assets_path', $defaultPath);
        if (!str_ends_with($assetPath, '/')) {
            $assetPath .= '/';
        }
        $path = base_path($assetPath);

        if (!$asset) {
            return realpath($path);
        }

        return realpath($path.$asset);
    }
}

if (!function_exists('lara_gen_adv_asset')) {
    /**
     * Returns asset from laravel-generator-advanced composer package.
     *
     * @param  string  $asset
     *
     * @return string
     *
     * @throws LaravelGeneratorAdvancedException
     */
    function lara_gen_adv_asset(string $asset): string
    {
        $file = lara_gen_adv_dist_path($asset);

        if (!file_exists($file)) {
            throw new LaravelGeneratorAdvancedException(sprintf('%s - this Laravel Generator asset does not exist', $asset));
        }

        $useAbsolutePath = config('lara-gen-adv.defaults.paths.use_absolute_path');

        return route('lara_gen_adv.asset', ['asset' => $asset], $useAbsolutePath).'?v='.filemtime($file);
    }
}

if (!function_exists('lara_gen_adv_dist_path_allowed')) {
    /**
     * Returns asset allowed from laravel-generator-advanced composer package.
     *
     * @param  string  $asset
     *
     * @return string
     *
     * @throws LaravelGeneratorAdvancedException
     */
    function lara_gen_adv_asset_allowed(string $asset): string
    {
        $allowed_files = [
            'favicon-16x16.png',
            'favicon-32x32.png',
        ];

        if (!in_array($asset, $allowed_files)) {
            throw new LaravelGeneratorAdvancedException(sprintf('%s - this Laravel Generator Advanced asset is not allowed', $asset));
        }

        return lara_gen_adv_asset($asset);
    }
}
