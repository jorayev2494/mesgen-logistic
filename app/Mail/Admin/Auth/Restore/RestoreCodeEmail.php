<?php

namespace App\Mail\Admin\Auth\Restore;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestoreCodeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public int $code;

    /**
     * @param int $code
     */
    public function __construct(int $code)
    {
        $this->code = $code;
    }

    /**
     * @return $this
     */
    public function build(): self
    {
        return $this->view('admin.auth.restore.email_code');
    }
}
