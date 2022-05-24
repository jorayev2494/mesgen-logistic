<?php

namespace App\Services;

use App\Repositories\StepRepository;
use App\Services\Base\RestApiService;

class StepService extends RestApiService
{
    public function __construct(StepRepository $repository)
    {
        $this->repository = $repository;
    }
}