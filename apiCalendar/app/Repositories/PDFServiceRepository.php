<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class PDFServiceRepository
{
  
         // GET ALL DESTINATIONS 
         public function readAllDestinos( $id_org)
         {
             $destino = DB::table('bd_destination')
             ->join('bd_cities', 'bd_destination.bd_cities_id', '=', 'bd_cities.bd_cities_id')
             ->select('bd_destination.*', 'bd_cities.name as city', 'bd_cities.description as descriptionCity')
             ->where('bd_destination.bd_organization_id', $id_org) 
             ->get();
             return $destino;
         }
}
