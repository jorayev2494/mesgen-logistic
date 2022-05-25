<?php

namespace App\Http\Controllers;

use App\Services\BlogPopularService;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogPopularController extends Controller
{

    public function __construct(
        private BlogPopularService $service
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
        $result = $this->service->getPopular($request->query->getInt('limit'));

        return response()->json($result);
    }
}
