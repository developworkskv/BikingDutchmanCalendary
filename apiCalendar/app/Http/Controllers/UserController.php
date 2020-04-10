<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends BaseController
{
  public function dataUserById($id_user){
    // verificar si existe el usuario
    $user = DB::table('bd_users')
    ->where('bd_users_id', $id_user)
    ->first();
    // get ==> Array
    //first ==> Objeto
   $arrayDataUser = array(); // almacen
    if(empty($user)){
        return $this->sendError('Usuario no encontrado ó credenciales incorrectas.', $user);
    }
    array_push($arrayDataUser,$user);
    return $arrayDataUser;
}
public function dataUserByEmail($email_user){
    // verificar si existe el usuario
    $user = DB::table('bd_users')
    ->where('email', $email_user)
    ->first();
    // get ==> Array
    //first ==> Objeto
   $arrayDataUser = array(); // almacen
    if(empty($user)){
        return $this->sendError('Usuario no encontrado ó credenciales incorrectas.', $user);
    }
    array_push($arrayDataUser,$user);
    return $arrayDataUser;
}
}
