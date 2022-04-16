<?php

namespace App\Services\Admin;

use App\Enums\Services\SliderServiceEnum;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use App\Services\Admin\Base\BaseService;
use App\Traits\FileTrait;
use Illuminate\Support\Collection;

class SliderService extends BaseService
{

    use FileTrait;

    /**
     * @var SliderRepository $repository
     */
    private SliderRepository $repository;

    /**
     * @param SliderRepository $repository
     */
    public function __construct(SliderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool $isAdmin
     * @param array $columns
     * @return Collection
     */
    public function index(bool $isAdmin = false, array $columns = ['*']): Collection
    {
        return $this->repository->get($isAdmin, $columns);
    }

    /**
     * @param int $id
     * @return Slider
     */
    public function show(int $id): Slider
    {
        return $this->repository->find($id);
    }

    /**
     * @param array<string, object> $data
     * @return Slider
     */
    public function store(array $data): Slider
    {
        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->uploadFile(SliderServiceEnum::MEDIA_PATH->value, $data['media']);
        }

        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array<string, object> $data
     * @return Slider
     */
    public function update(int $id, array $data): Slider
    {
        /** @var Slider $foundSlider */
        $foundSlider = $this->repository->find($id);

        if (array_key_exists('media', $data)) {
            [
                'full_path' => $data['media'],
                'extension' => $data['extension']
            ] = $this->updateFile(SliderServiceEnum::MEDIA_PATH->value, $foundSlider->media, $data['media']);
        }

        $foundSlider->update($data);

        return $foundSlider->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        /** @var Slider $foundSlider */
        $foundSlider = $this->repository->find($id);

        if ($foundSlider->media) {
            $this->deleteFile(SliderServiceEnum::MEDIA_PATH->value, $foundSlider->media);
        }

        $foundSlider->delete();
    }
}
