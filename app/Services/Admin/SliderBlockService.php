<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\SliderBlock;
use App\Repositories\SliderBlockRepository;
use App\Services\Admin\Base\BaseService;
use App\Services\Base\RestApiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
