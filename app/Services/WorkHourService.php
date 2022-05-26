<?php

namespace App\Services;

use App\Repositories\WorkHourRepository;
use App\Services\Base\RestApiService;
use Illuminate\Database\Eloquent\Collection;

class WorkHourService extends RestApiService
{
    public function __construct(WorkHourRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param integer $countryId
     * @param array $columns
     * @return Collection
     */
    public function get(int $countryId, array $columns = ['*']): Collection
    {
        return $this->repository->setColumns($columns)->whereByCountry($countryId, $columns);
    }
}