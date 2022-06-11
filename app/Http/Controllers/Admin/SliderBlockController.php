<?php

namespace App\Http\Controllers\Admin;


use App\Services\Admin\SliderBlockService;
use Illuminate\Http\JsonResponse;

class SliderBlockController extends RestApiController
{
    /**
     * @param SliderBlockService $service
     */
    public function __construct(SliderBlockService $service)
    {
        parent::__construct($service);
    }

    public function update(\App\Http\Requests\Admin\SliderBlock\UpdateSliderBlockRequest $request, int $id): JsonResponse
    {
        return $this->restApiUpdate($request, $id);
    }
}
