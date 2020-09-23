<?php

namespace App\Http\Controllers;

use App\Ticketcounter;
use Illuminate\Http\Request;

class TicketcounterController extends Controller
{
    public function index(){
    	return view('admin.ticketcounter.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:ticketcounters|max:255',
        ]);
        $ticketcounter = new Ticketcounter;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/ticketcounter-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $ticketcounter->name = $request->name;
        $ticketcounter->type = $request->type;
        $ticketcounter->lat = $request->lat;
        $ticketcounter->lng = $request->lng;
        $ticketcounter->phone = $request->phone;
        $ticketcounter->direction = $request->direction;
        $ticketcounter->desciption = $request->desciption;
        $ticketcounter->image = $image_url;
        $ticketcounter->save();

        $notification = array(
        	'message' => 'Ticketcounter Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function view(){
        $ticketcounters = Ticketcounter::all();
        return view('admin.ticketcounter.view',compact('ticketcounters'));
    }
    public function destroy($id){
        $ticketcounter = Ticketcounter::findorfail($id);
        $image = $ticketcounter->pImage;
        if($image != null){  
            unlink($image);
        }
        $ticketcounter->delete();

        $notification = array(
            'message' => 'Ticketcounter Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $ticketcounter = Ticketcounter::findorfail($id);
        return view('admin.ticketcounter.edit',compact('ticketcounter'));
    }

    public function update(Request $request,$id){
        $ticketcounter=Ticketcounter::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/ticketcounter-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $ticketcounter->name = $request->name;
        $ticketcounter->type = $request->type;
        $ticketcounter->lat = $request->lat;
        $ticketcounter->lng = $request->lng;
        $ticketcounter->phone = $request->phone;
        $ticketcounter->direction = $request->direction;
        $ticketcounter->desciption = $request->desciption;
        $ticketcounter->image = $image_url;
        $ticketcounter->save();
        
        $notification = array(
            'message' => 'Ticketcounter Info Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$ticketcounter);
    }
    // UserSide
    public function userIndex(){
        return view('user.ticketcounter.ticketcounter');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $ticketcounters=Ticketcounter::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(10);
        return response()->json($ticketcounters);
    }

    public function placeDetailsAjax($id){
        return ['redirect' => route('ticketcounter.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $ticketcounter=Ticketcounter::findorfail($id);
        return view('user.ticketcounter.view',compact('ticketcounter'));
    }
}
