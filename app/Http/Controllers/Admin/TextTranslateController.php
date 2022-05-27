<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TextTranslate\StoreTextTranslateRequest;
use App\Http\Requests\Admin\TextTranslate\UpdateTextTranslateRequest;
use App\Services\TextTranslateService;
use Illuminate\Http\JsonResponse;

class TextTranslateController extends RestApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TextTranslateService $service)
    {
        parent::__construct($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextTranslateRequest $request): JsonResponse
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
    public function update(UpdateTextTranslateRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
