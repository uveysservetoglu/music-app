<?php

namespace App\Http\Controllers;

use App\Song;
use App\User;
use Illuminate\Http\Request;

class SongController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Song::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sort = parent::sortOrder("Song");
        $data = new Song([
            'name' => request("name"),
            'slug' => str_slug(request("name")),
            'status' => request("status"),
            'hit' => 0,
            'sort_order' => $sort,
            'libraries_id' => request("libraries_id"),
        ]);

        $data->save();

        if ($data) {
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = parent::hitInc("Song", $id);
        return response()->json($data->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Song::find($id);

        $data->name = request("name");
        $data->slug = str_slug(request("name"));
        $data->name = request("name");
        $data->status = request("status");
        $data->status = request("sort_order");
        $data->libraries_id = request("libraries_id");

        $data->save();

        if ($data) {
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Song::find($id)->delete();

        if ($data) {
            return response()->json(array("code" => "200"));
        } else {
            return response()->json("Error");
        }
    }
}
