<?php

namespace App\Services\Admin;

use App\Repositories\PartnerRepository;
use App\Services\Base\RestApiService;

class PartnerService extends RestApiService
{
    /**
     * @param PartnerRepository $repository
     */
    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }
}
