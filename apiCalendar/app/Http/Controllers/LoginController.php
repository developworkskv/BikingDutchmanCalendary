<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends BaseController
{
    // Iniciar sesion POST
    public function iniciarSesion(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
   
        $datos = $request->input(); // todos los datos
        if (empty($datos)) {
            return $this->sendError('Completar la información solicitada', '');
        }
        // JOIN PERSON _ USER _ 
        $user = DB::table('bd_users')
        ->join('bd_persons', 'bd_users.bd_persons_id', '=', 'bd_persons.bd_persons_id')
        ->where('bd_users.password', md5($password))
        ->where('bd_persons.email', $email)
        ->first();

        if (empty($user)) {
            return $this->sendError('Datos incorrectos.', $user);
        } else {
            return $this->sendResponse('Sesión iniciada', $user);
        }

    }

    // VALIDATE SESION 
    public function sesion($token, $id_org){ //token is email code md5

        $userSesion = DB::table('bd_users')
        ->join('bd_persons', 'bd_users.bd_persons_id', '=', 'bd_persons.bd_persons_id')
        ->where('bd_users.token', $token)
        ->where('bd_users.bd_organization_id', $id_org)
        ->first();

        if (empty($userSesion)) {
            return $this->sendError('Datos incorrectos.', $userSesion);
        } else {
            return $this->sendResponse($userSesion, $userSesion);
        }
    }
}
