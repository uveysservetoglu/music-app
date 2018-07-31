<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    protected $table = "libraries";
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany("App\User");
    }
}
