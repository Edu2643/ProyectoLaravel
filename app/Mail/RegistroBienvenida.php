<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroBienvenida extends Mailable
{
    use Queueable, SerializesModels;

    public $nombrePerfil;
    public $nombreUsuario;
    /**
     * 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombrePerfil,$nombreUsuario)
    {
        
        
        $this->nombrePerfil = $nombrePerfil;
        $this->nombreUsuario = $nombreUsuario;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('angel240503torres@gmail.com')
        ->subject('Resgistrado')
        ->view('mails.registro');
    }
}
