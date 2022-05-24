<?php

namespace App\Repositories;

use App\Models\Step;
use App\Repositories\Base\RestApiRepository;

class StepRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Step::class;
    }
}