<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\RestApiRepository;
use Illuminate\Database\Eloquent\Collection;

class SliderRepository extends RestApiRepository
{
    public function getModel(): string
    {
        return Slider::class;
    }
}
