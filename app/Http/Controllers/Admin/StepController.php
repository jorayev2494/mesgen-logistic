<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Step\StoreStepRequest;
use App\Http\Requests\Admin\Step\UpdateStepRequest;
use App\Services\StepService;
use Illuminate\Http\JsonResponse;

class StepController extends RestApiController
{
    public function __construct(
        StepService $service
    )
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStepRequest $request): JsonResponse
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
    public function update(UpdateStepRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
