<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class PackServiceRepository{

// **************  CRUD ******************
    //CREATE - POST

public function newPack($name, $price, $numbersPassengers, $isActive, $description, $description2, $value, $status, $dificultad, $longitud, $number_days, $id_org, $id_type_packages){
    $fecha = new DateTime('NOW');
    //INSERTAR EN LA TABLA PACKAGES
    $newPack = DB::table('bd_packages')->insert([
        'name' =>$name,
        'price' =>$price,
        'numbers_passengers' =>$numbersPassengers,
        'isActive' => $isActive,
        'description1' => $description,
        'description2' => $description2,
        'value' => $value,
        'status' => $status,
        'number_days' => $number_days,
        'length' => $longitud,
        'difficulty' => $dificultad,
        'bd_organization_id' => $id_org,
        'bd_type_packages_id' => $id_type_packages,
        'created_at' => $fecha->format('Y-m-d H:i:s')
    ]);
    
}

//GET ALL PACKAGES
public function getAllPacks($id_org)
{ // se relaciona con varias tablas - tabla principal => bd_packages_destination
 
    $packages =  DB::select('SELECT a.bd_packages_destination_id as ID_PACK_DEST,
    a.code_pack_destination as CODIGO , a.bd_destination_id as ID_DESTINO,
    a.bd_packages_id as ID_PACKAGE, b.name as Nombre_Paquete,d.name as DESTINO,
    d.description1 as Description_destino, b.price as precio_paquete,
    b.numbers_passengers, b.description1 as Descripcion_paquete,
    b.number_days, b.length as longitud_paquete, b.difficulty,
    c.name as Tipo_paquete, c.description1 as Descripcion_tipo_pack
    FROM biking.bd_packages_destination as a
    Inner Join biking.bd_packages as b
    ON a.bd_packages_id = b.bd_packages_id
    inner join biking.bd_type_packages as c
    ON b.bd_type_packages_id = c.bd_type_packages_id
    right join biking.bd_destination as d
    on a.bd_destination_id = d.bd_destination_id
    WHERE b.bd_organization_id = '.$id_org.' 
    ORDER BY CODIGO');
    return $packages;

}
//GET BY ID PACKAGES
public function getPackById($id_pack, $id_org)
{
    $packages = DB::table('bd_packages')
    ->where('bd_packages_id', $id_pack)
    ->where('bd_organization_id', $id_org)
    ->get();
    return $packages;
}

//DELETE PACKAGES
public function deletePack($id_package, $id_org)
{
    $deletePackage = DB::table('bd_packages')
    ->where('bd_packages_id', $id_package)
    ->where('bd_organization_id', $id_org)
    ->delete();
    return $deletePackage;

}

//UPDATE 
public function updatePackages($id_package, $name, $price, $numbersClients, $description, $description2, $id_org){
    date_default_timezone_set('America/Guayaquil');
    $fecha = new DateTime('NOW');
$affected = DB::table('bd_packages')
              ->where('bd_packages_id', $id_package)
              ->where('bd_organization_id', $id_org)
              ->update([
                'name' => $name,
                'price' =>$price,
                'numbers_passengers' =>$numbersClients,
                'description1' => $description,
                'description2' => $description2,
                'updated_at' =>  $fecha->format('Y-m-d H:i:s')
              ]);
        return $affected;      

}

public function newPackDestination($code , $bd_destination_id, $bd_packages_id){
    date_default_timezone_set('America/Guayaquil');
    $fecha = new DateTime('NOW');

    $newPackDestination = DB::table('bd_packages_destination')->insert([
        'code_pack_destination' =>$code,
        'bd_destination_id' =>$bd_destination_id,
        'bd_packages_id' =>$bd_packages_id,
        'created_at' => $fecha->format('Y-m-d H:i:s')
    ]);
    
}

public function getLastRow(){
   return  $deletePackage = DB::table('bd_packages')
   ->get()->last();
}

}