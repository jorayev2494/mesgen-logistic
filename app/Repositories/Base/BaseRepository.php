<?php

namespace App\Repositories\Base;

use App\Repositories\Contracts\BaseModelRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
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

    /**
     * @var array $columns
     */
    private $columns = ['*'];

    /**
     * @var array $with
     */
    private $with = [];

    /**
     * @var array $withCount
     */
    private $withCount = [];

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
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     * @return self
     */
    public function setColumns(array $columns = ['*']): self
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return array
     */
    public function getWith(): array
    {
        return $this->with;
    }

    /**
     * @param array $with
     * @return self
     */
    public function setWith(array $with = []): self
    {
        $this->with = $with;

        return $this;
    }

    /**
     * @return array
     */
    public function getWithCount(): array
    {
        return $this->withCount;
    }

    /**
     * @param array $withCount
     * @return self
     */
    public function setWithCount(array $withCount = []): self
    {
        $this->withCount = $withCount;

        return $this;
    }

    /**
     * @param string $name
     * @param array<object, object> $arguments
     * @return mixed
     */
    public function __call(string $name, array $parameters): mixed
    {
        return $this->getModelClone()->newQuery()->$name(array_shift($parameters));
    }

    /**
     * @param int $id
     * @param array $columns
     * @return Model
     */
    public function find(int $id, array $columns = ['*']): Model
    {
        $columns = $columns !== $this->getColumns() ? $this->getColumns() : $columns;

        return $this->getModelClone()->newQuery()
                                    ->select($columns)
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->findOrFail($id);
    }

    /**
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function get(bool $isAdmin = false, array $columns = array('*')): Collection
    {
        $columns = $columns === $this->getColumns() ? $columns : $this->getColumns();

        return $this->getModelClone()->newQuery()
                                    ->select($columns)
                                    ->when(
                                        fn (Builder $query): bool => in_array('is_active', $query->getModel()->getFillable()) || $isAdmin,
                                        fn (Builder $query): Builder => $query->where('is_active', true),
                                        fn (Builder $query): Builder => $query
                                    )
                                    ->when(
                                        fn (Builder $query): bool => in_array('position', $query->getModel()->getFillable()),
                                        fn (Builder $query): Builder => $query->orderBy('position'),
                                        fn (Builder $query): Builder => $query
                                    )
                                    ->orderBy('id')
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->get();
    }

    /**
     * @param boolean $isAdmin
     * @param array $columns
     * @return Paginator
     */
    public function getPaginate(bool $isAdmin = false, int $perPage = null): Paginator
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->when(
                                        $isAdmin,
                                        fn (Builder $query): Builder => $query,
                                        fn (Builder $query): Builder => $query->where('is_active', true))
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->paginate($perPage);
    }
}
