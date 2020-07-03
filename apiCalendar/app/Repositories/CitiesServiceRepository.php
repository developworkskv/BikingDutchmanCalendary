<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class CitiesServiceRepository
{
    //validar si existe el destino
    public function cityExist($nameCity, $id_org){
        $city = DB::table('bd_cities')
        ->where('name', $nameCity)
        ->where('bd_organization_id', $id_org)
        ->get();
        
    return $city;
    }

     //GET BY ID CIUDAD
     public function getCityById($id_city, $id_org)
     {
         $city = DB::table('bd_cities')
         ->where('bd_cities_id', $id_city) 
         ->where('bd_organization_id', $id_org) 
         ->get();
         return $city;
     } 

    //POST CREAR DESTINO
    public function newCity($name, $description, $id_org)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
      // INSERTAR EN LA TABLA PERSONA
        $newCity = DB::table('bd_cities')->insert([
            'name' => $name,
            'isActive' => true, // disponibilidad si no
            'description' => $description,
            'value' => 1,
            'status' => 1,
            'bd_organization_id' => $id_org,
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
    
        return $newCity;
    }


    //DELETE PARA DESTINOS
    public function deleteCity($id_city, $id_org)
    {
        $deleteDestino = DB::table('bd_cities')
        ->where('bd_cities_id', $id_city)
        ->where('bd_organization_id', $id_org)
        ->delete();
        return $deleteDestino;

    } 

    //UPDATE PARA DESTINOS 
   
    public function updateCityData($id_city,$id_org, $name, $description)
    {
        date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
        $fecha = new DateTime('NOW');
          $affected = DB::table('bd_cities')
              ->where('bd_cities_id', $id_city)
              ->where('bd_organization_id', $id_org)
              ->update([
                  'name' => $name,
                  'description' => $description,
                  'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
          return $affected;
    }

    //reade
    //all
    public function getAllCities($id_org)
    {
        $typesPackages = DB::table('bd_cities')
        ->where('bd_organization_id', $id_org)
        ->get();
        return $typesPackages;
    }
}

