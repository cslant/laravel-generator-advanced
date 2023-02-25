<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => \TanHongIT\LaravelGenerator\Providers\LaravelGenerateServiceProvider::class], function () {
    Route::prefix('laravel-generator')->group(function () {
        Route::get('/', \TanHongIT\LaravelGenerator\Http\Controllers\LaravelGeneratorController::class . '@index')->name('laravel-generator.index');
    });
});