<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function revews(){
        return $this->belongsToMany('App\Review','place_rivews')->withTimeStamps();
    }
}
