<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\PDFServiceRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends BaseController
{

    public function pdf(Request $request, $id_org)
    {
        $gestionPDF = new PDFServiceRepository;
        // determinar el tipo de documento a imprimir

        switch ($request->input('option')) {
            case '0':
                return $this->sendResponse('Porfavor ingrese un tipo de documento', 'Invalido');
            break;
            case '1':
                return $this->sendResponse('Reporte *Órdenes Tours*', 'Órdenes Tours');
                break;
            case '2':
                return $this->sendResponse('Reporte *Usuarios (Clientes)*', 'Usuarios (Clientes)');
                break;
            case '3':
                return $this->sendResponse('Reporte *Usuarios (Administradores)*', 'Usuarios (Administradores)');
                break;
            case '4':

                $destinations = $gestionPDF->readAllDestinos($id_org);
                $pdf = PDF::loadView('reportTest', compact('destinations'))->setPaper('a4', 'landscape');
                return $pdf->download('reportes_BikingDutchman.pdf');

                // $this->sendResponse('Reporte *Destinos y Ciudades*', 'Destinos y Ciudades');
                break;
            case '5':
                return $this->sendResponse('Reporte *Paquetes*', 'Paquetes');
                break;
            default:
                # code...
                break;
        }
       
    }

    public function pdfByTipe($id_org, $number_pdf)
    {
        $gestionPDF = new PDFServiceRepository;

        switch ($number_pdf) { // x numero de documento
            case 1:
                $destinations = $gestionPDF->readAllDestinos($id_org);
                $pdf = PDF::loadView('reportTest', compact('destinations'))->setPaper('a4', 'landscape');
                return $pdf->download('reportes_BikingDutchman.pdf');

                break;
            case 2:
                # code...
                break;
            case '3':
                # code...
                break;
            default:
                # code...
                break;
        }

    }
}
