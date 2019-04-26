<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    private $token;
    use Queueable, SerializesModels;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->markdown('ForgotPasswordMarkDown')->with(["token" => $this->token]);
    }
}
