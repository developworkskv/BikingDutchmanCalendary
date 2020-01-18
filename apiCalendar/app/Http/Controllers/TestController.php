<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function conexionApiTest(){
        $x = "Testing Conexion con el Api Calendar";
        $y = "DevelopWorKs";
        return compact('x', 'y');
    }
}
