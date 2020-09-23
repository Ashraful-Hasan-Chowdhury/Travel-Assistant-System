<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function photo(Request $request,$id){
    	$user=User::findorfail($id);
    	$image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/profile-pictures/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $user->image = $image_url;
        $user->save();
        $notification = array(
        	'message' => 'Profile Picture Uploaded Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$user);
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
        	'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [ 'confirmed'],
            'phone' => ['required', 'string','min:11'],
    ]);
    	$user=User::findorfail($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	if($request->password != null){
    		$password = Hash::make($request->password);
    		$user->password = $password;
    	}
        $user->save();
        $notification = array(
        	'message' => 'Informations Updated Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$user);
    }
}
