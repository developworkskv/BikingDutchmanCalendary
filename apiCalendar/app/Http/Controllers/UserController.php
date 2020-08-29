<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\UserServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group ADMINISTRACION
 *
 * 
 */

class UserController extends BaseController
{

    /**
	 * ADMINISTRACION USUARIO-ADMINISTRADOR.
	 * 
	 * Buscar por Id los datos del Usuario-Administrador. Table: bd_user 
    * 
    * @queryParam alias_name required  Nombre del usuario. Example: bra
    * @queryParam user_password required Contraseña del usuario. Example: abcd


    * @bodyParam nombre string required usuario. Example: bryan
    * @bodyParam contraseña string required Contraseña del usuario'. Example: abcd
    *@response {"status":1,"data":{"id_user":"1","email":"br@gmail.com","name":"Bra"}}
     */


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
    
    /**
	* Leer Data Email.
	*
    * Obtener el dato "Email" del Usuario-Administrador  
    * 
    * @queryParam user required  Nombre del usuario. Example: bra
    * @queryParam email required Email del usuario. Example: br@gmail.com
    
    * @bodyParam user string required usuario. Example: bryan
    * @bodyParam email string required email. Example: br@gmail.com
    */
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

    /**
	 * Crear Usuario-Administrador.
	 *
	 * insertar usuarios para ingresar al sistema. Table: bd_user 
     * Guardar los datos del usuario.
   * @queryParam name required Nombre del usuario. Example: Bryan
   *  @queryParam lastName required Apellido del usuario. Example: Roblero
   *  @queryParam email required Nombre del usuario. Example: br@gmail.com
   * @queryParam fechaNacimiento required Nombre del usuario. Example: 18/05/1997
   * @queryParam gender required Nombre del usuario. Example: Macho
   * @queryParam dni required Nombre del usuario. Example: 1724005827
   * @queryParam password required Clave. Example: bra1
   
   * @bodyParam nombre string required Nombre. Example: Bryan
   * @bodyParam apellido string required Apellido. Example: Roblero
   * @bodyParam email string required Email. Example: br@gmail.com
   * @bodyParam fechaNacimiento string required Fecha de Nacimiento. Example: 18/05/1997
   * @bodyParam genero string required Genero. Example: Masculino
   * @bodyParam dni string required Cedula. Example: 1724005827
   * @bodyParam clave string required Clave. Example: bra1
   
    *@response {"status":1,"data":{"mensaje":"Usuario Creado"}}

    */

    //*******************************  CRUD ********************************
    //POST CREAR ADMIN
    public function createAdmin(Request $request)
    {

        $gestionUser = new UserServiceRepository;
        //validate if existe all Request // return count($request->all()); == 6
        if (count($request->all()) < 4) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }

        if (count($request->all()) >= 5 ) {
       
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

     /**
	* Mostrar Usuario-Administrador.
	*
    * Todas los Usuarios  
    * 
    * @queryParam id required id_usuario. Example: 1
    
    * @bodyParam id string required id_usuario. Example: 1
    */

    // GET - READ USER ADMINISTRADOR
    public function getAllAdministrators($id_org)
    {
        $gestionUser = new UserServiceRepository;

        $administrators = $gestionUser->getAllUserAdmin($id_org);
        if (count($administrators) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');

        } else {
            return $this->sendResponse($administrators, 'Usuario administrador creado correctamente.');

        }

    }

      /**
	* Mostrar Administradores.
	*
    * Todas los Administradores.  
    * 
    * @queryParam id required id_usuario. Example: 1
    * @bodyParam id string required id_usuario. Example: 1
    */

    // Get - By Id
    public function getAdmin($id_user, $id_org)
    {
        $gestionUser = new UserServiceRepository;
        $administrator = $gestionUser->getUserAdminById($id_user, $id_org);

        if (count($administrator) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
            return $this->sendResponse($administrator, 'Usuario administrador creado correctamente.');
        }

    }

       /**
	* Mostrar Tipos de Usuarios.
	*
    * Los roles que maneja el sistema.  
    * 
    * @queryParam id required id_usuario. Example: 1
    * @bodyParam id string required id_usuario. Example: 1
    */
    

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

       /**
	* Actualizar Usuario-Administrador.
	*
    * Actualizar los datos del Usuario-Administrador.  
    * 
    * @queryParam id required id_usuario. Example: 1
    * @bodyParam id string required id_usuario. Example: 1
    */

    //UPDATE - MODIFI DATA $administrators
    public function updateAdministratorData($id_person, $id_org, Request $request)
    {
        $gestionUser = new UserServiceRepository;
        // verficate if exist this user
        $userIsRegister = $gestionUser->getUserAdminById($id_person, $id_org);
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
                $userEdit = $gestionUser->getUserAdminById($id_person, $id_org);
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

     /**
	* Eliminar Usuario-Administrador.
	*
    * Eliminar a los Usuarios por Id.  
    * 
    * @queryParam id required id_usuario. Example: 1

    * @bodyParam id string required id_usuario. Example: 1
    */

    public function deleteAdmin($id_person, $id_org)
    {
        $gestionUser = new UserServiceRepository;

        // verificar si el usuario existe para borrar
        $userIsRegister = $gestionUser->getUserAdminById($id_person,$id_org);
        if (count($userIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Usuario no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $userIsRegister = $gestionUser->deleteAdmin($id_person);
            return $this->sendResponse('Usuario Amdinistrador Eliminado', 'Administrador dado de baja');

        }
    }


}
