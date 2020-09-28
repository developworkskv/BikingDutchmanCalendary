<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class PackageServiceRepository
{
   
    // **************  CRUD ******************
    //create - POST
    public function newTipePack($name,$description,$description2, $id_org)
    {
      date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
      $fecha = new DateTime('NOW');
      // INSERTAR EN LA TABLA PERSONA
        $newTypePack = DB::table('bd_type_packages')->insert([
            'name' => $name,
            'isActive' => true,
            'description1' => $description,
            'description2' => $description2,
            'value' => 1,
            'status' => 1,
            'bd_organization_id' => $id_org,
            'created_at' => $fecha->format('Y-m-d H:i:s')
        ]);
    
        return $newTypePack;
    }
    //reade
    //all
    public function getAllTypePackages($id_org)
    {
        $typesPackages = DB::table('bd_type_packages')
        ->where('bd_organization_id', $id_org)
        ->get();
        return $typesPackages;
    }
    
    //by_Id
    public function getTypePackageById($id_package, $id_org)
    {
        $typePackage = DB::table('bd_type_packages')
        ->join('bd_organization', 'bd_type_packages.bd_organization_id', '=', 'bd_organization.bd_organization_id')  
        ->select('bd_type_packages.*', 'bd_organization.name as organization')
        ->where('bd_type_packages.bd_organization_id', $id_org)
        ->where('bd_type_packages.bd_type_packages_id', $id_package)
        ->get();
        return $typePackage;
    }
        
    //update
    public function updateTypePackage($id_type_package, $name, $description, $description2, $isActive, $status, $value, $id_org)
    {
        date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
        $fecha = new DateTime('NOW');
          $affected = DB::table('bd_type_packages')
              ->where('bd_type_packages_id', $id_type_package)
              ->where('bd_organization_id', $id_org)
              ->update([
                  'name' => $name,
                  'description1' => $description,
                  'description2' => $description2,
                  'isActive' => $isActive,
                  'status' => $status,
                  'values' => $value,
                  'updated_at' =>  $fecha->format('Y-m-d H:i:s')]);
          return $affected;
    }
    
    public function deleteTypePackages($id_typePackage, $id_org)
    {
        $deleteTipePackage = DB::table('bd_type_packages')
        ->where('bd_type_packages_id', $id_typePackage)
        ->where('bd_organization_id', $id_org)
        ->delete();
        return $deleteTipePackage;

    } 

// *******VALIDATION DATA***********************
    public function typePackExist($name)
    {
        $package = DB::table('bd_type_packages')
            ->where('name', $name)
            ->get();
            
        return $package;
    }

}
