<?php

namespace Lbil\LaravelGenerator\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class ApiRequest.
 * @package Lbil\LaravelGenerator\Http\Requests
 *
 * This class is used to handle the validation error response. It will return the error message in JSON format.
 */
abstract class ApiRequest extends FormRequest
{
    /**
     * @param Validator $validator
     *
     * @return void
     */
    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'message' => $validator->errors()->toArray(),
            ], ResponseAlias::HTTP_BAD_REQUEST, [], JSON_UNESCAPED_UNICODE)
        );
    }
}
