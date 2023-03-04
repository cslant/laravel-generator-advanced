<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use TanHongIT\LaravelGenerator\Http\Controllers\Detect\DetectController;

class LaravelGeneratorController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $detectPatternController = new DetectController();
        $repositories = $detectPatternController->detect();
dd($repositories);
        return view('laravel-generator::index');
    }
}
