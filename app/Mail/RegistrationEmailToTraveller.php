<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationEmailToTraveller extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$message,$files)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // return $this->markdown('emails.registration_email_to_traveller')->subject($this->subject)
        //                                                                 ->attach(public_path('/chat/'.$file));
        
        $this->markdown('emails.registration_email_to_traveller')->subject($this->subject);
        foreach($this->files as $file){
            $this->attach(public_path('/chat/'.$file));
        }

        return $this;

    }
}
