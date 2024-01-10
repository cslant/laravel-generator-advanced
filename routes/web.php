<?php

use CSlant\LaraGenAdv\Helpers\ConfigHelper;
use CSlant\LaraGenAdv\Http\Controllers\Asset\AssetController;
use CSlant\LaraGenAdv\Http\Controllers\Generator\RepositoryGeneratorController;
use CSlant\LaraGenAdv\Http\Controllers\LaravelGeneratorAdvancedController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::namespace('CSlant\LaraGenAdv\Http\Controllers')->group(function () {
    $configRepository = resolve(ConfigHelper::class);
    $generatorConfig = $configRepository->generatorConfig();

    Route::prefix($generatorConfig['routes']['tool'])->group(function (Router $router) {
        Route::get('/', [LaravelGeneratorAdvancedController::class, 'index'])->name('lara_gen_adv.index');

        Route::get('asset/{asset}', [AssetController::class, 'index'])
            ->name('lara_gen_adv.asset')
            ->where('asset', '.*');

        Route::get('repository', [RepositoryGeneratorController::class, 'index'])
            ->name('lara_gen_adv.repository.index');
    });
});
