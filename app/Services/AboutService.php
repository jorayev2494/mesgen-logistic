<?php

namespace App\Services;

use App\Repositories\AboutRepository;
use App\Services\Base\RestApiService;

class AboutService extends RestApiService
{
    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }
}
