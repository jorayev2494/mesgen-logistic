<?php

namespace App\Services;

use App\Repositories\TextTranslateRepository;
use App\Services\Base\RestApiService;
use Illuminate\Database\Eloquent\Collection;

class TextTranslateService extends RestApiService
{
    public function __construct(
        TextTranslateRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function getTextTranslate(?string $slug, array $columns = ['*']): Collection
    {
        return $this->repository->setColumns($columns)->getTextTranslate($slug, $columns);
    }
}