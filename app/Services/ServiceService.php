<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use App\Services\Base\RestApiService;

class ServiceService extends RestApiService
{
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }
}