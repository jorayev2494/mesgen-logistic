<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Social;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class SocialRepository extends BaseRepository
{
    /**
     * @return string
     */
    function getModel(): string
    {
        return Social::class;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function getAdmin(array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->where('is_active', true)
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }
}
