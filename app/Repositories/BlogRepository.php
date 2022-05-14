<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\Base\BaseRepository;

class BlogRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Blog::class;
    }
}