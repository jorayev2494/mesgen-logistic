<?php

namespace App\Services;

use App\Repositories\ChooseRepository;
use App\Services\Base\RestApiService;

class ChooseService extends RestApiService
{
    public function __construct(
        ChooseRepository $repository
    )
    {
        $this->repository = $repository;        
    }
}