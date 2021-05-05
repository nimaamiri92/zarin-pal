<?php

namespace App\Tools;

use Illuminate\Http\JsonResponse;

class ResponseTool
{
    public static function response(int $code, $result): JsonResponse
    {
        return response()->json($result,$code);
    }
}