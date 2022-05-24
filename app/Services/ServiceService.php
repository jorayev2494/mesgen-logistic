<?php

namespace App\Services;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use App\Services\Base\RestApiService;

class ServiceService extends RestApiService
{
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param integer $id
     * @param array $columns
     * @return Service
     */
    public function find(int $id, array $columns = ['*']): Service
    {
        return $this->repository->find($id, $columns);
    }
}