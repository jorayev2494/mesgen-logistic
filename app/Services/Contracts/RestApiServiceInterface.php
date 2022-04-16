<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RestApiServiceInterface
{
    /**
     * @param bool $isAdmin
     * @return Collection
     */
    public function index(bool $isAdmin = false): Collection;

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;
}
