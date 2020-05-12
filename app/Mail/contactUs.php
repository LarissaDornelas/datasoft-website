<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $userMail;
    public $subject;
    public $messageBody;

    public function __construct($userMail, $subject, $messageBody)
    {


        $this->userMail = $userMail;
        $this->subject = $subject;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject($this->subject)->view('emails.contactUs')->with(['messageBody' => $this->messageBody, 'userMail' => $this->userMail]);
    }
}
