<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Repositories\Base\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Query\Builder;

class BlogCategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return BlogCategory::class;
    }
}