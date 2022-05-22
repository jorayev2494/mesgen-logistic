<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Admin\RestApiController;
use App\Http\Requests\Admin\AbautStep\StoreAboutStepRequest;
use App\Http\Requests\Admin\AbautStep\UpdateAboutStepRequest;
use App\Services\AboutStepService;
use Illuminate\Http\JsonResponse;

class AboutStepController extends RestApiController
{

    public function __construct(
        AboutStepService $service
    )
    {
        parent::__construct($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutStepRequest $request): JsonResponse
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
    public function update(UpdateAboutStepRequest $request, int $id)
    {
        return $this->restApiUpdate($request, $id);
    }
}
