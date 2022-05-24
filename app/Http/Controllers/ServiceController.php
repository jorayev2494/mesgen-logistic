<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{

    public function __construct(
        private ServiceService $service
    )
    {
        
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): JsonResponse
    {
        $result = $this->service->index(columns: [
            'id',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true),
            'media',
            'extension',
            'created_at',
        ]);

        return response()->json($result);
    }
}
