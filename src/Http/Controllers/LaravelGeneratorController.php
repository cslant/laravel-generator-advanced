<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use TanHongIT\LaravelGenerator\Http\Controllers\Detect\DetectPatternController;


class LaravelGeneratorController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $detectPatternController = new DetectPatternController();
        $repositories = $detectPatternController->detectRepositoryPattern();

        return view('laravel-generator::index');
    }
}