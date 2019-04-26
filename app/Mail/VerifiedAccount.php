<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifiedAccount extends Mailable
{
    use Queueable, SerializesModels;

    private $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->markdown('VerifiedAccount')->with(["token" => $this->token]);
    }
}
