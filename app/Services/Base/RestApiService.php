<?php

namespace App\Services\Base;

use App\Enums\Services\SliderServiceEnum;
use App\Repositories\Base\RestApiRepository;
use App\Services\Contracts\RestApiServiceInterface;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class RestApiService implements RestApiServiceInterface
{

    use FileTrait;

    /**
     * @var RestApiRepository $repository
     */
    protected RestApiRepository $repository;

    /**
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function index(bool $isAdmin = false, array $columns = ['*']): Collection
    {
        return  $this->repository->get($isAdmin, $columns);
    }

    /**
     * @param array $data
     * @param string $mediaPath
     * @return Model
     */
    public function store(array $data, string $mediaPath = '/medias'): Model
    {
        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->uploadFile($mediaPath, $data['media']);
        }

        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @param string $mediaPath
     * @return Model
     */
    public function update(int $id, array $data, string $mediaPath = '/medias'): Model
    {
        /** @var Model $foundModel */
        $foundModel = $this->repository->find($id);

        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->updateFile($mediaPath, $foundModel->media, $data['media']);
        }

        $foundModel->update($data);

        return $foundModel->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $foundModel = $this->repository->find($id);

        if (array_key_exists('media', $foundModel->toArray()) && $media = $foundModel->getRawOriginal('media')) {
            $this->deleteFile(SliderServiceEnum::MEDIA_PATH->value, $media);
        }

        $foundModel->delete();
    }

}
