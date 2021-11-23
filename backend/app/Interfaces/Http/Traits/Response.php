<?php

namespace Interfaces\Http\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait Response
{
    protected function send($data = [], $message = '', $code = 200){
        return response()->json([
            'success' => true,
            'code'    => $code,
            'data'    => $data,
            'message' => $message
        ])->setStatusCode($code);
    }

    protected function error($data = [], $message = '', $code = 404){
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'code'    => $code,
                'error'   => $data,
                'message' => $message
            ])->setStatusCode($code)
        );

    }

}
