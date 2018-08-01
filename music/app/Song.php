<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = "song";
    protected $guarded = [];

    public function libraries(){
        return $this->belongsToMany("App\Libraries");
    }
}
