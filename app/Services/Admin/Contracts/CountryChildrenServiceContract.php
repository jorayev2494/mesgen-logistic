<?php

namespace App\Services\Admin\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CountryChildrenServiceContract
{
    /**
     * @param int $countryId
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function getByCountryId(int $countryId, bool $isAdmin = false, array $columns = ['*']): Collection;

    /**
     * @param int $countryId
     * @param array $data
     * @return Model
     */
    public function storeByCountryId(int $countryId, array $data): Model;

    /**
     * @param int $countryId
     * @param int $id
     * @return Model
     */
    public function showByCountryId(int $countryId, int $id): Model;

    /**
     * @param int $countryId
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function updateByCountryId(int $countryId, int $id, array $data): Model;

    /**
     * @param int $countryId
     * @param int $id
     * @return void
     */
    public function destroyByCountryId(int $countryId, int $id): void;
}
