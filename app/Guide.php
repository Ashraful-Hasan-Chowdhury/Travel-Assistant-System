<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    public function reviews(){
        return $this->belongsToMany('App\Review','guide_rivews')->withTimeStamps();
    }
}
