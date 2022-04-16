<?php

namespace App\Services\Base;

use App\Repositories\Base\RestApiRepository;
use App\Services\Contracts\RestApiServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class RestApiService implements RestApiServiceInterface
{
    /**
     * @var RestApiRepository $repository
     */
    protected RestApiRepository $repository;

    /**
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function index(bool $isAdmin = false, array $columns = ['*']): Collection
    {
        return  $this->repository->get($isAdmin, $columns);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        /** @var Model $foundModel */
        $foundModel = $this->repository->find($id);
        $foundModel->update($data);

        return $foundModel->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $foundModel = $this->repository->find($id);
        $foundModel->delete();
    }

}
