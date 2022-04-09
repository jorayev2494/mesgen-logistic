<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\Address;
use App\Models\Phone;
use App\Repositories\Base\CountryChildrenRepositoryContract;
use App\Services\Admin\Base\BaseService;
use App\Services\Admin\Contracts\CountryChildrenServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CountryChildrenService extends BaseService implements CountryChildrenServiceContract
{
    /**
     * @var CountryChildrenRepositoryContract $repository
     */
    private CountryChildrenRepositoryContract $repository;

    public function __construct(CountryChildrenRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $countryId
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function getByCountryId(int $countryId, bool $isAdmin = false, array $columns = ['*']): Collection
    {
        return $isAdmin ? $this->repository->getByCountryIdForAdmin($countryId)
                        : $this->repository->getByCountryId($countryId, $columns);
    }

    /**
     * @param int $countryId
     * @param array $data
     * @return Phone
     */
    public function storeByCountryId(int $countryId, array $data): Phone
    {
        return $this->repository->create(
            array_merge($data, ['country_id' => $countryId])
        );
    }

    /**
     * @param int $countryId
     * @param int $id
     * @return Phone|Model
     */
    public function showByCountryId(int $countryId, int $id): Phone
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $countryId
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function updateByCountryId(int $countryId, int $id, array $data): Model
    {
        /** @var Address $foundAddress */
        $foundAddress = $this->repository->find($id);
        $foundAddress->update($data);

        return $foundAddress->refresh();
    }

    /**
     * @param int $countryId
     * @param int $id
     * @return void
     */
    public function destroyByCountryId(int $countryId, int $id): void
    {
        /** @var Address $foundAddress */
        $foundAddress = $this->repository->find($id);
        $foundAddress->delete();
    }
}
