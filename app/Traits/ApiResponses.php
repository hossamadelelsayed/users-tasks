<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    public function success($data = null, ?string $message = ''): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message,
        ], config('request.rsp_success', 200));
    }

    public function unprocessable(string $message = ''): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'code' => config('request.rsp_unprocessable'),
        ], config('request.rsp_unprocessable'));
    }

    public function not_found(string $message = ''): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'code' => config('request.rsp_not_found'),
        ], config('request.rsp_not_found'));
    }

    public function internal_error(string $message = ''): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'code' => config('request.rsp_internal_server_error'),
        ], config('request.rsp_internal_server_error'));
    }

    public function forbidden(string $message = ''): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'code' => config('request.rsp_forbidden'),
        ], config('request.rsp_forbidden'));
    }
}
