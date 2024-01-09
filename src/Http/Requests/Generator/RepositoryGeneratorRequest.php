<?php

namespace CSlant\LaravelGenerator\Http\Requests\Generator;

use CSlant\LaravelGenerator\Http\Requests\ApiRequest;

class RepositoryGeneratorRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'model' => 'required|string|max:255',
        ];
    }
}
