<?php

namespace TanHongIT\LaravelGenerator\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelGenerateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $viewPath = __DIR__ . '/../resources/views';

        // Include routes
        $routePath = __DIR__ . '/../routes/web.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }
    }
}
