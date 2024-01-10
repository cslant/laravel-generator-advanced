<?php

namespace CSlant\LaraGenAdv\Http\Controllers;

use CSlant\LaraGenAdv\Http\Controllers\Detect\DetectController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaravelGeneratorAdvancedController extends Controller
{
    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $detectPatternController = new DetectController();
        $repositories = $detectPatternController->detect();

        return view('lara-gen-adv::index');
    }
}
