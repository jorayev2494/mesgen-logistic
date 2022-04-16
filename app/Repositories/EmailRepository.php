<?php

namespace App\Repositories;

use App\Models\Email;
use App\Repositories\Base\RestApiRepository;

class EmailRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Email::class;
    }
}
