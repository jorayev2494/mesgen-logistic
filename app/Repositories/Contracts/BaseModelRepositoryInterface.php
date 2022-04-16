<?php

namespace App\Repositories\Contracts;

interface BaseModelRepositoryInterface {
    /**
     * @return string
     */
    public function getModel(): string;
}
