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

    $packages =  DB::select('SELECT DISTINCT(b.code_pack_destination) , c.name as type_tour, a.*
    from bd_packages a
    left join bd_packages_destination b
    On a.bd_packages_id = b.bd_packages_id
    left join bd_type_packages c
    On a.bd_type_packages_id = c.bd_type_packages_id');

$destinations = DB::select('SELECT b.code_pack_destination ,  c.name
from bd_packages a
left join bd_packages_destination b
On a.bd_packages_id = b.bd_packages_id
left join bd_destination c
On b.bd_destination_id = c.bd_destination_id');

for ($j=0; $j < count($packages); $j++) { 
    $dataDestinos = array();

    for ($i=0; $i < count($destinations) ; $i++) { 
        if($destinations[$i]->code_pack_destination == $packages[$j]->code_pack_destination){
            array_push($dataDestinos,$destinations[$i]->name );
            $packages[$j]->destinos = $dataDestinos ;
            
        }else{
           // array_push($dataDestinos,null);
        }
    }
}


    return $packages;
    //return array_unique($packages, SORT_REGULAR);
}

public function allCodesPacks(){
    $packages_codes =  DB::select('SELECT a.bd_packages_destination_id as ID_PACK_DEST,
    a.code_pack_destination as CODIGO , a.bd_destination_id as ID_DESTINO, b.bd_organization_id as id_org,
    a.bd_packages_id as ID_PACKAGE, b.name as Nombre_Paquete
    FROM bd_packages_destination as a
    Inner Join bd_packages as b
    ON a.bd_packages_id = b.bd_packages_id
   
    WHERE b.bd_organization_id = 1
    ORDER BY CODIGO');

    return $packages_codes;
   
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
public function getPackByName($name)
{
    $packages = DB::table('bd_packages')
    ->where('name', $name)
    ->get();
    return $packages;
}

public function getPackByCodePack($code_pack)
{
    $packages = DB::table('bd_packages_destination')
    ->where('code_pack_destination', $code_pack)
    ->get();
    return $packages;
}

//DELETE PACKAGES
public function deletePack($id_pack, $id_org)
{

    // PRIMERO ELIMINAR REGISTROS DE TABLA RELACION
    $deletePackage = DB::table('bd_packages_destination')
    ->where('bd_packages_id', $id_pack)
    ->delete();
    // DESPUES ELIMINAR REGISTROS DE TABLA PACKAGES
    $deletePackage = DB::table('bd_packages')
    ->where('bd_packages_id', $id_pack)
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