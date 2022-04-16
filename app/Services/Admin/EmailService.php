<?php

namespace App\Services\Admin;

use App\Repositories\EmailRepository;
use App\Services\Base\RestApiService;

class EmailService extends RestApiService
{
    /**
     * @param EmailRepository $repository
     */
    public function __construct(EmailRepository $repository)
    {
        $this->repository = $repository;
    }
}
