<?php

namespace App\Http\Controllers\Admin;


use App\Services\Admin\SliderBlockService;

class SliderBlockController extends RestApiController
{
    /**
     * @param SliderBlockService $service
     */
    public function __construct(SliderBlockService $service)
    {
        parent::__construct($service);
    }
}
