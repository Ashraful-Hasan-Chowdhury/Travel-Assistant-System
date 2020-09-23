<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotels(){
        return $this->belongsToMany('App\Hotel','hotel_rooms')->withTimeStamps();
    }
    public function books(){
        return $this->belongsToMany('App\Book','book_rooms')->withTimeStamps();
    }
}
