<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class AlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request; //funcion publica para que sea usada por toda la case ContactPage


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $formRequest)
    {
        //
        //contructor obtiene un objeto de tipo request --que viene desde el formulario--
        $this->request = $formRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Alerta IoT')// obtenemos el asunto de la variable $request
        ->view('mails.alertCss');
    }
}
