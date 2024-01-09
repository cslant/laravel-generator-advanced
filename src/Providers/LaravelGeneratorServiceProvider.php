<?php

namespace CSlant\LaravelGenerator\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $viewPath = __DIR__.'/../../resources/views';
        $this->loadViewsFrom($viewPath, 'laravel-generator');

        $routePath = __DIR__.'/../../routes/web.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'laravel-generator');

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
        $configPath = __DIR__.'/../../config/laravel-generator.php';
        $this->mergeConfigFrom($configPath, 'laravel-generator');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array|null
     */
    public function provides(): ?array
    {
        return ['laravel-generator'];
    }

    /**
     * @return void
     */
    protected function registerAssetPublishing(): void
    {
        $configPath = __DIR__.'/../../config/laravel-generator.php';
        $this->publishes([
            $configPath => config_path('laravel-generator.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../resources/views' => config('laravel-generator.defaults.paths.views'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../lang' => resource_path('lang/vendor/laravel-generator'),
        ], 'lang');
    }
}
