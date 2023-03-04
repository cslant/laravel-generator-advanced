<?php

namespace TanHongIT\LaravelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use TanHongIT\LaravelGenerator\Helpers\ConfigHelper;

class LaravelGenerateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $viewPath = __DIR__ . '/../../resources/views';
        $this->loadViewsFrom($viewPath, 'laravel-generator');

        // Publish a config file
        $configPath = __DIR__ . '/../../config/laravel-generator.php';
        $this->publishes([
            $configPath => config_path('laravel-generator.php'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../../resources/views' => config('laravel-generator.defaults.paths.views'),
        ], 'views');

        // Include routes
        $routePath = __DIR__ . '/../../routes/web.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $configPath = __DIR__ . '/../../config/laravel-generator.php';
        $this->mergeConfigFrom($configPath, 'laravel-generator');

        $this->app->singleton('laravel-generator', function () {
            return new ConfigHelper();
        });
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
}
