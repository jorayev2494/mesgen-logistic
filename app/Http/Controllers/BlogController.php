<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogByRequest;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->service->getBlogs(false, $request->query->getInt('per_page'));

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

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function getBlogsByTag(Request $request, int $id): JsonResponse
    {
        $result = $this->service->getBlogsByTag($id, $request->query->getInt('per_page'));

        return response()->json($result);
    }


    /**
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function getBlogsByCategory(Request $request, int $id): JsonResponse
    {
        $result = $this->service->getBlogsByCategory($id, $request->query->getInt('per_page'));

        return response()->json($result);
    }
}
