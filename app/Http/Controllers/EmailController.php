<?php

namespace App\Http\Controllers;

use App\Services\Admin\EmailService;
use Illuminate\Http\JsonResponse;

class EmailController extends Controller
{
    /**
     * @param EmailService $service
     * @return JsonResponse
     */
    public function __invoke(EmailService $service): JsonResponse
    {
        $result = $service->index(auth()->check(), ['email']);

        return response()->json($result);
    }
}
