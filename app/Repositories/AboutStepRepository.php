<?php

namespace App\Repositories;

use App\Models\AboutStep;
use App\Repositories\Base\RestApiRepository;

class AboutStepRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return AboutStep::class;
    }
}