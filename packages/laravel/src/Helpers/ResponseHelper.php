<?php

namespace Laravel\Helpers;

/**
 * ResponseHelper provides standardized API response formatting.
 * Utility class for creating consistent JSON responses.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class ResponseHelper
{
    /**
     * Return a successful JSON response.
     *
     * @param mixed $data The data to return
     * @param string $message Success message
     * @param int $code HTTP status code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message Error message
     * @param int $code HTTP status code
     * @param mixed $errors Additional error details
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message = 'Error', $code = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}
