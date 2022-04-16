<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\Social;
use App\Repositories\SocialRepository;
use App\Services\Base\RestApiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class SocialService extends RestApiService
{
    /**
     * @param SocialRepository $repository
     */
    public function __construct(SocialRepository $repository)
    {
        $this->repository = $repository;
    }
}
