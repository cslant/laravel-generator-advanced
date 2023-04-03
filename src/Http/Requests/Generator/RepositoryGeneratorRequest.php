<?php

namespace Lbil\LaravelGenerator\Http\Requests\Generator;

use Lbil\LaravelGenerator\Http\Requests\ApiRequest;

class RepositoryGeneratorRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'model' => 'required|string|max:255',
        ];
    }
}
