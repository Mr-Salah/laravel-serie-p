<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        return $this->sendResponse(Episode::all(),'list Series');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->toArray(),[
            'name'=>'required ',
            'rate'=>'required ',
            'description '=>'required',
            'img '=>'required'
        ]);

        if ($validator->fails()){

            return $this->sendError($validator->errors(),'errors validators ');
        }

        $episode = Episode::create($request->all());

        return $this->sendResponse($episode,'Add successfely ');
    }

    public function show($id)
    {
        return $this->sendResponse(Episode::find($id),'Serie');
    }



    public function update(Request $request ,$id)
    {
        $validator = Validator::make($request->toArray(),[
            'name'=>'required ',
            'rate'=>'required ',
            'description '=>'required',
            'img '=>'required'
        ]);

        if ($validator->fails()){

            return $this->sendError($validator->errors(),'errors validators ');
        }


        $data = $request->all();

        $episode = Episode::find($id);

        $episode-> name = $data->name;
        $episode-> url_watche = $data->url_watche;



        return $this->sendResponse($episode,'Update successfely ');
    }

    public function destroy($id)
    {

        $episode = Episode::find($id);

        $episode->delete();

        return $this->sendResponse($episode,'delete successfely ');
    }
}

?>
