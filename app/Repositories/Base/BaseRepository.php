<?php

namespace App\Repositories\Base;

use App\Repositories\Contracts\BaseModelRepositoryContract;
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
}
