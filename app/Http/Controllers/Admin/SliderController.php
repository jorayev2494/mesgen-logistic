<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Services\Admin\SliderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SliderController extends RestApiController
{
    /**
     * @param SliderService $service
     */
    public function __construct(SliderService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request): JsonResponse
    {
        $storedSlider = $this->service->store($request->validated());

        return response()->json($storedSlider, Response::HTTP_CREATED);
    }

    /**
     * @param UpdateSliderRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateSliderRequest $request, int $id): JsonResponse
    {
        $updatedSlider = $this->service->update($id, $request->validated());

        return response()->json($updatedSlider, Response::HTTP_ACCEPTED);
    }
}
