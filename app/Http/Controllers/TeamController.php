<?php

namespace App\Http\Controllers;

use App\Services\TeamService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function __construct(
        private TeamService $service
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
        $result = $this->service->getTeam();

        return response()->json($result);
    }
}
