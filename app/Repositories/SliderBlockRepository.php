<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\SliderBlock;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\RestApiRepository;
use Illuminate\Database\Eloquent\Collection;

class SliderBlockRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return SliderBlock::class;
    }
}
