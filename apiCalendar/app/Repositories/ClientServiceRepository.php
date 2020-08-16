<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

Class ClientServiceRepository

{
    //GET - READ ALL CLIENT
public function getAllClients($id_org)
{
    //ALWAYS JOIN WITH TABLE PERSON to view data
    $clients = DB::table('bd_clients')
    ->join('bd_organization', 'bd_clients.bd_organization_id', '=', 'bd_organization.bd_organization_id')
    ->join('bd_persons', 'bd_clients.bd_persons_id', '=', 'bd_persons.bd_persons_id')
    ->select('bd_clients.*', 'bd_organization.*', 'bd_persons.*')
    ->where('bd_clients.bd_organization_id', $id_org) 
    //->orderBy('bd_users.created_at', 'desc')
    ->get();
    return $clients;
}
//GET - CLIENT BY ID
public function getClientsById($id_client)
{
    $client = DB::table('bd_clients')
    ->join('bd_persons', 'bd_clients.bd_persons_id', '=', 'bd_persons.bd_persons_id')  
    ->join('bd_organization', 'bd_clients.bd_organization_id', '=', 'bd_organization.bd_organization_id')
    ->select('bd_clients.*','bd_clients.description1 as descriptionC', 'bd_clients.description2 as descriptionC2', 'bd_organization.bd_organization_id', 'bd_persons.*')
    ->where('bd_clients.bd_clients_id', $id_client) 
    ->get();
    return $client;
    }
//GET - PERSON BY ID
public function getPersonById($id_person)
    {
        $client = DB::table('bd_clients')
        ->where('bd_persons_id', $id_person) 
        ->get();
        return $client;
        }
  //GET PERSONS
  public function getAllPersons(){
    $persons = DB::table('bd_persons')
        ->get();
    return $persons;
  }
   //POST - CREAR CLIENTES
   public function newClient(
    $nameP, $lastNameP, $emailP, $fechaNacimientoP, $genderP, $dniP, $descripcionP,   
    $nacionalityC, $heightC ,$weightC ,$passportC, $description1C,$id_org)
   {
     date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
     $fecha = new DateTime('NOW');

      // INSERTAR EN LA TABLA PERSONA
      $newPerson = DB::table('bd_persons')->insert([
        'name' => $nameP,
        'lastName' => $lastNameP,
        'email' => $emailP,
        'birth_date' => $fechaNacimientoP,
        'gender' => $genderP,
        'dni' => $dniP,
        'isActive' => true,
        'value' => 1,
        'description1' => $descripcionP,
        'created_at' => $fecha->format('Y-m-d H:i:s')
    ]);
    
    // CONSULTAR EL ID DE LA ULTIMA PERSONA INGRESADA
    $lastPersonCreated = DB::table('bd_persons')
    ->where('dni', $dniP)
    ->get(); 

    // INSERTAR EN LA TABLA BD CLIENT
    $newClient = DB::table('bd_clients')->insert([
        'nacionality' => $nacionalityC,
        'height' => $heightC,
        'weight' => $weightC,
        'passport' => $passportC,
        'isActive' => true,
        'description1' => $description1C,
<<<<<<< HEAD
<<<<<<< HEAD
      //  'description2' => $description2C,
=======
        'description2' => null,
>>>>>>> kv-branch-bkd
=======
        'description2' => null,
>>>>>>> master
        'value' => 1,
        'status' => true,
        'bd_organization_id' => $id_org,
        'bd_persons_id' => $lastPersonCreated[0]->bd_persons_id,
        'created_at' => $fecha->format('Y-m-d H:i:s')
    ]);
    return $newClient;
}


public function updateClientsPerson($id_person, $nameP, $lastNameP, $emailP, $fechaNacimientoP, $genderP, $dniP, $descriptionP,
$nacionalityC, $heightC ,$weightC ,$passportC, $description1C, $description2C)
{
  date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
  $fecha = new DateTime('NOW');
    $affected = DB::table('bd_persons')
        ->where('bd_persons_id', $id_person)
        ->update([
            'name' => $nameP,
            'lastName' => $lastNameP,
            'email' => $emailP,
            'birth_date' => $fechaNacimientoP,
            'gender' => $genderP,
            'dni' => $dniP,
            'description1' => $descriptionP,
            'nacionality' => $nacionalityC,
            'height' => $heightC,
            'weight' => $weightC,
            'passport' => $passportC,
            'description1' => $description1C,
            'description2' => $description2C,
            'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
    return $affected;
}

    //POST - ELIMINAR CLIENTE
    public function deleteClient($bd_clients_id, $id_org)
    {
        // FIRST DELETE DATA bd_clients  = datos del client
        //SECOND DELET DATA bd_persons = datos persona
        //SEARCH in bd_clients bd_persons_id
        $deleteClient = DB::table('bd_clients')
        ->where('bd_persons_id', $bd_clients_id)
        ->where('bd_organization_id', $id_org)
        ->delete();

        $delete = DB::table('bd_persons')
        ->where('bd_persons_id', $bd_clients_id)
        ->delete();
        return $delete;

    }
    // *******VALIDATION DATA***********************
    public function clientExist($passport)
    {
        $client = DB::table('bd_clients')
            ->where('passport', $passport)
            ->get();

        return $client;
    }
}
















