<?php

namespace App\Http\Controllers\Admin\Base;

use App\Http\Controllers\Controller;
use App\Services\Admin\Contracts\CountryChildrenServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class CountryChildrenController extends Controller
{
    /**
     * @var CountryChildrenServiceContract $service
     */
    protected CountryChildrenServiceContract $service;

    /**
     * @param int $countryId
     * @return JsonResponse
     */
    public function index(int $countryId): JsonResponse
    {
        $result = $this->service->getByCountryId($countryId, auth()->check());

        return response()->json($result);
    }

    /**
     * @param int $countryId
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $countryId, int $id): JsonResponse
    {
        $result = $this->service->showByCountryId($countryId, $id);

        return response()->json($result);
    }

    /**
     * @param int $countryId
     * @param int $id
     * @return Response
     */
    public function destroy(int $countryId, int $id): Response
    {
        $this->service->destroyByCountryId($countryId, $id);

        return response()->noContent();
    }
}
