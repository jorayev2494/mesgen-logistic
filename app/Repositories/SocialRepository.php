<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Social;
use App\Repositories\Base\RestApiRepository;

final class SocialRepository extends RestApiRepository
{
    /**
     * @return string
     */
    function getModel(): string
    {
        return Social::class;
    }
}
