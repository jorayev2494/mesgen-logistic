<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Phone;
use App\Repositories\Base\CountryChildrenRepositoryContract;

class PhoneRepository extends CountryChildrenRepositoryContract
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Phone::class;
    }
}
