<?php

namespace App\Services;

use App\Helpers\GetKeyByLocalePrefix;
use App\Repositories\BlogRepository;
use Illuminate\Contracts\Pagination\Paginator;

class BlogSearchService
{

    public function __construct(
        private BlogRepository $repository
    )
    {
        
    }

    /**
     * @param string|null $searchText
     * @param integer|null $perPage
     * @return Paginator
     */
    public function search(?string $searchText, int $perPage = null): Paginator
    {
        $this->repository->setColumns([
            'id',
            $transtaltedTitle = GetKeyByLocalePrefix::execute('title', true),
            GetKeyByLocalePrefix::execute('text', true),
            'media',
            'extension',
            'user_id',
            'category_id',
            'created_at'
        ])
        ->setWith([
            'user:id,first_name,last_name,avatar,email',
            "category:id,{$transtaltedTitle}",
            'tags:id,value'
        ])
        ->setWithCount([
            'tags'
        ]);

        return $this->repository->search($searchText, $perPage);
    }
}
