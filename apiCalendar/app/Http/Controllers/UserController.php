<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\UserServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function dataUserById($id_user)
    {
        $user = DB::table('bd_users')
            ->where('bd_users_id', $id_user)
            ->first();

        $arrayDataUser = array();
        if (empty($user)) {
            return $this->sendError('Usuario no encontrado ó credenciales incorrectas.', $user);
        }
        array_push($arrayDataUser, $user);
        return $arrayDataUser;
    }
    public function dataUserByEmail($email_user)
    {
        // verificar si existe el usuario
        $user = DB::table('bd_users')
            ->where('email', $email_user)
            ->first();
        // get ==> Array
        //first ==> Objeto
        $arrayDataUser = array(); // almacen
        if (empty($user)) {
            return $this->sendError('Usuario no encontrado ó credenciales incorrectas.', $user);
        }
        array_push($arrayDataUser, $user);
        return $arrayDataUser;
    }

    //*******************************  CRUD ********************************
    //POST CREAR ADMIN
    public function createAdmin(Request $request)
    {

        $gestionUser = new UserServiceRepository;
        //validate if existe all Request // return count($request->all()); == 6
        if (count($request->all()) < 4) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }

        if (count($request->all()) >= 4) {
            // verificar si ese email ya existe registrado
            $userExist = $gestionUser->userExist($request->input('email'));
            // si existe no existe usuario registrado con ese email inserte
            if (count($userExist) == 0) {
                $insert = $gestionUser->newAdmin(
                    $request->input('name'),
                    $request->input('email'),
                    md5(uniqid($request->input('email'), true)), // TOKEN depende de email
                    md5(($request->input('password'))),
                    $request->input('bd_organization_id'),
                    $request->input('bd_type_users_id')
                );
                return $this->sendResponse('Correcto Usuario creado', 'Usuario administrador creado correctamente.');
            } else {
                // Existe un registro en el Array $userExist - un registro en la base con el email ingresado
                return $this->sendError('Usuario ya registrado', 'Error, ya existe un usuario con el mismo email.');
            }
        }
    }

    // GET - READ USER ADMINISTRADOR
    public function getAllAdministrators()
    {
        $gestionUser = new UserServiceRepository;

        $administrators = $gestionUser->getAllUserAdmin();
        if (count($administrators) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');

        } else {
            return $this->sendResponse($administrators, 'Usuario administrador creado correctamente.');

        }

    }

    //UPDATE - MODIFI DATA $administrators
    public function updateAdministratorData($id_administrator, Request $request)
    {

        $gestionUser = new UserServiceRepository;
        // verficate if exist this user
        $userIsRegister = $gestionUser->getUserAdminById($id_administrator);

        if (count($userIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Usuario no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            // Puedo borrar, first search data of user;
            // return $this->sendResponse($userIsRegister,'Usuario existe');
            //CONFIRM update, only name, email or $password
            if (count($request->all()) >= 3) {
                $update = $gestionUser->updateAdmin($id_administrator,
                    $request->input('name'),
                    $request->input('email'),
                    //md5(uniqid($request->input('email'), true)), // TOKEN depende de email
                    md5(($request->input('password'))),
                    //$request->input('bd_organization_id'),
                    $userIsRegister[0]->bd_type_users_id); // SI SE QUIERE MODIFICAR ESTE CAMPO CREAR OTRA FUNCION - CAMBIAR TIPO DE Usuario

                return $this->sendResponse($userIsRegister, 'Usuario administrador modificado correctamente.');

            } else {
                return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');

            }
        }

    }

    public function deleteAdmin($id_administrator)
    {
        $gestionUser = new UserServiceRepository;

        // verificar si el usuario existe para borrar
        $userIsRegister = $gestionUser->getUserAdminById($id_administrator);
        if (count($userIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Usuario no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $userIsRegister = $gestionUser->deleteAdmin($id_administrator);

            return $this->sendResponse('Usuario Amdinistrador Eliminado', 'Administrador dado de baja');

        }
    }

}
