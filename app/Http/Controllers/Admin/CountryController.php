<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CreateCountryRequest;
use App\Http\Requests\Admin\Country\UpdateCountryRequest;
use App\Services\Admin\CountryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * @var CountryService $service
     */
    private CountryService $service;

    /**
     * @param CountryService $service
     */
    public function __construct(CountryService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $result = $this->service->get(true);

        return response()->json($result);
    }

    /**
     * @param CreateCountryRequest $request
     * @return JsonResponse
     */
    public function store(CreateCountryRequest $request): JsonResponse
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
     * @param UpdateCountryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateCountryRequest $request, int $id): JsonResponse
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
