<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class PackServiceRepository{

// **************  CRUD ******************
    //CREATE - POST

public function newPack($name, $price, $numbersClients, $description, $description2, $id_org, $id_type_packages){
    $fecha = new DateTime('NOW');
    //INSERTAR EN LA TABLA PACKAGES
    $newPack = DB::table('bd_packages')->insert([
        'name' =>$name,
        'price' =>$price,
        'numbers_clients' =>$numbersClients,
        'isActive' => true,
        'description1' => $description,
        'description2' => $description2,
        'value' => 1,
        'status' => 1,
        'bd_organization_id' => $id_org,
        'bd_type_packages_id' => $id_type_packages,
        'created_at' => $fecha->format('Y-m-d H:i:s')
    ]);
    
}
//by_Id
public function getPackById($id_package, $id_org)
{
    $pack = DB::table('bd_packages')
    ->join('bd_organization', 'bd_type_packages.bd_organization_id', '=', 'bd_organization.bd_organization_id')  
    ->select('bd_packages.*', 'bd_organization.name as organization')
    ->where('bd_type_packages.bd_organization_id', $id_org)
    //->where('bd_type_packages.bd_type_packages_id', $id_package)
    ->get();
    return $pack;
}

//GET ALL PACKAGES
public function getAllPacks($id_org)
{
    $packages = DB::table('bd_packages')
    ->get();
    return $packages;
}
public function getPacksById($id_pack, $id_org)
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
                'numbers_clients' =>$numbersClients,
                'description1' => $description,
                'description2' => $description2,
                'updated_at' =>  $fecha->format('Y-m-d H:i:s')
              ]);
        return $affected;      

}
}