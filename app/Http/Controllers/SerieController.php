<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SerieController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Serie::all(),'list Series');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $serie = Serie::create($request->all());

        return $this->sendResponse($serie,'Add successfely ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->sendResponse(Serie::find($id),'Serie');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
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

        $serie = Serie::find($id);

        $serie-> name = $data->name;
        $serie-> rate = $data->rate;
        $serie-> description = $data->description;
        $serie-> img = $data->img;
        $serie-> categorie_id = $data->categorie_id;



        return $this->sendResponse($serie,'Update successfely ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $serie = Serie::find($id);

        $serie->delete();

        return $this->sendResponse($serie,'delete successfely ');
    }
}
