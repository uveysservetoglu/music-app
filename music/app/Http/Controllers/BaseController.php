<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\App;

class BaseController extends Controller
{

    /**
     * Kitaplık ve Müzik için hit oluşturulacak.
     *
     * @param $model
     * @param $id
     * @return mixed
     */
    protected function hitInc($model, $id){
        $source = '\App\\'.$model;
        $data = $source::find($id);
        if($data){
            $data->hit = $data->hit + 1;
            $data->save();
        }
        return $data;
    }

    /**
     * Sort Order boş gelirse son değeri almak için
     *
     * @param $model
     * @return mixed
     */
    protected function sortOrder($model){
        $source = '\App\\'.$model;
        $data = $source::latest()->first();
        return $data->sort_order + 1;
    }
}
