<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function places(){
        return $this->belongsToMany('App\Place','place_rivews')->withTimeStamps();
    }
    public function users(){
        return $this->belongsToMany('App\User','user_rivews')->withTimeStamps();
    }
    public function hotels(){
        return $this->belongsToMany('App\Hotel','hotel_rivews')->withTimeStamps();
    }
    public function restaurants(){
        return $this->belongsToMany('App\Restaurant','restaurant_rivews')->withTimeStamps();
    }
    public function guides(){
        return $this->belongsToMany('App\Guide','guide_rivews')->withTimeStamps();
    }
}
