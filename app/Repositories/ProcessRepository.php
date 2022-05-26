<?php

namespace App\Repositories;

use App\Models\Process;
use App\Repositories\Base\RestApiRepository;

class ProcessRepository extends RestApiRepository
{
    public function getModel(): string
    {
        return Process::class;
    }
}