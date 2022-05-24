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
    public function __invoke(int $id = null): JsonResponse
    {

        $columns = [
            'id',
            GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true),
            'media',
            'extension',
            'created_at',
        ];

        if(!is_null($id))
        {
            $result = $this->service->find($id, $columns);
        } 
        else
        {
            $result = $this->service->index(columns: $columns);
        }


        return response()->json($result);
    }
}
