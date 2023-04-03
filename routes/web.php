<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Lbil\LaravelGenerator\Helpers\ConfigHelper;
use Lbil\LaravelGenerator\Http\Controllers\Asset\AssetController;
use Lbil\LaravelGenerator\Http\Controllers\Generator\RepositoryGeneratorController;
use Lbil\LaravelGenerator\Http\Controllers\LaravelGeneratorController;

Route::namespace('Lbil\LaravelGenerator\Http\Controllers')->group(function () {
    $configRepository = resolve(ConfigHelper::class);
    $generatorConfig = $configRepository->generatorConfig();

    Route::prefix($generatorConfig['routes']['tool'])->group(function (Router $router) {
        Route::get('/', [LaravelGeneratorController::class, 'index'])->name('laravel_generator.index');

        Route::get('asset/{asset}', [AssetController::class, 'index'])
            ->name('laravel_generator.asset')
            ->where('asset', '.*');

        Route::get('repository', [RepositoryGeneratorController::class, 'index'])
            ->name('laravel_generator.repository.index');
    });
});
