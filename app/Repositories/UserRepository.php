<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * @className UserRepository
 * @package App\Repositories
 * @property User $model
 */
final class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return User::class;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()->get($columns);
    }

    /**
     * @param string $field
     * @param string $value
     * @param array $columns
     * @return User
     */
    public function whereBy(string $field, string $value, array $columns = ['*']): User
    {
        return $this->getModelClone()->newQuery()
                                    ->where($field, $value)
                                    ->firstOrFail($columns);
    }
}
