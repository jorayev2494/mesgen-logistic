<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\Blog;
use App\Models\User;
use App\Repositories\BlogRepository;
use App\Repositories\TagRepository;
use App\Traits\FileTrait;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class BlogService
{
    use FileTrait;

    /**
     * @var string|null
     */
    private ?string $mediaPath;
    
    public function __construct(
        private BlogRepository $repository
    )
    {
        $this->mediaPath = '/blogs/medias';
    }

    /**
     * @return Paginator
     */
    public function index(bool $isAdmin = false, int $perPage = null): Paginator
    {
        $this->repository->setColumns(['*'])->setWith(['user'])->setWithCount(['tags']);

        return $this->repository->getPaginate($isAdmin, $perPage);
    }

    /**
     * @return Paginator
     */
    public function getBlogs(bool $isAdmin = false, int $perPage = null): Paginator
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

        /** @var PaginationPaginator $blogs */
        $blogs = $this->repository->getPaginate($isAdmin, $perPage);
        $blogs->getCollection()->each->setHidden([
            'user_id',
            'category_id'
        ]);

        return $blogs;
    }

    /**
     * @param User $user
     * @param array $data
     * @return Blog
     */
    public function store(User $user, array $data): Blog
    {
        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->uploadFile($this->mediaPath, $data['media']);
        }

        /** @var Blog $cratedBlog */
        $cratedBlog = $this->repository->create($data);
        $this->setHashtags($user, $cratedBlog, $data);

        return $cratedBlog->loadMissing(['user', 'category', 'tags']);
    }

    /**
     * @param integer $id
     * @return Model
     */
    public function show(int $id): Model
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
            'tags'
        ])
        ->setWithCount([
            'tags'
        ]);


        $foundBlog = $this->repository->find($id);
        $foundBlog->setHidden([
            'user_id',
            'category_id'
        ]);

        return $foundBlog;
    }

    /**
     * @param int $id
     * @param array $data
     * @param string $mediaPath
     * @return Blog
     */
    public function update(User $user, int $id, array $data): Blog
    {
        /** @var Blog $foundBlog */
        $foundBlog = $this->repository->find($id);

        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->updateFile($this->mediaPath, $foundBlog->media, $data['media']);
        }

        $foundBlog->update($data);
        $this->setHashtags($user, $foundBlog, $data);

        return $foundBlog->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $foundBlog = $this->repository->find($id);

        if (array_key_exists('media', $foundBlog->toArray()) && $media = $foundBlog->getRawOriginal('media')) {
            $this->deleteFile($this->mediaPath, $media);
        }

        $foundBlog->delete();
    }

    /**
     * @param Blog $blog
     * @param array $data
     * @return void
     */
    private function setHashtags(User $user, Blog $blog, array $data): void
    {
        if (array_key_exists('tags', $data)) {
            /** @var TagRepository $tagRepository */
            $tagRepository = resolve(TagRepository::class);
            $foundTags = $tagRepository->setColumns(['id', 'value'])->getWhereIn('value', $data['tags'])->toArray();
            $foundValues = array_column($foundTags, 'value');
            $tagIds = array_column($foundTags, 'id');

            $createdTagIds = array_column($this->crateNewTags($user, array_diff($data['tags'], $foundValues)), 'id');
            $tagIds = array_merge($tagIds, $createdTagIds);

            if (empty($tagIds)) {
                return;
            }

            $blog->tags()->attach($tagIds);
        }
    }

    /**
     * @param User $user
     * @param array $tags
     * @return array
     */
    private function crateNewTags(User $user, array $tags): array
    {
        $result = [];

        if(count($tags)) {
            $createTags = array_map(fn (string $value): array => compact('value'), $tags);
            $result = $user->tags()->createMany($createTags)->toArray();
        }

        return $result;
    }

    /**
     * @param integer $id
     * @param integer|null $perPage
     * @return void
     */
    public function getBlogsByTag(int $id, int $perPage = null)
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

        return $this->repository->whereByTag($id, $perPage);
    }

    /**
     * @param integer $id
     * @param integer|null $perPage
     * @return Paginator
     */
    public function getBlogsByCategory(int $id, int $perPage = null): Paginator
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
        
        return $this->repository->getBlogsByCategory($id, $perPage);
    }
}