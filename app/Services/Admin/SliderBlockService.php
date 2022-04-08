<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\SliderBlock;
use App\Repositories\SliderBlockRepository;
use App\Services\Admin\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SliderBlockService extends BaseService
{
    private SliderBlockRepository $repository;

    public function __construct(SliderBlockRepository $repository)
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
                            'icon',
                            $this->getLocalPrefix('title', true),
                            $this->getLocalPrefix('text', true),
                        ]);
    }

    /**
     * @param int $id
     * @return SliderBlock|Model
     */
    public function show(int $id): SliderBlock
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return SliderBlock
     */
    public function update(int $id, array $data): SliderBlock
    {
        /** @var SliderBlock $foundSocial */
        $foundSocial = $this->repository->find($id);

        $foundSocial->update($data);

        return $foundSocial->refresh();
    }
}
