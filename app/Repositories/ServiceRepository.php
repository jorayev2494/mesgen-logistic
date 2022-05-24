<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Base\RestApiRepository;

class ServiceRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Service::class;
    }
}