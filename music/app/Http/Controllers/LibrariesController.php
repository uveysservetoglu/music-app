<?php

namespace App\Http\Controllers;

use App\Libraries;
use App\Song;
use Illuminate\Http\Request;

class LibrariesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Libraries::all();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $data = new Libraries();
        $data->name = request('name');
        $data->description = request('description');
        $data->status = is_null(request('status')) ? 'p' : 'a';
        $data->hit = 0;
        $data->slug = str_slug(request('name'));
        $data->sort_order = !is_null(request('sort_order')) ? request('sort_order') : parent::sortOrder('Libraries');

        $data->save();

        if ($data) {
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = parent::hitInc("Libraries", $id);
        return response()->json($data->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $data = new Libraries();
        $data->name = request('name');
        $data->description = request('description');
        $data->status = is_null(request('status')) ? 'p' : 'a';
        $data->slug = str_slug(request('name'));
        $data->sort_order = !is_null(request('sort_order')) ? request('sort_order') : parent::sortOrder('Libraries');

        $data->save();

        if ($data) {
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /**@todo cascade uygulanacak */
        $data = Libraries::find($id)->delete();

        if ($data) {
            return response()->json(array("code" => "200"));
        } else {
            return response()->json("Error");
        }
    }

    public function play($id){
        $data = Song::where("libraries_id",$id);
        if ($data) {
            return response()->json($data);
        }
    }
}
