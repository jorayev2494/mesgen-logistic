<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\Collection;

class BlogPopularService
{
    public function __construct(
        private BlogRepository $repository
    )
    {
        
    }

    /**
     * @param integer $limit
     * @param array $columns
     * @return Collection
     */
    public function getPopular(int $limit = 4, array $columns = ['*']): Collection
    {
        return $this->repository->getPopular($limit, $columns);
    }
}