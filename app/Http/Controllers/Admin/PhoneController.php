<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Base\CountryChildrenController;
use App\Http\Requests\Admin\Country\Phone\CreatePhoneRequest;
use App\Http\Requests\Admin\Country\Phone\UpdatePhoneRequest;
use App\Repositories\PhoneRepository;
use App\Services\Admin\CountryChildrenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PhoneController extends CountryChildrenController
{
    /**
     * @param PhoneRepository $repository
     */
    public function __construct(PhoneRepository $repository)
    {
        $this->service = new CountryChildrenService($repository);
    }

    /**
     * @param CreatePhoneRequest $request
     * @param int $countryId
     * @return JsonResponse
     */
    public function store(CreatePhoneRequest $request, int $countryId): JsonResponse
    {
        $result = $this->service->storeByCountryId($countryId, $request->validated());

        return response()->json($result);
    }

    /**
     * @param UpdatePhoneRequest $request
     * @param int $countryId
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdatePhoneRequest $request, int $countryId, int $id): JsonResponse
    {
        $result = $this->service->updateByCountryId($countryId, $id, $request->validated());

        return response()->json($result, Response::HTTP_ACCEPTED);
    }
}
