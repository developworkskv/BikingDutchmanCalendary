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
    ->join('bd_destination', 'bd_destination.bd_destination_id', '=', 'bd_destination.bd_destination_id')
    ->join('bd_packages_destination', 'bd_packages_destination.bd_packages_destination_id', '=', 'bd_packages_destination.bd_packages_destination_id')
    ->select('bd_packages.*', 'bd_packages_destination.code_pack_destination as codePack', 'bd_destination.name as nameD')
    ->where('bd_packages.bd_packages_id', $id_pack)
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

//UPDATE PACKS
public function updatePackages($bd_packages_id, $tipoPack, $name, $price, $numbers_passengers, $numbers_days, $difficulty, $length, $description1, $description2){
    
    date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
    $fecha = new DateTime('NOW');
      DB::table('bd_type_packages')
          ->where('bd_type_packages_id', $bd_packages_id)
          ->update(['name' => $tipoPack,
              
              'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);


      DB::table('bd_packages')
          ->where('bd_packages_id', $bd_packages_id)
          ->update([
            'name' => $name,
            'price' =>$price,
            'numbers_passengers' =>$numbers_passengers,
            'number_days' =>$numbers_days,
            'difficulty' =>$difficulty,
            'length' =>$length,
            'description1' => $description1,
            'description2' => $description2,
            'updated_at' =>  $fecha->format('Y-m-d H:i:s')
          ]);

     $paquete = DB::table('bd_packages')
          ->where('bd_packages_id', $bd_packages_id) 
          ->get();

          return $paquete;

}





public function updatePackDestination($code , $bd_destination_id, $bd_packages_id){
    date_default_timezone_set('America/Guayaquil');
    $fecha = new DateTime('NOW');

    $newPackDestination = DB::table('bd_packages_destination')->insert([
        'code_pack_destination' =>$code,
        'bd_destination_id' =>$bd_destination_id,
        'bd_packages_id' =>$bd_packages_id,
        'updated_at' =>  $fecha->format('Y-m-d H:i:s')
    ]);
    
}

public function getLastRow(){
   return  $deletePackage = DB::table('bd_packages')
   ->get()->last();
}

public function getPackByCodePackDetail($codePack, $id_org)
{
    $packages = DB::table('bd_packages_destination')
    ->join('bd_destination', 'bd_packages_destination.bd_destination_id', '=', 'bd_destination.bd_destination_id')
    ->join('bd_packages', 'bd_packages_destination.bd_packages_id', '=', 'bd_packages.bd_packages_id')
    ->join('bd_type_packages', 'bd_packages.bd_type_packages_id', '=', 'bd_type_packages.bd_type_packages_id')
    ->join('bd_cities', 'bd_destination.bd_cities_id', '=', 'bd_cities.bd_cities_id')
    ->select('bd_packages_destination.code_pack_destination as codigoPack', 'bd_packages.name as nombrePack', 'bd_packages.price', 'bd_packages.numbers_passengers', 'bd_packages.difficulty', 'bd_packages.length', 'bd_packages.number_days', 'bd_packages.description1', 'bd_packages.description2','bd_destination.name as destino', 'bd_cities.name as ciudad', 'bd_type_packages.name as tipoPack')
    ->where('bd_packages_destination.code_pack_destination', $codePack)
    ->where('bd_packages.bd_organization_id', $id_org)
    ->get();

    return $packages;
}

}