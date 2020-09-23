<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function revews(){
        return $this->belongsToMany('App\Review','restaurant_rivews')->withTimeStamps();
    }
}
