<?php

namespace App\Services\Admin;

use App\Repositories\SliderRepository;
use App\Services\Base\RestApiService;

class SliderService extends RestApiService
{
    /**
     * @param SliderRepository $repository
     */
    public function __construct(SliderRepository $repository)
    {
        $this->repository = $repository;
    }
}
