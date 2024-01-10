<?php

use CSlant\LaraGenAdv\Http\Controllers\Asset\AssetController;
use CSlant\LaraGenAdv\Http\Controllers\Generator\RepositoryGeneratorController;
use CSlant\LaraGenAdv\Http\Controllers\LaravelGeneratorAdvancedController;
use Illuminate\Support\Facades\Route;

$routePrefix = config('lara-gen-adv.defaults.route_prefix');

Route::prefix($routePrefix)->group(function () {
    Route::get('/', [LaravelGeneratorAdvancedController::class, 'index'])->name('lara_gen_adv.index');

    Route::get('asset/{asset}', [AssetController::class, 'index'])
        ->name('lara_gen_adv.asset')
        ->where('asset', '.*');

    Route::get('repository', [RepositoryGeneratorController::class, 'index'])->name('lara_gen_adv.repository.index');
});
