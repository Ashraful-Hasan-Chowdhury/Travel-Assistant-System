<?php

namespace App\Http\Controllers;

use App\Hotelmanager;
use Illuminate\Http\Request;

class HotelHotelmanagerController extends Controller
{
    public function index()
    {
        $profile = Hotelmanager::findorfail(auth('hotelmanager')->id());
        return view('hotelmanager.profile.profile', compact('profile'));
    }
    public function show()
    {
        $manager = Hotelmanager::all();
        return view('admin.hotelmanagers.view', compact('manager'));
    }
    public function single($id)
    {
        $profile = Hotelmanager::findorfail($id);
        return view('admin.hotelmanagers.edit', compact('profile'));
    }
    public function approve($id)
    {
        $profile = Hotelmanager::findorfail($id);
        $profile->approve = 'yes';
        $profile->save();
        $notification = array(
            'message' => 'Profile Approved!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {

        $manager = Hotelmanager::findorfail(auth('hotelmanager')->id());
        $image_url = ' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/hotel-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $image2_url = $request->old_photo;
        }

        $image2_url = ' ';
        $image2 = $request->file('hotel_doc');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext;
            $upload2_path = 'public/hotel-image/';
            $image2_url = $upload2_path . $image2_full_name;
            $success2 = $image2->move($upload2_path, $image2_full_name);
        } else {
            $image2_url = $request->old_doc;
        }

        $image3_url = ' ';
        $image3 = $request->file('nid');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext;
            $upload3_path = 'public/hotel-image/';
            $image3_url = $upload3_path . $image3_full_name;
            $success3 = $image3->move($upload3_path, $image3_full_name);
        } else {
            $image3_url = $request->old_nid;
        }

        $manager->name = $request->name;
        $manager->mobile = $request->phone;
        $manager->hotel_doc = $image2_url;
        $manager->nid = $image3_url;
        $manager->image = $image_url;
        $manager->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
