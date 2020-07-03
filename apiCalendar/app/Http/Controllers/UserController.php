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
        ->join('bd_persons', 'bd_users.bd_persons_id', '=', 'bd_persons.bd_persons_id')
        ->where('bd_persons.email', $email_user)
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

        if (count($request->all()) >= 7 ) {
       
            // verificar si ese email ya existe registrado
            $userExist = $gestionUser->userExist($request->input('email'));
            // si existe no existe usuario registrado con ese email inserte
            if (count($userExist) == 0) {
       
                $insert = $gestionUser->newAdmin(
                    $request->input('name'),
                    $request->input('lastName'),
                    $request->input('email'),
                    $request->input('fechaNacimiento'),
                    $request->input('gender'),
                    $request->input('dni'),

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
    // Get - By Id
    public function getAdmin($id_user)
    {
        $gestionUser = new UserServiceRepository;
        $administrator = $gestionUser->getUserAdminById($id_user);

        if (count($administrator) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
            return $this->sendResponse($administrator, 'Usuario administrador creado correctamente.');
        }

    }
    // Get - all Tipe USER
    public function allTipesUser(){
      $gestionUser = new UserServiceRepository;
      $tipes = $gestionUser->getAllTipesUser();
      if (count($tipes) == 0) {
          // no hay Datos
          return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
      } else {
          return $this->sendResponse($tipes, 'Tipos de administradores');
      }
    }

    //UPDATE - MODIFI DATA $administrators
    public function updateAdministratorData($id_person, Request $request)
    {
        $gestionUser = new UserServiceRepository;
        // verficate if exist this user
        $userIsRegister = $gestionUser->getUserAdminById($id_person);
        if (count($userIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Usuario no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            if (count($request->all()) >= 6) {
                //EDIT TABLE bd_persons
                $gestionUser->updateAdminPerson(
                    $id_person,
                    $request->input('name'),
                    $request->input('lastName'),
                    $request->input('email'),
                    $request->input('fechaNacimiento'),
                    $request->input('gender'),
                    $request->input('dni')
                );
                //getIdPerson modificated
                $userEdit = $gestionUser->getUserAdminById($id_person);
                // EDIT TABLE bd_users where idPersons
                $update = $gestionUser->updateAdmin($userEdit[0]->bd_persons_id,
                    $request->input('bd_type_users_id')
                                 ); // SI SE QUIERE MODIFICAR ESTE CAMPO CREAR OTRA FUNCION - CAMBIAR TIPO DE Usuario
                return $this->sendResponse($userIsRegister, 'Usuario administrador modificado correctamente.');

            } else {
                return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');

            }
        }

    }

    public function deleteAdmin($id_person)
    {
        $gestionUser = new UserServiceRepository;

        // verificar si el usuario existe para borrar
        $userIsRegister = $gestionUser->getUserAdminById($id_person);
        if (count($userIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Usuario no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $userIsRegister = $gestionUser->deleteAdmin($id_person);
            return $this->sendResponse('Usuario Amdinistrador Eliminado', 'Administrador dado de baja');

        }
    }


}
