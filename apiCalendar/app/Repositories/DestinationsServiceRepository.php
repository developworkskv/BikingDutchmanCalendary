<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class DestinationsServiceRepository
{
    //validar si existe el destino
    public function destinoExist($nombreDestino,$id_city, $id_org){
        $destino = DB::table('bd_destination')
        ->where('name', $nombreDestino)
        ->where('bd_cities_id', $id_city)
        ->where('bd_organization_id', $id_org)
        ->get();
        
    return $destino;
    }
        //validar si existe el destino
        public function cityExist($id_city){
            $city = DB::table('bd_cities')
            ->where('bd_cities_id', $id_city)
            ->get();
            
        return $city;
        }
        public function orgExist($id_org){
            $org = DB::table('bd_organization')
            ->where('bd_organization_id', $id_org)
            ->get();
            
        return $org;
        }
     //GET BY ID DESTINOS
     public function getDestinoById($id_destination, $id_org)
     {
         $destino = DB::table('bd_destination')
         ->join('bd_cities', 'bd_destination.bd_cities_id', '=', 'bd_cities.bd_cities_id')
         ->join('bd_organization', 'bd_destination.bd_organization_id', '=', 'bd_organization.bd_organization_id')
         ->select('bd_destination.*', 'bd_cities.name as city', 'bd_cities.description as descriptionCity')
         //->where('bd_destination_id', $id_destination) 
         //->where('bd_organization_id', $id_org, $id_destination)
         ->where('bd_destination.bd_destination_id', $id_destination)
         ->get();
         return $destino;
     }
     // GET ALL DESTINATIONS 
     public function readAllDestinos( $id_org)
     {
         $destino = DB::table('bd_destination')
         ->join('bd_cities', 'bd_destination.bd_cities_id', '=', 'bd_cities.bd_cities_id')
         ->select('bd_destination.*', 'bd_cities.name as city', 'bd_cities.description as descriptionCity')
         ->where('bd_destination.bd_organization_id', $id_org) 
         ->get();
         return $destino;
     }
     

    //POST CREAR DESTINO
    public function newDestino($name,$availability, $description1,$description2, $id_org, $id_city)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
      // INSERTAR EN LA TABLA PERSONA
        $newDestino = DB::table('bd_destination')->insert([
            'name' => $name,
            'isActive' => true,
            'availability' => $availability,
            'description1' => $description1,
            'description2' => $description2,
            'value' => 1,
            'status' => 1,
            'bd_organization_id' => $id_org,
            'bd_cities_id' => $id_city,
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
    
        return $newDestino;
    }


    //DELETE PARA DESTINOS
    public function deleteDestino($bd_destination_id, $id_org)
    {
        $deleteDestino = DB::table('bd_destination')
        ->where('bd_destination_id', $bd_destination_id)
        ->where('bd_organization_id', $id_org)
        ->delete();
        return $deleteDestino;

    } 

    //UPDATE PARA DESTINOS 
   
    public function updateDestino($bd_destination_id, $nameC, $availability, $isActive, $description, $description2, $value, $status)
    {
        date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
        $fecha = new DateTime('NOW');
          $affected = DB::table('bd_destination')
              ->where('bd_destination_id', $bd_destination_id)
              ->update([
                  'nameC' => $nameC,
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
