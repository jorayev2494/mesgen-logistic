<?php

namespace App\Http\Controllers;

use App\Helpers\GetKeyByLocalePrefix;
use App\Repositories\PhoneRepository;
use App\Services\Admin\Contracts\CountryChildrenServiceContract;
use App\Services\Admin\CountryChildrenService;
use Illuminate\Http\JsonResponse;

class PhoneController extends Controller
{
    /**
     * @var CountryChildrenServiceContract|CountryChildrenService $service
     */
    private CountryChildrenServiceContract $service;

    /**
     * @param PhoneRepository $repository
     */
    public function __construct(PhoneRepository $repository)
    {
        $this->service = new CountryChildrenService($repository);
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
            GetKeyByLocalePrefix::execute('title', true),
            'value'
        ];
    }
}
