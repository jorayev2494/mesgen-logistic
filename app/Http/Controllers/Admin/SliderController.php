<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Services\Admin\SliderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    /**
     * @var SliderService $service
     */
    private SliderService $service;

    /**
     * @param SliderService $service
     */
    public function __construct(SliderService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $sliders = $this->service->get(true);

        return response()->json($sliders);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $showSlider = $this->service->show($id);

        return response()->json($showSlider);
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
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSliderRequest $request, int $id): JsonResponse
    {
        $updatedSlider = $this->service->update($id, $request->validated());

        return response()->json($updatedSlider, Response::HTTP_ACCEPTED);
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->service->destroy($id);

        return response()->noContent();
    }
}
