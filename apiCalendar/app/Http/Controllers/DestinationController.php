<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use App\Repositories\DestinationsServiceRepository;


class DestinationController extends BaseController
{
    //GET PARA DESTINOS
    public function readAllDestinations($id_org){
        $gestionDestino = new DestinationsServiceRepository;

        $results = $gestionDestino->readAllDestinos($id_org); 

        if (count($results) == 0) {
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
            return $this->sendResponse($results, 'Mostrar Destinos correctamente.');

        }

    }

    //POST PARA DESTINOS
    public function createDestino(Request $request, $id_org)
    {
        
        $gestionDestino = new DestinationsServiceRepository;
        //VALIDATE inputs
        if (count($request->all()) < 2) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }
        if (count($request->all()) >= 2 ) {
            $destinoExist = $gestionDestino->destinoExist($request->input('name'), $request->input('id_city'), $id_org);
            $cityExist = $gestionDestino->cityExist( $request->input('id_city'));
            $org = $gestionDestino->orgExist( $id_org);

            if(count($cityExist)== 0 && count($org)==0 ){
                return $this->sendError('Parámetros inválidos.', 'ID Foreign KEYS'); 
            }
            if (count($destinoExist) == 0 ) {
                //REGISTRAR
                $insert = $gestionDestino->newDestino(
                    $request->input('name'),
                    $request->input('availability'), 
                    $request->input('description1'),
                    $request->input('description2'),
                    $id_org,
                    $request->input('id_city')
                );
                return $this->sendResponse('Destino creado correctamente', 'Destino Biking Dutchman registrado.');

            }else{
                // YA ESTA REGISTRADO
                return $this->sendError('Registro incorrecto, ya existe un registro con el mismo nombre, parámetros inválidos.', 'Registro coincide con uno existente');

            }
        }
    

    }

    // Get - By Id DESTINOS
    public function getDestinoById($id_destination, $id_org)
    {
        $gestionDestino = new DestinationsServiceRepository;
        
        $destino = $gestionDestino->getDestinoById($id_destination, $id_org);

        if (count($destino) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
           
            return $this->sendResponse($destino, 'Destino');
        }

    }

    //UPDATE PARA DESTINOS

    public function updateDestino($id_destination, Request $request){
        
        $gestionDestino = new DestinationsServiceRepository;

        // verficate if exist this Destino
        $destinoIsRegister = $gestionDestino->getDestinoById($id_destination);
        if (count($destinoIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Destino no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            
            if (count($request->all()) >= 2) {
                //EDIT TABLE bd_destination
                $gestionDestino->updateDestino(
                    $id_destination,
                    $request->input('city'),
                    $request->input('descriptionCity'),
                    $request->input('name'),
                    $request->input('availability'),
                    $request->input('isActive'),
                    $request->input('description1'),
                    $request->input('description2'),
                    $request->input('value'),
                    $request->input('status'),
                    $destinoIsRegister[0]
        );
        $newRegisterDestino = $gestionDestino->getDestinoById($id_destination);

        return $this->sendResponse($newRegisterDestino, 'Destino modificado correctamente.');
    } else {
        return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');
    
    }
    }
    }

    //DELETE PARA DESTINOS
    public function deleteDestino($id_destination, $id_org){
        $gestionDestinos = new DestinationsServiceRepository;
        //return $bd_destination_id;
        //die();
        $destinoRegister = $gestionDestinos->getDestinoById($id_destination, $id_org);
       
        if (count($destinoRegister) == 0) {
            // no hay Datos
            return $this->sendError('Destino no encontrado', 'Ningun destinoo insertado en esta tabla.');
        } else {
            $destinoRegister = $gestionDestinos->deleteDestino($id_destination, $id_org);
            return $this->sendResponse('Destino Eliminado', 'Destino dado de baja');
        }

    }


}