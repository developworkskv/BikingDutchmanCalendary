<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Repositories\PDFServiceRepository;
use App\Http\Controllers\BaseController;

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
}
