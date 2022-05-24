<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestApiController;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends RestApiController
{

    /**
     * @param ServiceService $service
     */
    public function __construct(ServiceService $service)
    {
        parent::__construct($service);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request): JsonResponse
    {
        return $this->restApiStore($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
