<?php

namespace Interfaces\Http\Traits;

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

    protected function error(){

    }

}
