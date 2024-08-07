<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message;

    public function __construct($data)
    {
        $this->name = strval($data['name']);
        $this->email = strval($data['email']);
        $this->subject = strval($data['subject']);
        $this->message = strval($data['message']);
    }

    public function build()
    {
        return $this->view('client.contactForm')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'subject' => $this->subject,
                        'message' => $this->message,
                    ])
                    ->subject('New Contact Message from ' . $this->name);
    }
}
