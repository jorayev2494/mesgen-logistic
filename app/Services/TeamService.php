<?php

namespace App\Services;

use App\Helpers\GetKeyByLocalePrefix;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class TeamService
{
    public function __construct(
        private UserRepository $repository
    )
    {
        
    }

    /**
     * @return Collection
     */
    public function getTeam(): Collection
    {
        return $this->repository->setColumns([
            'id',
            'first_name',
            'last_name',
            'avatar',
            GetKeyByLocalePrefix::execute('position', true),
        ])->setWith(['socials:id,slug,link,user_id'])->get();
    }
}