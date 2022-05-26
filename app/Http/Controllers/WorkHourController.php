<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Services\WorkHourService;
use Illuminate\Http\JsonResponse;

class WorkHourController extends Controller
{

    public function __construct(
        private WorkHourService $service
    )
    {
        
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $countryId): JsonResponse
    {
        $result = $this->service->get($countryId, columns: [
            'id',
            GetKeyByLocalePrefix::execute('title', true),
            'from',
            'to'
        ]);

        return response()->json($result);
    }
}
