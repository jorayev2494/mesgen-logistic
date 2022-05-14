<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Base\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TagRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Tag::class;
    }

    /**
     * @param string $field
     * @param array $values
     * @return Collection
     */
    public function getWhereIn(string $field, array $values): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->whereIn($field, $values)
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->distinct($field)
                                    ->get();
    }
}