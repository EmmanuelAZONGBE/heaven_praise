<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class Inscriptionclient extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Elements de contact
     * @var array
     */
    public $contact;
    public $role;
    public $password;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $contact,$role,$password)
    {
        $this->contact = $contact;
        $this->role = $role;
        $this->password = $password;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.fr.inscriptionclient')
        ->from('no-reply@heavenly-praise.com')
        ->subject('Création de votre compte Heavenly Praise')
        ->with([
                'role' => $this->role,
                'password' => $this->password,
            ]);
    }
}
