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

  }
