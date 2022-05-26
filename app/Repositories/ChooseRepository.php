<?php

namespace App\Repositories;

use App\Models\Choose;
use App\Repositories\Base\RestApiRepository;

class ChooseRepository extends RestApiRepository
{
    public function getModel(): string
    {
        return Choose::class;   
    }
}