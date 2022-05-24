<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\StepService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StepController extends Controller
{

    public function __construct(
        private StepService $service
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
            'icon',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true)
        ]);

        return response()->json($result);
    }
}
