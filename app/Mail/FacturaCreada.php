<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Mail\Mailable\Address;
use Illuminate\Mail\Mailable\Content;
use Illuminate\Mail\Mailable\Envelope;
use Illuminate\Queue\SerializesModels;

class FacturaCreada extends Mailable
{
    use Queueable, SerializesModels;


    public $numeroFactura;
    public $numeroValor;
    public $nombre;
    public $nombreUsuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($numeroFactura,$numeroValor,$nombre,$nombreUsuario)
    {
        $this->numeroFactura = $numeroFactura;
        $this->numeroValor = $numeroValor;
        $this->nombre = $nombre;
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
                    ->subject('Se ha creado una nueva Factura')
                    ->view('mails.factura');
    }

}
