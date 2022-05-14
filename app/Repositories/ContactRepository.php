<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Base\BaseRepository;

class ContactRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Contact::class;
    }
}