<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function conexionApiTest(){
        $x = "Testing Conexion con el Api Calendar";
        $y = "DevelopWorKs";
        return compact('x', 'y');
    }

    public function testChatbot(Request $request){
 
        $newAdmin = DB::table('bd_ch_test')->insert([
            'bd_ch_name' => $request->input('nombrebdch'),
        ]);
        return "SERVICIO POST";
    }
    public function responseChatbotDataToBD(){
 
        $data = DB::table('bd_ch_test')
        ->get()->last();
      //  print_r($data->bd_ch_name);
      //  die();
       $json_resp_chatbot='
       {
        "messages": [
          {"text": "'.$data->bd_ch_name.'"},
          {"text": "Lo obtuve de la base de datos"}
        ]
       }
       ';
        return $json_resp_chatbot;
    }

    //show datat chatbot in notifications web
    public function getToShowInView(){
 
        $data = DB::table('bd_ch_test')
        ->get();
       // print_r($data->bd_ch_name);
      return $data;
    }
    
}
