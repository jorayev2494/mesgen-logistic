<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CreateCountryRequest;
use App\Http\Requests\Admin\Country\UpdateCountryRequest;
use App\Services\Admin\CountryService;
use App\Services\Base\RestApiService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class RestApiController extends Controller
{
    /**
     * @var RestApiService $service
     */
    protected RestApiService $service;

    /**
     * @param RestApiService $service
     */
    public function __construct(RestApiService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $result = $this->service->index(auth()->check());

        return response()->json($result);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function restApiStore(FormRequest $request): JsonResponse
    {
        $result = $this->service->store($request->validated());

        return response()->json($result);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $result = $this->service->show($id);

        return response()->json($result);
    }

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function restApiUpdate(FormRequest $request, int $id): JsonResponse
    {
        $result = $this->service->update($id, $request->validated());

        return response()->json($result);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $this->service->destroy($id);

        return response()->noContent();
    }
}
