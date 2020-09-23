<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function rooms(){
        return $this->belongsToMany('App\Room','book_rooms')->withTimeStamps();
    }
    public function users(){
        return $this->belongsToMany('App\User','book_users')->withTimeStamps();
    }
}
