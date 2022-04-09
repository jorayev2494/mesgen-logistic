<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Base\CountryChildrenRepositoryContract;

class AddressRepository extends CountryChildrenRepositoryContract
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Address::class;
    }
}
