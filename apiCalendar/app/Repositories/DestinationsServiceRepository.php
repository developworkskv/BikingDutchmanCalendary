<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class DestinationsServiceRepository
{
    //validar si existe el destino
    public function destinoExist($nombreDestino){
        $destino = DB::table('bd_destination')
        ->where('name', $nombreDestino)
        ->get();
        
    return $destino;
    }

     //GET BY ID DESTINOS
     public function getDestinoById($id_destination)
     {
         $destino = DB::table('bd_destination')
         ->where('bd_destination_id')
         ->get();
         return $destino;
     }

    //POST CREAR DESTINO
    public function newDestino($name,$availability, $description,$description2)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
      // INSERTAR EN LA TABLA PERSONA
        $newDestino = DB::table('bd_destination')->insert([
            'name' => $name,
            'isActive' => true,
            'availability' => $availability,
            'description1' => $description,
            'description2' => $description2,
            'value' => 1,
            'status' => 1,
            //'bd_organization_id' => $id_org,
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
    
        return $newDestino;
    }


    //DELETE PARA DESTINOS
    public function deleteDestinos($id_destination)
    {
        $deleteDestino = DB::table('bd_destination')
        ->where('bd_destination_id', $id_destination)
        ->delete();
        return $deleteDestino;

    } 

    //UPDATE PARA DESTINOS 
   
    public function updateDestino($id_destination, $name, $availability, $isActive, $description, $description2, $value, $status)
    {
        date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
        $fecha = new DateTime('NOW');
          $affected = DB::table('bd_destination')
              ->where('bd_destination_id', $id_destination)
              ->update([
                  'name' => $name,
                  'availability' => $availability,
                  'isActive' => $isActive,
                  'description1' => $description,
                  'description2' => $description2,
                  'value' => $value,
                  'status' => $status,
                  'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
          return $affected;
    }


}
