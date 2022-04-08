<?php

namespace App\Repositories\Base;

use App\Repositories\Contracts\BaseModelRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin  Model
 */
abstract class BaseRepository implements BaseModelRepositoryContract
{
    /**
     * @var Model $model
     */
    protected Model $model;

    public function __construct()
    {
        $this->initializeRepository();
    }

    private function initializeRepository(): void
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * @return string
     */
    abstract public function getModel(): string;

    /**
     * @return Model
     */
    protected function getModelClone(): Model
    {
        return clone $this->model;
    }

    /**
     * @param string $name
     * @param array<object, object> $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->getModelClone()->newQuery()->$name(array_shift($arguments));
    }

    /**
     * @param int $id
     * @param array $columns
     * @return Model
     */
    public function find(int $id, array $columns = ['*']): Model
    {
        return $this->getModelClone()->newQuery()
                                    ->findOrFail($id, $columns);
    }

    /**
     * @param array<int, string> $columns
     * @return Collection
     */
    public function getAdmin(array $columns = array('*')): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }
}
