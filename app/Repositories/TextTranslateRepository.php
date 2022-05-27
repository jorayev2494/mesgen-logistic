<?php

namespace App\Repositories;

use App\Models\TextTranslate;
use App\Repositories\Base\RestApiRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;

class TextTranslateRepository extends RestApiRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return TextTranslate::class;
    }

    /**
     * @param string|null $slug
     * @return Collection
     */
    public function getTextTranslate(?string $slug, array $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()
                                    ->select($this->getColumns())
                                    ->when(!is_null($slug),
                                    static function (Builder $query) use($slug): void {
                                        $query->where(compact('slug'));
                                    })
                                    ->with($this->getWith())
                                    ->withCount($this->getWithCount())
                                    ->get();
    }
}