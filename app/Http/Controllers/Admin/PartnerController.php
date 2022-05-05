<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Partner\StorePartnerRequest;
use App\Http\Requests\Admin\Partner\UpdatePartnerRequest;
use App\Services\Admin\PartnerService;
use Illuminate\Http\JsonResponse;

class PartnerController extends RestApiController
{
    /**
     * @param PartnerService $service
     */
    public function __construct(PartnerService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param StorePartnerRequest $request
     * @return JsonResponse
     */
    public function store(StorePartnerRequest $request): JsonResponse
    {
        return $this->restApiStore($request);
    }

    /**
     * @param UpdatePartnerRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdatePartnerRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
