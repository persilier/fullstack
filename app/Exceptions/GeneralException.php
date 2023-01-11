<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GeneralException extends Exception
{
    public function report (){
        //
    }

    public function render($request): JsonResponse
    {
        return new JsonResponse([
            'error' =>[
                'message' =>$this->getMessage(),
            ]
        ],$this->code);
    }
}
