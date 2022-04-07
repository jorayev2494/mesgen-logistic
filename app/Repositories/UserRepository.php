<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;

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
