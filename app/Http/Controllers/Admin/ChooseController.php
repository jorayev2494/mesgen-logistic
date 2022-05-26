<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Choose\StoreChooseRequest;
use App\Http\Requests\Admin\Choose\UpdateChooseRequest;
use App\Services\ChooseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChooseController extends RestApiController
{

    public function __construct(ChooseService $service)
    {
        parent::__construct($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChooseRequest $request): JsonResponse
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
    public function update(UpdateChooseRequest $request, $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
