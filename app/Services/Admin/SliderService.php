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
     * @return Collection
     */
    public function get(bool $isAdmin = false): Collection
    {
        return $isAdmin ? $this->repository->getAdmin()
                        : $this->repository->get([
                            'media',
                            $this->getLocalPrefix('title', true),
                            $this->getLocalPrefix('text', true),
                            'extension',
                         ]);
    }

    /**
     * @param int $id
     * @return Slider
     */
    public function show(int $id): Slider
    {
        return $this->repository->findOrFail($id);
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
        $foundSlider = $this->repository->findOrFail($id);

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
        $foundSlider = $this->repository->findOrFail($id);

        if ($foundSlider->media) {
            $this->deleteFile(SliderServiceEnum::MEDIA_PATH->value, $foundSlider->media);
        }

        $foundSlider->delete();
    }
}
