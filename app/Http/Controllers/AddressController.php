<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Repositories\AddressRepository;
use App\Services\Admin\Contracts\CountryChildrenServiceContract;
use App\Services\Admin\CountryChildrenService;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    private CountryChildrenServiceContract $service;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->service = new CountryChildrenService($addressRepository);
    }

    /**
     * @param int $countryId
     * @return JsonResponse
     */
    public function __invoke(int $countryId): JsonResponse
    {
        $result = $this->service->getByCountryId($countryId, auth()->check(), $this->getClientColumns());

        return response()->json($result);
    }

    /**
     * @return array
     */
    public function getClientColumns(): array
    {
        return [
            'country_id',
            GetKeyByLocalePrefix::execute('address', true)
        ];
    }
}
