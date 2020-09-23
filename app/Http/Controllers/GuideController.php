<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index(){
    	return view('admin.guide.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:guides|max:255',
        ]);
        $guide = new Guide;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/guide-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $guide->name = $request->name;
        $guide->lat = $request->lat;
        $guide->lng = $request->lng;
        $guide->phone = $request->phone;
        $guide->description = $request->description;
        $guide->address = $request->address;
        $guide->image = $image_url;
        $guide->save();

        $notification = array(
        	'message' => 'Guide Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function view(){
        $guides = Guide::all();
        return view('admin.guide.view',compact('guides'));
    }
    public function destroy($id){
        $guide = Guide::findorfail($id);
        $image = $guide->pImage;
        if($image != null){  
            unlink($image);
        }
        $guide->delete();

        $notification = array(
            'message' => 'Guide Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $guide = Guide::findorfail($id);
        return view('admin.guide.edit',compact('guide'));
    }

    public function update(Request $request,$id){
        $guide=Guide::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/guide-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $guide->name = $request->name;
        $guide->lat = $request->lat;
        $guide->lng = $request->lng;
        $guide->phone = $request->phone;
        $guide->description = $request->description;
        $guide->address = $request->address;
        $guide->save();
        $notification = array(
            'message' => 'Guide Info Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$guide);
    }
    // UserSide
    public function userIndex(){
        return view('user.guide.guide');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $guides=Guide::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(10);
        return response()->json($guides);
    }

    public function placeDetailsAjax($id){
        return ['redirect' => route('guide.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $guide=Guide::findorfail($id);
        $reviews = $guide->reviews()->paginate(4);

        return view('user.guide.view',compact('guide','reviews'));
    }
}
