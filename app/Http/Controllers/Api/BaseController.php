<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function sendResponse($result , $message){
        $response = [
            'success' => true ,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response , 200);
    }
    public function sendError( $errorMessages = [] ,$message, $code = 404){
        $response = [
            'success' => false ,
            'message' => $message
        ];
        if (!empty($errorMessages)) {
            # code...
            $response['date'] = $errorMessages;
        }
        return response()->json($response , $code);

    }
}
