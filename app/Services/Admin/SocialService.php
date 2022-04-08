<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\Social;
use App\Repositories\SocialRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class SocialService
{
    private SocialRepository $repository;

    /**
     * @param SocialRepository $repository
     */
    public function __construct(SocialRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool $isAdmin
     * @return Collection
     */
    public function get(bool $isAdmin = false): Collection
    {
        return $isAdmin ? $this->repository->getAdmin()
                        : $this->repository->get([
                            'slug',
                            'link',
                        ]);
    }

    /**
     * @param int $id
     * @return Social|Model
     */
    public function show(int $id): Social
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Social
     */
    public function update(int $id, array $data): Social
    {
        /** @var Social $foundSocial */
        $foundSocial = $this->repository->find($id);

        $foundSocial->update($data);

        return $foundSocial->refresh();
    }
}
