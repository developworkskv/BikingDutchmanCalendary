<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    /* RESPUESTAS 200 o 404 -- Manejo de errores*/
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => 1,
            'data'    => $result
        ];

        return response()->json($response, 200);
    }

    public function sendError($result, $message)
    {
        $response = [
            'status' => 0,
            'data'    => $result
        ];

        return response()->json($response, 200);
    }

  
   
}
