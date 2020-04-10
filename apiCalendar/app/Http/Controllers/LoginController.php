<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
      // Iniciar sesion POST
      public function iniciarSesion(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $datos = $request->input(); // todos los datos
        if(empty($datos)){
            return $this->sendError('Completar la información solicitada', '');
        }
         // verificar si existe el usuario DATOS CORRECTOS
         $user = DB::table('bd_users')
         ->where('email', $email)
         ->where('password', $password)
         ->first();
         if(empty($user)){ 
            return $this->sendError('Datos incorrectos.', $user);
        }else{
            return $this->sendResponse('Sesión iniciada', $user) ; 
        }

    }
}
