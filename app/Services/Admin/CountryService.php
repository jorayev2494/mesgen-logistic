<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\Country;
use App\Repositories\Base\BaseRepository;
use App\Repositories\CountryRepository;
use App\Services\Admin\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CountryService extends BaseService
{
    /**
     * @var BaseRepository $repository
     */
    private BaseRepository $repository;

    /**
     * @param CountryRepository $repository
     */
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool $isAdmin
     * @return Collection
     */
    public function get(bool $isAdmin = false): Collection
    {
        return $isAdmin ? $this->repository->getAdmin()
                        : $this->repository->get([
                            'id',
                            'slug',
                            GetKeyByLocalePrefix::execute('title', true),
                        ]);
    }

    /**
     * @param int $id
     * @return Country|Model
     */
    public function show(int $id): Country
    {
        return $this->repository->find($id);
    }

    /**
     * @param array<string, object> $data
     * @return Country
     */
    public function store(array $data): Country
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array<string, object> $data
     * @return Country
     */
    public function update(int $id, array $data): Country
    {
        /** @var Country $foundCountry */
        $foundCountry = $this->repository->find($id);
        $foundCountry->update($data);

        return $foundCountry->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        /** @var Country $foundCountry */
        $foundCountry = $this->repository->find($id);
        $foundCountry->delete();
    }
}
