<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
    	return view('hotelmanager.hotel.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'hname' => 'required|unique:hotels|max:255',
        ]);
        $hotel = new Hotel;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/hotel-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $hotel->hname = $request->hname;
        $hotel->lat = $request->lat;
        $hotel->lng = $request->lng;
        $hotel->phone = $request->phone;
        $hotel->direction = $request->direction;
        $hotel->desciption = $request->desciption;
        $hotel->image = $image_url;
        $hotel->save();
        $hotel->hotelmanagers()->sync(auth('hotelmanager')->id());

        $notification = array(
        	'message' => 'Hotel Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function view(){
        $hotels = Hotel::all();
        return view('hotelmanager.hotel.view',compact('hotels'));
    }
    public function destroy($id){
        $hotel = Hotel::findorfail($id);
        $image = $hotel->pImage;
        if($image != null){  
            unlink($image);
        }
        $hotel->delete();

        $notification = array(
            'message' => 'Place Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $hotel = Hotel::findorfail($id);
        return view('hotelmanager.hotel.edit',compact('hotel'));
    }

    public function update(Request $request,$id){
        $hotel=Hotel::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/hotel-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $hotel->hname = $request->hname;
        $hotel->lat = $request->lat;
        $hotel->lng = $request->lng;
        $hotel->phone = $request->phone;
        $hotel->direction = $request->direction;
        $hotel->desciption = $request->desciption;
        $hotel->image = $image_url;
        $hotel->save();
        
        $notification = array(
            'message' => 'Hotel Info Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$hotel);
    }
    // UserSide
    public function userIndex(){
        return view('user.hotel.hotel');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $hotels=Hotel::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($hotels);
    }

    public function placeDetailsAjax($id){
        return ['redirect' => route('hotel.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $hotel=Hotel::findorfail($id);
        $reviews = $hotel->revews()->paginate(4);
        return view('user.hotel.view',compact('hotel','reviews'));
    }
}
