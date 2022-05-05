<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\Base\RestApiRepository;

class PartnerRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Partner::class;
    }
}
