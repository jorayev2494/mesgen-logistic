<?php

namespace App\Http\Controllers\About;

use App\Helpers\GetKeyByLocalePrefix;
use App\Http\Controllers\Controller;
use App\Services\AboutStepService;
use Illuminate\Http\JsonResponse;

class AboutStepController extends Controller
{

    public function __construct(
        private AboutStepService $service
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
        $result = $this->service->index(false, [
            'id',
            GetKeyByLocalePrefix::execute('char', true),
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true)
        ]);

        return response()->json($result);
    }
}
