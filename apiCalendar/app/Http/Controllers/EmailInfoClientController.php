<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InfoClientEmail;
use Illuminate\Support\Facades\Mail;

class EmailInfoClientController extends BaseController
{
    //
    public function sendEmailToAdminFromCli(Request $request){
        $email_user =  $request->input('email_user_cli');
        $description =  $request->input('description');
        $status =  $request->input('status');
        try {
            Mail::to("kvelascosr@gmail.com") // EMAIL PARA ALGUIEN
            ->send(new InfoClientEmail( $email_user , $description, $status ));
            return $this->sendResponse('Mensaje enviado.', 'Mensaje enviado.');

        } catch (\Throwable $th) {
            return $this->sendError('Error en servidor', 'Error en servidor');
        }
      
    }
}
