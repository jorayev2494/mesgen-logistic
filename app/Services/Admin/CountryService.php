<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\Country;
use App\Repositories\Base\BaseRepository;
use App\Repositories\CountryRepository;
use App\Services\Admin\Base\BaseService;
use App\Services\Base\RestApiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CountryService extends RestApiService
{
    /**
     * @param CountryRepository $repository
     */
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }
}
