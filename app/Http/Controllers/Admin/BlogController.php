<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Models\User;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{

    /**
     * @var User|null
     */
    private ?User $authUser;

    public function __construct(
        private BlogService $service
    )
    {
        $this->middleware('auth:api');
        $this->authUser = auth()->guard('api')->user();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $result = $this->service->index();

        return response()->json($result);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request): JsonResponse
    {
        $result = $this->service->store($this->authUser, $request->validated());

        return response()->json($result);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $result = $this->service->show($id);

        return response()->json($result);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, int $id): JsonResponse
    {
        $result = $this->service->update($this->authUser, $id, $request->validated());

        return response()->json($result);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->service->destroy($id);

        return response()->noContent();
    }
}
