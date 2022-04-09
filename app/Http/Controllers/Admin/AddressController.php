<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Base\CountryChildrenController;
use App\Http\Requests\Admin\Country\Address\CreateAddressRequest;
use App\Http\Requests\Admin\Country\Address\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use App\Services\Admin\CountryChildrenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AddressController extends CountryChildrenController
{
    /**
     * @param AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->service = new CountryChildrenService($repository);
    }

    /**
     * @param CreateAddressRequest $request
     * @param int $countryId
     * @return JsonResponse
     */
    public function store(CreateAddressRequest $request, int $countryId): JsonResponse
    {
        $result = $this->service->storeByCountryId($countryId, $request->validated());

        return response()->json($result);
    }

    /**
     * @param UpdateAddressRequest $request
     * @param int $countryId
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAddressRequest $request, int $countryId, int $id): JsonResponse
    {
        $result = $this->service->updateByCountryId($countryId, $id, $request->validated());

        return response()->json($result, Response::HTTP_ACCEPTED);
    }
}
