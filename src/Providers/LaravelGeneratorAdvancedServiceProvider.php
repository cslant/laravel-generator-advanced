<?php

namespace CSlant\LaraGenAdv\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelGeneratorAdvancedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $viewPath = __DIR__.'/../../resources/views';
        $this->loadViewsFrom($viewPath, 'lara-gen-adv');

        $routePath = __DIR__.'/../../routes/web.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'lara-gen-adv');

        // Load package helpers file
        $helpersPath = __DIR__.'/../../common/helpers.php';
        if (file_exists($helpersPath)) {
            require_once $helpersPath;
        }

        // Publish assets
        $this->registerAssetPublishing();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $configPath = __DIR__.'/../../config/laravel-generator-advanced.php';
        $this->mergeConfigFrom($configPath, 'lara-gen-adv');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array|null
     */
    public function provides(): ?array
    {
        return ['lara-gen-adv'];
    }

    /**
     * @return void
     */
    protected function registerAssetPublishing(): void
    {
        $configPath = __DIR__.'/../../config/laravel-generator-advanced.php';
        $this->publishes([
            $configPath => config_path('laravel-generator-advanced.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../resources/views' => config('lara-gen-adv.defaults.paths.views'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../lang' => resource_path('lang/vendor/laravel-generator-advanced'),
        ], 'lang');
    }
}
