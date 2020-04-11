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
        $password = md5(($request->input('password')));

        $datos = $request->input(); // todos los datos
        if (empty($datos)) {
            return $this->sendError('Completar la información solicitada', '');
        }
        // verificar si existe el usuario DATOS CORRECTOS
        $user = DB::table('bd_users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if (empty($user)) {
            return $this->sendError('Datos incorrectos.', $user);
        } else {
            return $this->sendResponse('Sesión iniciada', $user);
        }

    }
}
