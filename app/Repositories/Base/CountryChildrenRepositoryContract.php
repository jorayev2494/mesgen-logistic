<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;

abstract class CountryChildrenRepositoryContract extends BaseRepository
{
    /**
     * @param int $countryId
     * @param array $columns
     * @return Collection
     */
    public function getByCountryIdForAdmin(int $countryId, array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
            ->where('country_id', $countryId)
            ->orderBy('position')
            ->orderBy('id')
            ->get($columns);
    }

    /**
     * @param int $countryId
     * @param array $columns
     * @return Collection
     */
    public function getByCountryId(int $countryId, array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
            ->where('is_active', true)
            ->where('country_id', $countryId)
            ->orderBy('position')
            ->orderBy('id')
            ->get($columns);
    }
}
