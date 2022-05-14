<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Repositories\Base\BaseRepository;

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