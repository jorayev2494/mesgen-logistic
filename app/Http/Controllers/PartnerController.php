<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\Admin\PartnerService;
use Illuminate\Http\JsonResponse;

class PartnerController extends Controller
{

    /**
     * @param PartnerService $service
     * @return JsonResponse
     */
    public function __invoke(PartnerService $service): JsonResponse
    {
        $result = $service->index(auth()->check(), [
            'id',
            GetKeyByLocalePrefix::execute('title', true),
            'link',
            'media',
            'extension'
        ]);

        return response()->json($result);
    }
}
