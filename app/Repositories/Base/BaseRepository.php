<?php

namespace App\Repositories\Base;

use App\Repositories\Contracts\BaseModelRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin  Model
 */
abstract class BaseRepository implements BaseModelRepositoryInterface
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
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function get(bool $isAdmin = false, array $columns = array('*')): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->when(
                                        $isAdmin,
                                        fn (Builder $query): Builder => $query,
                                        fn (Builder $query): Builder => $query->where('is_active', true))
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }
}
