<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    
    public function __construct(
        private BlogService $service
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
        $result = $this->service->getBlogs();

        return response()->json($result);
    }

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $result = $this->service->show($id);

        return response()->json($result);
    }
}
