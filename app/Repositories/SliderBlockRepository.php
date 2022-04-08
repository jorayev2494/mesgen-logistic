<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\SliderBlock;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SliderBlockRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return SliderBlock::class;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function get(array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }
}
