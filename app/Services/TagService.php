<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\User;
use App\Repositories\TagRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagService
{
    public function __construct(
        private TagRepository $repository
    )
    {
        
    }

    /**
     * @return Collection
     */
    public function index(bool $isAdmin = false, int $perPage = null): Collection
    {
        if ($isAdmin) {            
            // $transtaltedTitle = GetKeyByLocalePrefix::execute('title', true);
            // $transtaltedText = GetKeyByLocalePrefix::execute('text', true);
            
            $this->repository->setWith([
                // "blogs:id,{$transtaltedTitle},{$transtaltedText},media,extension,user_id,category_id",
                // 'blogs.user:id,first_name,last_name,avatar,email',
                // "blogs.category:id,{$transtaltedTitle}",
                'user:id,first_name,last_name,avatar,email',
            ])->setWithCount([
                'blogs'
            ]);
        } else {
            $this->repository->setColumns(['id', 'value']);
        }

        return $this->repository->get($isAdmin);
    }

    /**
     * @param User $user
     * @param array $data
     * @return Model
     */
    public function store(User $user, array $data): Model
    {
        $data['user_id'] = $user->id;

        return $this->repository->create($data);
    }

    /**
     * @param integer $id
     * @return Model
     */
    public function show(int $id): Model
    {
        $transtaltedTitle = GetKeyByLocalePrefix::execute('title', true);
        $transtaltedText = GetKeyByLocalePrefix::execute('text', true);

        $this->repository->setWith([
            "blogs:id,{$transtaltedTitle},{$transtaltedText},media,extension,user_id,category_id",
            'blogs.user:id,first_name,last_name,avatar,email',
            "blogs.category:id,{$transtaltedTitle}",
            'user:id,first_name,last_name,avatar,email',
        ])->setWithCount([
            'blogs'
        ]);

        return $this->repository->find($id);
    }

    /**
     * @param User $user
     * @param integer $id
     * @param array $data
     * @return Model
     */
    public function update(User $user, int $id, array $data): Model
    {
        $this->repository->setWith([
            // "blogs:id,{$transtaltedTitle},{$transtaltedText},media,extension,user_id,category_id",
            // 'blogs.user:id,first_name,last_name,avatar,email',
            // "blogs.category:id,{$transtaltedTitle}",
            'user:id,first_name,last_name,avatar,email',
        ])->setWithCount([
            'blogs'
        ]);

        $foundTag = $this->repository->find($id);

        $foundTag->update($data);

        return $foundTag;
    }

    /**
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {        
        $this->repository->find($id)->delete();
    }
}