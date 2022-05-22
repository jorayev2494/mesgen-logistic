<?php

namespace App\Services;

use App\Repositories\AboutStepRepository;
use App\Services\Base\RestApiService;

class AboutStepService extends RestApiService
{
    public function __construct(AboutStepRepository $repository)
    {
        $this->repository = $repository;
    }
}