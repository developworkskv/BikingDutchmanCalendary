<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\PackServiceRepository;
use App\Repositories\DestinationsServiceRepository;

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
    $rows = $gestionPaquetes->getPackByName($request->input('name'));
    $rowsCodeExist = $gestionPaquetes->getPackByCodePack($request->input('code'));

    if(count($rows) > 0 || count($rowsCodeExist)){
        return $this->sendError('Nombre o Código del paquete ya se encuentran registrados.', 'Error al crear paquete.');

    }else{
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
    $request->input('dificultad'),
    $request->input('longitud'),
    $request->input('number_days'),
    $id_org,
    $request->input('id_type_packages')
       
);

return $this->sendResponse('Paquete creado', 'Paquete Biking Dutchman registrado.');

    }
    
}
public function createPackDestination(Request $request,$id_org,$id_destino){
    $gestionPaquetes = new PackServiceRepository;
    $gestionDestinos = new DestinationsServiceRepository;
    $id_package = $gestionPaquetes->getLastRow();
    $destination = $gestionDestinos->getDestinoById($id_destino , $id_org);
    // INSERT AL LA TABLA DE ROMPIMIENTO
     $insertTableRelacion = $gestionPaquetes->newPackDestination(
        $request->input('code'),
        $id_destino,
        $id_package->bd_packages_id, // Id_del Query obtenido         
    );
    return $this->sendResponse('Destino '.' '. $destination[0]->name.'-'.$destination[0]->city.' '. 'agregado', 'Destino enlazado al paquete.');

}
// Get - By Id
public function getPacksById($id_pack, $id_org)
{
    $gestionPack = new PackServiceRepository;
    $package = $gestionPack->getPackById($id_pack, $id_org);

    if (count($package) == 0) {
        // no hay Datos
        return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
    } else {
       
        return $this->sendResponse($package, 'Paquete');
    }

}
//DELETE - 
public function deletePacks($code_pack, $id_org)
    {
        $gestionPack = new PackServiceRepository;
        $packages = $gestionPack->getPackByCodePack($code_pack);
        $id_pack =  $packages[0]->bd_packages_id; // id_paquete a eliminar

        $gestionPack->deletePack($id_pack, $id_org);
        return $this->sendResponse('Paquete Eliminado', 'Paquete dado de baja');
       
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

//get codepack
public function getPacksByCodePacks($code, $id_org){
    $gestionPack = new PackServiceRepository;
    $packageDetail = $gestionPack->getPackByCodePackDetail($code, $id_org);

    if (count($packageDetail) == 0) {
        // no hay Datos
        return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
    } else {
       
        return $this->sendResponse($packageDetail, 'Paquete');
    }

}

}
