<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Admin\SocialService;
use Illuminate\Http\JsonResponse;


class SocialController extends Controller
{
    /**
     * @param SocialService $service
     * @return JsonResponse
     */
    public function __invoke(SocialService $service): JsonResponse
    {
        $result = $service->index(auth()->check(), ['slug', 'link']);

        return response()->json($result);
    }
}
