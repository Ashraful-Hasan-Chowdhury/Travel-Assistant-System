<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    // Admin
    public function index(){
    	return view('admin.place.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'pname' => 'required|unique:places|max:255',
        ]);
        $place = new Place;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/place-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $place->pname = $request->pname;
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->direction = $request->direction;
        $place->desciption = $request->desciption;
        $place->image = $image_url;
        $place->save();

        $notification = array(
        	'message' => 'Place Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 

    public function update(Request $request,$id){
        $place=Place::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/place-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $place->pname = $request->pname;
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->direction = $request->direction;
        $place->desciption = $request->desciption;
        $place->image = $image_url;
        $place->save();
        
        $notification = array(
            'message' => 'Place Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$place);
    }

    public function view(){
        $places = Place::all();
        return view('admin.place.view',compact('places'));
    }

    public function edit($id){
        $place = Place::findorfail($id);
        return view('admin.place.edit',compact('place'));
    }

    public function destroy($id){
        $place = Place::findorfail($id);
        $image = $place->pImage;
        if($image != null){  
            unlink($image);
        }
        $place->delete();

        $notification = array(
            'message' => 'Place Deleted!',
            'alert-type' => 'error'
        );
        $place=Place::all();
        return Redirect()->back()->with($notification,$place);
    }
    // user
    public function userIndex(){
        return view('user.place.place');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $places=Place::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($places);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('place.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $place=Place::findorfail($id);
        $reviews = $place->revews()->paginate(4);
        return view('user.place.view',compact('place','reviews'));
    }
}
