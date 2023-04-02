<?php

namespace TanHongIT\LaravelGenerator\Http\Requests\Generator;

use TanHongIT\LaravelGenerator\Http\Requests\ApiRequest;

class RepositoryGeneratorRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'model' => 'required|string|max:255',
        ];
    }
}
