<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class testmail extends Mailable
{
    use Queueable, SerializesModels;

    private $RandomToken;
    public function __construct($token)
    {
        $this->RandomToken = $token;
    }

    public function build()
    {
        return $this->view('testmail')->with(["token" => $this->RandomToken]);
    }
    
}
