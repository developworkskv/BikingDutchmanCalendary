<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use DateTime;

class BotServiceRepository
{
    //validar si existe el destino
    public function searchPacks($nameCity, $id_org){
        $valor = $nameCity;
        $search_packs = DB::select("SELECT DISTINCT(a.code_pack_destination), 
        b.name as pack,
        b.price,
        b.numbers_passengers,
        b.difficulty,
        b.length,
        b.number_days, 
        c.name as tipo_pack
        from bd_packages_destination a
        left join bd_packages b 
        ON a.bd_packages_id = b.bd_packages_id
        left join bd_type_packages c
        On b.bd_type_packages_id = c.bd_type_packages_id
        left join bd_destination d
        On a.bd_destination_id = d.bd_destination_id
        where d.name  ILIKE '%$valor%' ");

    return $search_packs;
    }
    
    public function searchPacksDetails($code, $id_org){
        
        $search_pack = DB::select("SELECT a.code_pack_destination, 
        b.name as pack,
        b.price,
        b.numbers_passengers,
        b.difficulty,
        b.length,
        b.number_days, 
        c.name as tipo_pack,
        d.name as destino
        from bd_packages_destination a
        left join bd_packages b 
        ON a.bd_packages_id = b.bd_packages_id
        left join bd_type_packages c
        On b.bd_type_packages_id = c.bd_type_packages_id
        left join bd_destination d
        On a.bd_destination_id = d.bd_destination_id
        left join bd_cities e
        ON d.bd_cities_id = e.bd_cities_id
        where a.code_pack_destination  = '$code' ");

    return $search_pack;
    }

}

