<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\ContuctMessage;
class ContuctMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message_to_send = "";
    public $firstname = "";
    public function __construct($first_name, $message)
    {
         $this->firstname = $first_name;
         $this->message_to_send = $message;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $firstname= $this->firstname;
        $message_to_send= $this->message_to_send;
        return $this->view('Email.send',compact('firstname','message_to_send'));
    }



}
