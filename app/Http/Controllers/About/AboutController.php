<?php

namespace App\Http\Controllers\About;

use App\Helpers\GetKeyByLocalePrefix;
use App\Http\Controllers\Controller;
use App\Repositories\AboutRepository;
use App\Services\AboutService;
use App\Services\Base\RestApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * @var RestApiService $service
     */
    private RestApiService $service;

    public function __construct(AboutService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     */
    public function about(): JsonResponse
    {
        $result = $this->service->index(auth()->check(), [
            'media',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true),
            'extension'
        ]);

        return response()->json($result);
    }
}
