<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class UserServiceRepository
{
    // **************  CRUD ******************
    //create - POST
    public function newAdmin($name,$lastName,$email,$date, $genero, $dni, $token, $password, $id_org, $id_user)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
      // INSERTAR EN LA TABLA PERSONA
        $newPerson = DB::table('bd_persons')->insert([
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'birth_date' => $date,
            'gender' => $genero,
            'dni' => $dni,
            'isActive' => true,
            'description1' => "New admin sys",
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
        //GET LAST REGISTER AND INSERT WITH HIS ID TO BD_USERS
        $lastPersonCreated = DB::table('bd_persons')
        ->where('dni', $dni)
        ->get(); 

      // INSERTAR EN LA TABLA BD USERS
        $newAdmin = DB::table('bd_users')->insert([
            //'name' => $name,
           // 'email' => $email,
            'token' => $token,
            'password' => $password,
            'bd_organization_id' => $id_org,
            'bd_type_users_id' => $id_user,
            'bd_persons_id' => $lastPersonCreated[0]->bd_persons_id,
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
        return $newAdmin;
    }
    //reade
    //all
    public function getAllUserAdmin()
    {
        //ALWAYS JOIN WITH TABLE PERSON to view data
        $usersAdministrators = DB::table('bd_users')
        ->join('bd_persons', 'bd_users.bd_persons_id', '=', 'bd_persons.bd_persons_id')
        ->join('bd_type_users', 'bd_users.bd_type_users_id', '=', 'bd_type_users.bd_type_users_id')
        ->select('bd_users.*', 'bd_persons.*', 'bd_type_users.*')
        ->orderBy('bd_users.created_at', 'desc')
        ->get();
        return $usersAdministrators;
    }
    //by_Id
    public function getUserAdminById($id_person)
    {
        $userAdministrator = DB::table('bd_persons')
        ->join('bd_users', 'bd_persons.bd_persons_id', '=', 'bd_users.bd_persons_id')  
        ->join('bd_type_users', 'bd_type_users.bd_type_users_id', '=', 'bd_users.bd_type_users_id')
        ->select('bd_users.*', 'bd_type_users.*', 'bd_persons.*')
        ->where('bd_persons.bd_persons_id', $id_person)
        ->get();
        return $userAdministrator;
    }
    //tipes user
    public function getAllTipesUser(){
      $tipes = DB::table('bd_type_users')
          ->get();
      return $tipes;
    }

    //update
    public function updateAdmin($bd_persons_id, $type_user_id)
    {
        date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
        $fecha = new DateTime('NOW');
          $affected = DB::table('bd_users')
              ->where('bd_persons_id', $bd_persons_id)
              ->update([
                  //'name' => $name,
                  //'email' => $email,
                  //'password' => $password,
                  'bd_type_users_id' => $type_user_id,
                  'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
          return $affected;
    }
    public function updateAdminPerson($id_person, $name, $lastName, $email, $fechaNacimiento, $gender, $dni)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
        $affected = DB::table('bd_persons')
            ->where('bd_persons_id', $id_person)
            ->update(['name' => $name,
                'lastName' => $lastName,
                'email' => $email,
                'birth_date' => $fechaNacimiento,
                'gender' => $gender,
                //'dni' => $dni,
                'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
        return $affected;
    }
    //delete
    //POST ELIMINAR ADMIN
    public function deleteAdmin($bd_users_id)
    {
        // FIRST DELETE DATA bd_users  = datos del admin
        //SECOND DELET DATA bd_persons = datos persona
        //SEARCH in bd_users bd_persons_id
        $deleteDataAdmin = DB::table('bd_users')
        ->where('bd_persons_id', $bd_users_id)
        ->delete();

        $delete = DB::table('bd_persons')
            ->where('bd_persons_id', $bd_users_id)
            ->delete();
        return $delete;

    }

// *******VALIDATION DATA***********************
    public function userExist($email)
    {
        $user = DB::table('bd_persons')
            ->where('email', $email)
            ->get();

        return $user;
    }

}
