<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class Commandeclient extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Elements de contact
     * @var array
     */
    public $commandes;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commandes)
    {
        $this->commandes = $commandes;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.fr.commande')
        ->from('no-reply@heavenly-praise.com')
        ->subject('Votre commande de Ticket(s) sur Heavenly Praise')
        // ->with([
        //         'role' => $this->role,
        //     ])
        ;
    }
}
