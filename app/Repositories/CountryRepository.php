<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Country::class;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                ->where('is_active', true)
                                ->orderBy('position')
                                ->orderBy('id')
                                ->get($columns);
    }
}
