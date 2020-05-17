<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\PackageServiceRepository;
use Illuminate\Support\Facades\DB;

class PackagesController extends BaseController
{
   
    //*******************************  CRUD - TIPE PACKAGE ********************************
    //POST CREAR ADMIN
    public function createTypePackages(Request $request, $id_org)
    {
        $gestionPaquetes = new PackageServiceRepository;
        //validate if existe all Request // return count($request->all()); == 6
        if (count($request->all()) < 2) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }

        if (count($request->all()) >= 2 ) {
            // verificar si ese email ya existe registrado
            $packExist = $gestionPaquetes->typePackExist($request->input('name'));
            // si existe no existe usuario registrado con ese email inserte
            if (count($packExist) == 0) {
                $insert = $gestionPaquetes->newTipePack(
                    $request->input('name'),
                    $request->input('description'),
                    $request->input('description2'),
                    $id_org,
 
                );
                return $this->sendResponse('Tipo paquete creado', 'Tipo de Paquete Biking Dutchman registrado.');
            } else {
                // Existe un registro en el Array $userExist - un registro en la base con el email ingresado
                return $this->sendError('Tipo paquete no creado', 'Error, no se puede crear un tipo de paquete con el mismo nombre de uno ya existente.');
            }
        }
    }

    // GET - TYPE PACKAGES
    public function getAllTypesPackages($id_org =1 ) //DATO QUEMADO HASTA UTILIZAR FRONT END
    {
        $gestionPaquetes = new PackageServiceRepository;
        $packages = $gestionPaquetes->getAllTypePackages($id_org);
        if (count($packages) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
            return $this->sendResponse($packages, 'Todos los tipos de paquetes');
        }
    }
    // Get - By Id
    public function getTypePackageId($id_package, $id_org)
    {
        $gestionPaquetes = new PackageServiceRepository;
        $package = $gestionPaquetes->getTypePackageById($id_package, $id_org);

        if (count($package) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
           
            return $this->sendResponse($package, 'Tipo de paquete');
        }

    }
     //UPDATE - MODIFI DATA $administrators
    public function updateTypePackageData($id_type_package, $id_org, Request $request)
    {
        $gestionPaquetes = new PackageServiceRepository;
        // verficate if exist this user
        $typePackageIsRegister = $gestionPaquetes->getTypePackageById($id_type_package, $id_org);
        if (count($typePackageIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Tipo Paquete no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            if (count($request->all()) >= 2) {
                //EDIT TABLE bd_persons
                $gestionPaquetes->updateTypePackage(
                    $id_type_package,
                    $request->input('name'),
                    $request->input('description1'),
                    $request->input('description2'),
                    $typePackageIsRegister[0]->bd_organization_id
                );
                $newRegisterEdit = $gestionPaquetes->getTypePackageById($id_type_package, $id_org);

                return $this->sendResponse($newRegisterEdit, 'Tipo Paquete  modificado correctamente.');
            } else {
                return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');

            }
        }

    }

    public function deleteTypePackage($id_package, $id_org)
    {
        $gestionPaquetes = new PackageServiceRepository;
        // verificar si el usuario existe para borrar
        $typePackageIsRegister = $gestionPaquetes->getTypePackageById($id_package, $id_org);
        if (count($typePackageIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Registro no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $gestionPaquetes->deleteTypePackages($id_package, $id_org);
            return $this->sendResponse('Tipo Paquete Eliminado', 'Tipo Paquete dado de baja');
        }
    }

    public function getAllTypesPackagesBot(){
    
        $json='
        {
            "messages": [
              {
                "attachment": {
                  "type": "template",
                  "payload": {
                    "template_type": "button",
                    "text": "Hello! soy tu asistente virtual BKD",
                    "buttons": [

                      {
                        "type": "show_block",
                        "block_names": ["name of block"],
                        "title": "Show Block"
                      },
                      {
                        "type": "web_url",
                        "url": "https://rockets.chatfuel.com",
                        "title": "Visit Website"
                      },
                      {
                        "url": "https://rockets.chatfuel.com/api/welcome",
                        "type":"json_plugin_url",
                        "title":"Postback"
                      }
                    ]
                  }
                }
              }
            ]
          }';

    echo ($json);

}
}
