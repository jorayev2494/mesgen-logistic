<?php

namespace App\Services;

use App\Repositories\ProcessRepository;
use App\Services\Base\RestApiService;

class ProcessService extends RestApiService
{
    public function __construct(ProcessRepository $repository)
    {
        $this->repository = $repository;
    }
}