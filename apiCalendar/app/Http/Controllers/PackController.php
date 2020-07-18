<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\PackServiceRepository;
use Illuminate\Support\Facades\DB;

class PackController extends BaseController
{
//*******************************  CRUD - PACKAGE ********************************
// GET ALL - PACKAGES
public function getAllPacks($id_org) //DATO QUEMADO HASTA UTILIZAR FRONT END
{
    $gestionPaquetes = new PackServiceRepository;
    $packs = $gestionPaquetes->getAllPacks($id_org);
    if (count($packs) == 0) {
        // no hay Datos
        return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
    } else {
        return $this->sendResponse($packs, 'Todos los paquetes');
    }
}
//POST - PACKAGES
public function createPack(Request $request, $id_org, $id_destino){
    $gestionPaquetes = new PackServiceRepository;
    // INSERTA EN LA TABLA 
    $insert = $gestionPaquetes->newPack(
        $request->input('name'),
        $request->input('price'),
        $request->input('numbers_passengers'),
        $request->input('isActive'),
        $request->input('description'),
        $request->input('description2'),
        $request->input('value'),
        $request->input('status'),
        $id_org,
        $request->input('id_type_packages')
           
    );
    // NECESITO EL ULTIMO REGISTRO DEL ANTERIOR QUERY
    // PARA OBTENER EL ID
    $id_package = $gestionPaquetes->getLastRow();
  
    // INSERT AL LA TABLA DE ROMPIMIENTO
     $insertTableRelacion = $gestionPaquetes->newPackDestination(
        $request->input('code'),
        $id_destino,
        $id_package->bd_packages_id, // Id_del Query obtenido         
    );

    return $this->sendResponse('Tipo paquete creado', 'Tipo de Paquete Biking Dutchman registrado.');

}
// Get - By Id
public function getPacksById($id_package, $id_org)
{
    $gestionPack = new PackServiceRepository;
    $package = $gestionPack->getPackById($id_package, $id_org);

    if (count($package) == 0) {
        // no hay Datos
        return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
    } else {
       
        return $this->sendResponse($package, 'Paquete');
    }

}
//DELETE - 
public function deletePacks($id_package, $id_org)
    {
        $gestionPaquetes = new PackServiceRepository;
        // verificar si el usuario existe para borrar
        $packIsRegister = $gestionPaquetes->getPackById($id_package, $id_org);
        if (count($packIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Registro no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $gestionPaquetes->deletePack($id_package, $id_org);
            return $this->sendResponse('Paquete Eliminado', 'Paquete dado de baja');
        }
}


  //UPDATE - MODIFI DATA $administrators
  public function updatePackageData($id_package, $id_org, Request $request)
  { // corrige los nombres y inputs
      $gestionPaquetes = new PackServiceRepository;
      // verficate if exist this user
      $packIsRegister = $gestionPaquetes->getPacksById($id_package, $id_org);
      if (count($packIsRegister) == 0) {
          // no hay Datos
          return $this->sendError('Paquete no encontrado', 'Ningun registro insertado en esta tabla.');
      } else {
          if (count($request->all()) >= 2) {
              //EDIT TABLE bd_persons
              $gestionPaquetes->updatePackages(
                  $id_package,
                  $request->input('name'),
                  $request->input('price'),
                  $request->input('numbers_passengers'),
                  
                  $request->input('description'),
                  $request->input('description2'),
              

                 
                  $id_org,
              );
              $newRegisterEdit = $gestionPaquetes->getPacksById($id_package, $id_org);

              return $this->sendResponse($newRegisterEdit, 'Paquete  modificado correctamente.');
          } else {
              return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');

          }
      }


}
}
