<?php

namespace App\Http\Helpers;

use Illuminate\Support\Arr;

class Response
{
    public static function fail($extraData = "", $statusCode = 422, $throwResponse = true)
    {

        $message = ($hasExtraData = is_array($extraData)) ? "An error has occured" : $extraData;

        $data['status'] = "error";
        $data['message'] = $message;

        !$hasExtraData ?: $data['errors'] = $extraData;

        $response = static::build($data, $statusCode);

        if ($throwResponse) {
            $response->throwResponse();
        }

        return $response;

    }

    public static function success($extraData, $statusCode = 200)
    {
        $message = ($hasExtraData = is_array($extraData)) ? "success" : $extraData;

        $data['status'] = "success";
        $data['message'] = $message;

        $data = $hasExtraData ? array_merge($data, $extraData) : $data;

        return static::build($data, $statusCode);
    }

    public static function unauthorized($message = "", $statusCode = 401, $throwResponse = true)
    {

        $message = (empty($message)) ? "Unauthorized User" : $message;
        $data['status'] = "unauthorized";
        $data['message'] = $message;

        $response = static::build($data, $statusCode);

        if ($throwResponse) {
            $response->throwResponse();
        }

        return $response;

    }



    public static function build($data, $statusCode)
    {
        return response()->json(['data' => $data], $statusCode);
    }

    public static function failedValidationResponse($message, $errorMessages)
    {

        return static::build([
            'status' => 'error',
            'message'=> $message,
            'errors' => $errorMessages,
        ], 422);
    }
}
