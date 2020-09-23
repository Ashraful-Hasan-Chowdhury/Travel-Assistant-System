<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function hotelmanagers(){
        return $this->belongsToMany('App\Hotelmanager','hotel_hotelmanagers')->withTimeStamps();
    }
    public function rooms(){
        return $this->belongsToMany('App\Room','hotel_rooms')->withTimeStamps();
    }
    public function revews(){
        return $this->belongsToMany('App\Review','hotel_rivews')->withTimeStamps();
    }
}
