<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends BaseController
{
    /**
     * favor list
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $data = Users::find(Auth::user()->id);
            return response()->json($data->libraries);

        }catch (QueryException $ex) {

            return response()->json(["code"=>$ex->getCode(),"messages"=>$ex->errorInfo]);

        }

    }

    /**
     *
     * Add favor || remove favor
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ops =["attach" , "detach"];

        $id = request("libraryId");
        $action = request("action"); // attach || detach

        if(!in_array($action,$ops))
            return response()->json(["code"=>"404","messages"=>"Please select the correct action"]);

        try{

            $data = Users::find(Auth::user()->id);
            $data->libraries()->$action($id);
            return response()->json(["code"=>"200"]);

        }catch (QueryException $ex) {

            return response()->json(["code"=>$ex->getCode(),"messages"=>$ex->errorInfo]);

        }
    }

}
