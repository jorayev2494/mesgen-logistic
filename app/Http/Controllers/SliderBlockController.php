<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\Admin\SliderBlockService;
use Illuminate\Http\JsonResponse;

class SliderBlockController extends Controller
{
    /**
     * @param SliderBlockService $service
     * @return JsonResponse
     */
    public function __invoke(SliderBlockService $service): JsonResponse
    {
        $result = $service->index(auth()->check(), [
            'icon',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true),
        ]);

        return response()->json($result);
    }
}
