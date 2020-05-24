<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use App\Repositories\DestinationsServiceRepository;


class DestinationController extends BaseController
{
    //GET PARA DESTINOS
    public function readAllDestino(){

        $results = DB::table('bd_destination')->get();

        if (count($results) == 0) {
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');

    } else {
        return $this->sendResponse($results, 'Mostrar Destino correctamente.');

    }

    }

    //POST PARA DESTINOS
    public function createDestino(Request $request)
    {
        $gestionDestino = new DestinationsServiceRepository;

        //validate if existe all Request // return count($request->all()); == 6
        if (count($request->all()) < 4) {
            return $this->sendError('Datos Incompletos', 'Error, porfavor ingresa los datos solicitados');
        }

        if (count($request->all()) >= 2 ) {
       
            // verificar si ese email ya existe registrado
            $destinoExist = $gestionDestino->destinoExist($request->input('name'));
         
            // si existe o no existe destino registrado con ese nombre inserte
            if (count($destinoExist) == 0) {
        
        $insert = $gestionDestino->newDestino(
            $request ->input('name'),
            $request ->input('availability'),
            $request ->input('description'),
            $request ->input('description2')     
        );
        return $this->sendResponse('Destino creado', 'Destino creado correctamente.');
            } else {
                // Existe un registro en el Array $userExist - un registro en la base con el email ingresado
                return $this->sendError('Destino ya registrado', 'Error, ya existe un destino.');
            }
        }
    }

    // Get - By Id DESTINOS
    public function getDestinoById($id_destination)
    {
        $gestionDestino = new DestinationsServiceRepository;
        
        $destino = $gestionDestino->getDestinoById($id_destination);

        if (count($destino) == 0) {
            // no hay Datos
            return $this->sendError('No existen registros', 'Ningun registro insertado en esta tabla.');
        } else {
           
            return $this->sendResponse($destino, 'Destino');
        }

    }

    //UPDATE PARA DESTINOS

    public function updateDestino(Request $request){
        
        $gestionPaquetes = new DestinationsServiceRepository;

        // verficate if exist this user
        $destinoIsRegister = $gestionDestino->getDestinoById($id_destination);
        if (count($destinoIsRegister) == 0) {
            // no hay Datos
            return $this->sendError('Destino no encontrado', 'Ningun registro insertado en esta tabla.');
        } else {
            
            if (count($request->all()) >= 2) {
                //EDIT TABLE bd_persons
                $gestionDestinos->updateDestino(
                    $id_destination,
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

        return $this->sendResponse($newRegisterDestino, 'Tipo Paquete  modificado correctamente.');
    } else {
        return $this->sendError('Ingresar los datos solicitados', 'Ningun registro modificado en esta tabla.');
    
    }
    }
    }

    //DELETE PARA DESTINOS
    public function deleteDestino($id_destination){
        $gestionDestinos = new DestinationsServiceRepository;
        //return $bd_destination_id;
        //die();
        $destinoRegister = $gestionDestinos->getDestinoById($id_destination);
        if (count($destinoRegister) == 0) {
            // no hay Datos
            return $this->sendError('Destinoo no encontrado', 'Ningun destinoo insertado en esta tabla.');
        } else {
            $gestionDestinos->deleteDestinos($id_destination);
            return $this->sendResponse('Destino Eliminado', 'Destino dado de baja');
        }

    }


}