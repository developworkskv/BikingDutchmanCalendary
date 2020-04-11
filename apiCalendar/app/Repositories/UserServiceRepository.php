<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class UserServiceRepository
{
    // **************  CRUD ******************
    //create - POST
    public function newAdmin($name, $email, $token, $password, $id_org, $id_user)
    {
        $newAdmin = DB::table('bd_users')->insert([
            'name' => $name,
            'email' => $email,
            'token' => $token,
            'password' => $password,
            'bd_organization_id' => $id_org,
            'bd_type_users_id' => $id_user,
        ]);
        return $newAdmin;
    }
    //reade
    //all
    public function getAllUserAdmin()
    {
        $usersAdministrators = DB::table('bd_users')
            ->get();
        return $usersAdministrators;
    }
    //by_Id
    public function getUserAdminById($id_admin)
    {
        $userAdministrator = DB::table('bd_users')
            ->where('bd_users_id', $id_admin)
            ->get();
        return $userAdministrator;
    }

    //update
    public function updateAdmin($id_user, $name, $email, $password, $id_type_user)
    {
        $affected = DB::table('bd_users')
            ->where('bd_users_id', $id_user)
            ->update(['name' => $name,
                'email' => $email,
                'password' => $password,
                'bd_type_users_id' => $id_type_user]);
        return $affected;
    }
    //delete
    //POST ELIMINAR ADMIN
    public function deleteAdmin($bd_users_id)
    {

        $delete = DB::table('bd_users')
            ->where('bd_users_id', $bd_users_id)
            ->delete();
        return $delete;

    }

// *******VALIDATION DATA***********************
    public function userExist($email)
    {
        $user = DB::table('bd_users')
            ->where('email', $email)
            ->get();

        return $user;
    }

}
