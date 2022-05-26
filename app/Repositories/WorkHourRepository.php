<?php

namespace App\Repositories;

use App\Models\WorkHour;
use App\Repositories\Base\RestApiRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;

class WorkHourRepository extends RestApiRepository
{
    public function getModel(): string
    {
        return WorkHour::class;
    }

    /**
     * @param string $field
     * @param string $value
     * @param integer|null $perPage
     * @return Paginator
     */
    public function whereByCountry(int $countryId, array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->where('country_id', $countryId)
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->get();
    }
}