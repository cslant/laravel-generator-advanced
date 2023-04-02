<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers\Generator;

use Illuminate\Http\Request;
use TanHongIT\LaravelGenerator\Http\Controllers\Detect\DetectController;
use TanHongIT\LaravelGenerator\Http\Requests\Generator\RepositoryGeneratorRequest;

class RepositoryGeneratorController extends GeneratorController
{
    protected DetectController $detectController;

    public function __construct(
        DetectController $detectController
    ) {
        $this->detectController = $detectController;
    }

    public function index(Request $request)
    {
        return view('laravel-generator::generator.repository');
    }

    public function generate(RepositoryGeneratorRequest $request)
    {
        $model = $request->input('model');
    }

}