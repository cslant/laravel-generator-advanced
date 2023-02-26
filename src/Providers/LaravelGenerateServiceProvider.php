<?php

namespace TanHongIT\LaravelGenerator\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function register()
    {
        //
    }
}
