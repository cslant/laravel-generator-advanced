<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use TanHongIT\LaravelGenerator\Http\Controllers\LaravelGeneratorController;
use TanHongIT\LaravelGenerator\Repositories\ConfigRepository;

Route::namespace('TanHongIT\LaravelGenerator\Http\Controllers')->group(function (Router $router) {
    $configRepository = resolve(ConfigRepository::class);
    $generatorConfig = $configRepository->generatorConfig();

    Route::prefix($generatorConfig['routes']['tool'])->group(function (Router $router) {
        Route::get('/', [LaravelGeneratorController::class, 'index'])->name('laravel_generator.index');
    });
});