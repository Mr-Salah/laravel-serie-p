<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use  Validator ;

class RegisterController extends BaseController
{
    public function Register(Request $request)
    {
        # code...

        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed',
        ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validator',$validator->errors());

        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $seccuss['token'] = $user->createToken('MyApp')->accessToken;
        $seccuss['name'] = $user->name;


        return $this->sendResponse($seccuss,'User created succesfully');



    }
}
