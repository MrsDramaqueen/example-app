<?php

namespace App\Service\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait Responses
{
    public function responseSuccess($data): JsonResponse
    {
        return \response()->json([
            'data' => $data,
            'message' => 'Success',
        ], Response::HTTP_OK);
    }

    public function responseError(\Exception $e): JsonResponse
    {
        return \response()->json([
            'data' => [],
            'message' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
