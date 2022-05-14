<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\ContactSentMail;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    /**
     * @var ContactRepository $repository
     */
    private ContactRepository $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array<integer, string> $data
     * @return array
     */
    public function contact(array $data): array
    {
        $contact = $this->repository->create($data);
        Mail::send(new ContactSentMail($contact));

        return ['message' => trans('translate.contact_sent')];
    }
}