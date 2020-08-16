<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Repositories\DestinationsServiceRepository;
use App\Repositories\BotServiceRepository;

class BotController extends Controller
{
    // LINKS DE CONSULTA LETRAS
    // https://yaytext.com/bold-italic/#preview_bold


    // Destinations BOT
    public function destinations($id_org){
        $gestionDestino = new DestinationsServiceRepository;
        $data = $gestionDestino->readAllDestinos($id_org); 
        $valorText;
        $dataText = array();
        for ($i=0; $i < count($data) ; $i++) { 
           $valorText = "👉🏽 𝘿𝙚𝙨𝙩𝙞𝙣𝙖𝙩𝙞𝙤𝙣: ". $data[$i]->name . "\n " . "𝑫𝒆𝒕𝒂𝒊𝒍: " .$data[$i]->description1 ;
          // array_push($dataText, $valorText ); 

           $object = new \stdClass();
           $object->text = $valorText;
           //$myArray[] = $object;
           array_push($dataText, $object ); 

        }

     
        return '{ "messages": '.json_encode($dataText).'}';
 
    }
    public function packsByNameOfDestination($destinoName, $id_org){
        $gestionDestino = new BotServiceRepository;
        $buscador = $gestionDestino->searchPacks($destinoName, $id_org);
        $dataText = array();
        $dataBuscador = array();
        for ($i=0; $i < count($buscador) ; $i++) { 
           $valorText = "👉🏽 𝗣𝗮𝗰𝗸𝗮𝗴𝗲: ". $buscador[$i]->pack 
           . "\n " . "𝐏𝐚𝐜𝐤𝐚𝐠𝐞 𝐭𝐲𝐩𝐞: " .$buscador[$i]->tipo_pack
           . "\n " . "𝐂𝐨𝐝𝐞: " .$buscador[$i]->code_pack_destination 
           . "\n " . "𝐏𝐫𝐢𝐜𝐞: " .$buscador[$i]->price
           . "\n " . "𝐍𝐮𝐦𝐛𝐞𝐫 𝐝𝐚𝐲𝐬: " .$buscador[$i]->number_days
           . "\n " . "𝐍𝐮𝐦𝐛𝐞𝐫 𝐨𝐟 𝐩𝐚𝐬𝐬𝐞𝐧𝐠𝐞𝐫𝐬: " .$buscador[$i]->numbers_passengers
           . "\n " . "𝐃𝐢𝐟𝐟𝐢𝐜𝐮𝐥𝐭𝐲: " .$buscador[$i]->difficulty ;
          // array_push($dataText, $valorText ); 

           $object = new \stdClass();
           $object->text = $valorText;
           //$myArray[] = $object;
           array_push($dataText, $object ); 

        }

     
        return '{ "messages": '.json_encode($dataText).'}';
    }

    public function packsDetails($code, $id_org){
        $gestionDestino = new BotServiceRepository;
        $buscador = $gestionDestino->searchPacksDetails($code, $id_org);
  
        $dataText = array();
        $dataBuscador = array();
        $valueHeader =  "𝗣𝗮𝗰𝗸𝗮𝗴𝗲: ". $buscador[0]->code_pack_destination . ' - ' . $buscador[0]->pack ;
        $object = new \stdClass();
        $object->text = $valueHeader;
        //$myArray[] = $object;
        array_push($dataText, $object );

        for ($i=0; $i < count($buscador) ; $i++) { 
           $valorText = "𝑫𝒆𝒔𝒕𝒊𝒏𝒂𝒕𝒊𝒐𝒏: ". $buscador[$i]->destino 
           . "\n " . "𝑪𝒊𝒕𝒚: " .$buscador[$i]->destino;
                     // array_push($dataText, $valorText ); 

           $object = new \stdClass();
           $object->text = $valorText;
           //$myArray[] = $object;
           array_push($dataText, $object ); 

        }

     
        return '{ "messages": '.json_encode($dataText).'}';
    }
}
