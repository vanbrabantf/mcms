<?php

namespace Infrastructure\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param String $message
     * @throws HttpResponseException
     */
    protected function returnBadParameterError(String $message): void
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => $message,
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
