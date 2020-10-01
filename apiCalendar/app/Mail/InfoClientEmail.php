<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfoClientEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance. CAMBIOS DE CORRECIONES 
     *
     * @return void
     */
    public $emailUserCli;
    public $description;
    public $status;

    public function __construct($emailUserCli, $description, $status)
    {
        $this->emailUserCli = $emailUserCli;
        $this->description = $description;
        $this->status = $status;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $email =  $this->view('emails.infoclient',[
            'email_from'=> $this->emailUserCli ,
            'description'=> $this->description ,
            'status'=> $this->status 
        ])->from('indicadoressidesoft@gmail.com')
        ->subject('AGENCIA TOURS EN BICILCETA')
        ->cc('kav.chuga@yavirac.edu.ec');
        return $email;

    }
}
