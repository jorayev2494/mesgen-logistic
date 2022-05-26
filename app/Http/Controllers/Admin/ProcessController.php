<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Process\StoreProcessRequest;
use App\Http\Requests\Admin\Process\UpdateProcessRequest;
use App\Services\ProcessService;
use Illuminate\Http\Request;

class ProcessController extends RestApiController
{

    public function __construct(ProcessService $service)
    {
        parent::__construct($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcessRequest $request)
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
    public function update(UpdateProcessRequest $request, int $id)
    {
        return $this->restApiUpdate($request, $id);
    }
}
