<?php

namespace CSlant\LaraGenAdv\Http\Requests\Generator;

use CSlant\LaraGenAdv\Http\Requests\ApiRequest;

class RepositoryGeneratorRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'model' => 'required|string|max:255',
        ];
    }
}
