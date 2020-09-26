<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use App\Repositories\CitiesServiceRepository;

class CitiesController extends BaseController
{
   
    //*******************************  CRUD - Cities  ********************************
    //POST CREAR ADMIN
    public function createCity(Request $request, $id_org)
    {
        $gestionCities = new CitiesServiceRepository;
        //validate if existe all Request // return count($request->all()); == 6
        if (count($request->all()) < 1) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }

        if (count($request->all()) >= 1 ) {
            // verificar si ese email ya existe registrado
            $cityExistName = $gestionCities->cityExist($request->input('name'), $id_org);
            // si existe no existe usuario registrado con ese email inserte
            if (count($cityExistName) == 0) {
                $insert = $gestionCities->newCity(
                    $request->input('name'),
                    $request->input('description'),
                    $id_org
 
                );
                return $this->sendResponse('Nueva ciudad registrada: ' . $request->input('name'), 'Registro correcto.');
            } else {
                // Existe un registro en el Array $userExist - un registro en la base con el email ingresado
                return $this->sendError('La ciudad ya esta registrada en el sistema.', 'Error, registro ya existente.');
            }
        }
    }

    // GET - TYPE PACKAGES
    public function getAllCities($id_org) //DATO QUEMADO HASTA UTILIZAR FRONT END
    {
        $gestionCities = new CitiesServiceRepository;
        $cities = $gestionCities->getAllCities($id_org);
        if (count($cities) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
            return $this->sendResponse($cities, 'Todas las ciudades');
        }
    }
    // Get - By Id
    public function getCityId($id_city, $id_org)
    {
        $gestionCities = new CitiesServiceRepository;
        $city = $gestionCities->getCityById($id_city, $id_org);

        if (count($city) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
           
            return $this->sendResponse($city, 'Ciudad');
        }

    }
     //UPDATE - MODIFI DATA $administrators
    public function updateCityData($id_city, $id_org, Request $request)
    {
        $gestionCities = new CitiesServiceRepository;
        // verficate if exist this user
        $cityIsRegister = $gestionCities->getCityById($id_city, $id_org);
        if (count($cityIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('No se ha encontrado el servicio', 'Ningun registro insertado en esta tabla.');
        } else {
            if (count($request->all()) >= 1) {
                //EDIT TABLE bd_persons
                $gestionCities->updateCityData(
                    $id_city,
                    $cityIsRegister[0]->bd_organization_id,
                    $request->input('name'),
                    $request->input('description')
                );
                $newRegisterEdit = $gestionCities->getCityById($id_city, $id_org);

                return $this->sendResponse($newRegisterEdit, 'Registro modificado correcto.');
            } else {
                return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');

            }
        }

    }

    public function deleteCity($id_city, $id_org)
    {
        $gestionCities = new CitiesServiceRepository;
        // verificar si el usuario existe para borrar
        $cityIsRegister = $gestionCities->getCityById($id_city, $id_org);
        if (count($cityIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Registro no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            $gestionCities->deleteCity($id_city, $id_org);
            return $this->sendResponse('Registro ciudad eliminado correctamente', 'Tipo Paquete dado de baja');
        }
    }

    public function getAllTypesPackagesBot(){
    // https://docs.chatfuel.com/en/articles/735122-json-api
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
