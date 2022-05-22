<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Helpers\GetKeyByLocalePrefix;
use App\Models\Blog;
use App\Repositories\Base\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class BlogRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Blog::class;
    }

    /**
     * @param string $field
     * @param string $value
     * @param integer|null $perPage
     * @return Paginator
     */
    public function whereBy(string $field, string $value, int $perPage = null): Paginator
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->where($field, $value)
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->paginate($perPage);
    }

    /**
     * @param string $field
     * @param string $value
     * @param integer|null $perPage
     * @return Paginator
     */
    public function whereByTag(int $id, int $perPage = null): Paginator
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->whereHas('tags', fn (Builder $q): Builder => $q->where('tag_id', $id))
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->paginate($perPage);
    }

    /**
     * @param integer $id
     * @param integer|null $perPage
     * @return Paginator
     */
    public function getBlogsByCategory(int $id, int $perPage = null): Paginator
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->whereHas('category', fn (Builder $q): Builder => $q->where('category_id', $id))
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->paginate($perPage);
    }

    /**
     * @param string|null $searchText
     * @param integer|null $perPage
     * @return Paginator
     */
    public function search(?string $searchText, int $perPage = null): Paginator
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->where([
                                        [GetKeyByLocalePrefix::execute('title'), 'LIKE', "%{$searchText}%", 'or']
                                    ])
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->paginate($perPage);

    }
}