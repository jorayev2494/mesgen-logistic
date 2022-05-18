<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\SearchBlogRequest;
use App\Services\BlogSearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogSearchController extends Controller
{
    public function __construct(
        private BlogSearchService $service
    )
    {
        
    }

    /**
     * @param SearchBlogRequest $request
     * @return JsonResponse
     */
    public function __invoke(SearchBlogRequest $request): JsonResponse
    {
        $result = $this->service->search($request->query->get('search'), $request->query->getInt('per_page'));

        return response()->json($result);
    }
}
