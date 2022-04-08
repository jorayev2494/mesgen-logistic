<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SliderRepository extends BaseRepository
{
    public function getModel(): string
    {
        return Slider::class;
    }

    /**
     * @param array<int, string> $columns
     * @return Collection
     */
    public function get(array $columns = array('*')): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->where('is_active', true)
                                    ->orderBy('position')
                                    ->orderBy('id')
                                    ->get($columns);
    }
}
