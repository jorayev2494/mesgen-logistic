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
class UserRepository extends BaseRepository
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
