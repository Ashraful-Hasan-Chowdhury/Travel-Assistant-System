<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
    	return view('admin.restaurant.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:restaurants|max:255',
        ]);
        $restaurant = new Restaurant;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/restaurant-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $restaurant->name = $request->name;
        $restaurant->lat = $request->lat;
        $restaurant->lng = $request->lng;
        $restaurant->direction = $request->direction;
        $restaurant->desciption = $request->desciption;
        $restaurant->image = $image_url;
        $restaurant->save();

        $notification = array(
        	'message' => 'Restaurant Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function view(){
        $restaurants = Restaurant::all();
        return view('admin.restaurant.view',compact('restaurants'));
    }
    public function destroy($id){
        $restaurant = Restaurant::findorfail($id);
        $image = $restaurant->pImage;
        if($image != null){  
            unlink($image);
        }
        $restaurant->delete();

        $notification = array(
            'message' => 'Restaurant Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $restaurant = Restaurant::findorfail($id);
        return view('admin.restaurant.edit',compact('restaurant'));
    }

    public function update(Request $request,$id){
        $restaurant=Restaurant::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/restaurant-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $restaurant->name = $request->name;
        $restaurant->lat = $request->lat;
        $restaurant->lng = $request->lng;
        $restaurant->direction = $request->direction;
        $restaurant->desciption = $request->desciption;
        $restaurant->image = $image_url;
        $restaurant->save();
        
        $notification = array(
            'message' => 'Restaurant Info Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$restaurant);
    }
    // UserSide
    public function userIndex(){
        return view('user.restaurant.restaurant');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $restaurants=Restaurant::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($restaurants);
    }

    public function placeDetailsAjax($id){
        return ['redirect' => route('restaurant.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $restaurant=Restaurant::findorfail($id);
        $reviews = $restaurant->revews()->paginate(4);
        return view('user.restaurant.view',compact('restaurant','reviews'));
    }
}
