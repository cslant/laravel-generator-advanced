<?php

use Illuminate\Support\Facades\Route;
use TanHongIT\LaravelGenerator\Http\Controllers\LaravelGeneratorController;

Route::namespace('TanHongIT\LaravelGenerator\Http\Controllers')->group(function () {
    Route::prefix('laravel-generator')->group(function () {
        Route::get('/', [LaravelGeneratorController::class, 'index'])->name('laravel_generator.index');
    });
});