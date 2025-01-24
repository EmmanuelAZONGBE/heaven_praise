<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class Inscriptioncontact extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Elements de contact
     * @var array
     */
    public $contact;
    public $role;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $contact,$role)
    {
        $this->contact = $contact;
        $this->role = $role;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.fr.inscriptioncontact')
        ->from('no-reply@heavenly-praise.com')
        ->subject('Création de votre compte Heavenly Praise')
        ->with([
                'role' => $this->role,
            ]);
    }
}
