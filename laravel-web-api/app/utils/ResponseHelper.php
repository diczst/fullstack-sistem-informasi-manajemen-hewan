<?php

namespace App\utils;

class ResponseHelper
{
    /**
     * Generate a JSON response.
     *
     * @param int $code HTTP status code
     * @param string $message Response message
     * @param mixed $data Additional data to include in the response
     * @return \Illuminate\Http\JsonResponse
     */
    public static function jsonResponse(int $code, string $message, $data = null)
    {
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $code);
    }
}
