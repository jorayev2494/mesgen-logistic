<?php

namespace App\Http\Controllers;

use App\Services\BlogCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function __construct(
        private BlogCategoryService $service
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
        $result = $this->service->index(false);

        return response()->json($result);
    }
}
