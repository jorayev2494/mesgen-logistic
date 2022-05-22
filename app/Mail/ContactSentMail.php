<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSentMail extends Mailable
{
    /**
     * @return void
     */
    public function __construct(
        public Contact $contact
    )
    {
        //
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->to(getenv('MAIL_FROM_ADDRESS'))->view('email.contact_send');
    }
}
