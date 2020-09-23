<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
    	$hotels = Hotel::all();
    	return view('hotelmanager.room.create',compact('hotels'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $room = new Room;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/room-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $room->type = $request->type;
        $room->image = $image_url;
        $room->description = $request->description;
        $room->quantity = $request->quantity;
        $room->cost = $request->cost;
        $room->save();
        $room->hotels()->sync($request->hotel);

        $notification = array(
        	'message' => 'Room Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function view(){
        $rooms = Room::all();
        return view('hotelmanager.room.view',compact('rooms'));
    }
    public function destroy($id){
        $room = Room::findorfail($id);
        $image = $room->image;
        if($image != null){  
            unlink($image);
        }
        $room->delete();

        $notification = array(
            'message' => 'Room Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $room = Room::findorfail($id);
        $hotels = Hotel::all();
        return view('hotelmanager.room.edit',compact('room','hotels'));
    }

    public function update(Request $request,$id){
        $room=Room::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/room-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $room->type = $request->type;
        $room->image = $image_url;
        $room->description = $request->description;
        $room->quantity = $request->quantity;
        $room->cost = $request->cost;
        $room->hotels()->detach();        
        $room->save();
        $room->hotels()->sync($request->hotel);        
        $notification = array(
            'message' => 'Hotel Info Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    
}
