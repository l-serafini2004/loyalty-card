<?php

namespace App\Traits;

trait HttpResponses{
    protected function success($data, $message = null, $code = 200){
        return response()->json([
            "status" => "Request was successful.",
            "message" => $message,
            "data" => $data
        ], $code);
    }

    protected function error($data, $message, $code ){
        return response()->json([
            "status" => "Something was wrong.",
            "message" => $message,
            "data" => $data
        ], $code);
    }

}
