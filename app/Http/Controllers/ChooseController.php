<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\ChooseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChooseController extends Controller
{

    public function __construct(
        private ChooseService $service
    )
    {
        
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->service->index(columns:[
            'id',
            'icon',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true)
        ]);

        return response()->json($result);
    }
}
