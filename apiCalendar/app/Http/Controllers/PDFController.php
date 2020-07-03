<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\PDFServiceRepository;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends BaseController
{

    public function pdf($id_org)
    {
        $gestionPDF = new PDFServiceRepository;

        $destinations = $gestionPDF->readAllDestinos($id_org);
        //   return $destinations[0]->name;
        // die();
        $pdf = PDF::loadView('reportTest', compact('destinations'))->setPaper('a4', 'landscape');
        return $pdf->download('reportes_BikingDutchman.pdf');
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
