<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WorkHour\StoreWorkHourRequest;
use App\Http\Requests\Admin\WorkHour\UpdateWorkHourRequest;
use App\Services\WorkHourService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkHourController extends RestApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(WorkHourService $service)
    {
        parent::__construct($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkHourRequest $request): JsonResponse
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
    public function update(UpdateWorkHourRequest $request, $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
