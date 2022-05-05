<?php

namespace App\Repositories;

use App\Models\About;
use App\Repositories\Base\RestApiRepository;

class AboutRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return About::class;
    }
}
