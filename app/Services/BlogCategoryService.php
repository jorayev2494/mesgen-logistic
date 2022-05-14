<?php

namespace App\Services;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\User;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryService
{
    public function __construct(
        private BlogCategoryRepository $repository
    )
    {
        $this->repository->setWith([
            'user:id,first_name,last_name,avatar,email',
            'blogs.user:id,first_name,last_name,avatar,email'
        ])
        ->setWithCount(['blogs']);
    }

    /**
     * @return Collection
     */
    public function index(bool $isAdmin = false): Collection
    {
        if ($isAdmin) {
            # code...
        } else {
            $this->repository->setColumns([
                'id',
                GetKeyByLocalePrefix::execute('title', true)
            ])
            ->setWith()
            ->setWithCount();
        }

        return $this->repository->get($isAdmin);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(User $user, array $data): Model
    {
        return $this->repository->create(array_merge($data, ['user_id' => $user->id]));
    }

    /**
     * @param integer $id
     * @return Model
     */
    public function show(int $id): Model
    {
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
        $foundBlogCategory = $this->repository->find($id);
        $foundBlogCategory->update($data);

        return $foundBlogCategory;
    }

    /**
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $foundBlogCategory = $this->repository->find($id);
        $foundBlogCategory->delete();
    }
}