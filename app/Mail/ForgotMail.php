<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;

    public $forgot;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($forgot)
    {
        $this->forgot=$forgot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // content will be send the email
    public function build()
    {
        return $this->view('client.reset')
            ->subject('Reset Password')
            ->from('system@yoursite.com','System')
            ->with('con',$this->forgot);
    }
}
