<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TanHongIT\LaravelGenerator\Helpers\ConfigHelper;
use TanHongIT\LaravelGenerator\Http\Controllers\LaravelGeneratorController;

Route::namespace('TanHongIT\LaravelGenerator\Http\Controllers')->group(function () {
    $configRepository = resolve(ConfigHelper::class);
    $generatorConfig = $configRepository->generatorConfig();

    Route::prefix($generatorConfig['routes']['tool'])->group(function (Router $router) {
        Route::get('/', [LaravelGeneratorController::class, 'index'])->name('laravel_generator.index');
    });
});