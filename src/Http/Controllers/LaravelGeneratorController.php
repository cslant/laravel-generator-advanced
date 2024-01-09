<?php

namespace CSlant\LaravelGenerator\Http\Controllers;

use CSlant\LaravelGenerator\Http\Controllers\Detect\DetectController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaravelGeneratorController extends Controller
{
    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $detectPatternController = new DetectController();
        $repositories = $detectPatternController->detect();

        return view('laravel-generator::index');
    }
}
