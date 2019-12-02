<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendToken extends Mailable
{
    use Queueable, SerializesModels;

    public $activation_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activation_token)
    {
        //
        $this->activation_token = $activation_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('example@example.com')
            ->view('emails.send_token');

    }
}
