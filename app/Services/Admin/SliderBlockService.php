<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Repositories\SliderBlockRepository;
use App\Services\Base\RestApiService;

class SliderBlockService extends RestApiService
{
    /**
     * @param SliderBlockRepository $repository
     */
    public function __construct(SliderBlockRepository $repository)
    {
        $this->repository = $repository;
    }
}
