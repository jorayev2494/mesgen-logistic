<?php

namespace App\Repositories\Contracts;

interface BaseModelRepositoryContract {
    /**
     * @return string
     */
    public function getModel(): string;
}
