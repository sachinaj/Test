<?php

namespace App\Helpers;

trait ApiHelper
{

    public function sendResponse($success, $data = [], $message=null, $code=400, $appends=[])
    {
        $code = $success ? 200 : $code;

        if (is_null($message)) {
            $message  = $success ? "Operation Successfull":"Something went wrong";
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];

        $response = array_merge($response,$appends);
        if($data && sizeOf($data)>0)
            $response['data'] = $data;

        return response()->json($response, $code);
    }

    

}