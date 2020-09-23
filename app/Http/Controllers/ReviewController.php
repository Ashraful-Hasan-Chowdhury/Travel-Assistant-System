<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Hotel;
use App\Place;
use App\Restaurant;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $revStatus = null;
        $reviews = Review::paginate(4);
    	return view('user.review.review',compact('reviews','revStatus'));
    }
    public function new(){
    	$places = Place::all();
        $hotels = Hotel::all();
        $restaurants = Restaurant::all();
        $guides = Guide::all();
    	return view('user.review.create',compact('places','hotels','restaurants','guides'));
    }
    public function show($id){
        $user=User::findorfail($id);
        $reviews = $user->revews()->get();
    	return view('user.review.show',compact('reviews'));
    }
    public function store(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required|unique:reviews|max:255',
            'subtitle' => 'required|unique:reviews|max:255',
            'body' => 'required|unique:reviews',
            'image' => 'required',
        ]);
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
        $review = new Review;
        $review->title = $request->title;
        $review->subtitle = $request->subtitle;
        $review->image = $image_url;
        $review->body = $request->body;
        $review->category = $request->category;
        $review->counter = 0;
        $review->save();
        if($request->category == "place"){
            $review->places()->sync($request->places);
        }
        if($request->category == "hotel"){
            $review->hotels()->sync($request->hotels);
        }
        if($request->category == "restaurant"){
            $review->restaurants()->sync($request->restaurants);
        }
        if($request->category == "guide"){
            $review->guides()->sync($request->guides);
        }
        $review->users()->sync($id);
        $notification = array(
            'message' => 'Review Posted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        $review = Review::findorfail($id);
        $image = $review->image;
        unlink($image);
        $review->delete();

        $notification = array(
            'message' => 'Review Deleted!',
            'alert-type' => 'error'
        );
        // $reviews = Review::all();
        // return Redirect()->back()->with($notification,$reviews);
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $review = Review::findorfail($id);
        $places = Place::all();
        $hotels = Hotel::all();
        $restaurants = Restaurant::all();
        $guides = Guide::all();
        return view('user.review.edit',compact('review','places','hotels','restaurants','guides'));
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'body' => 'required',
        ]);
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
            $image_url = $request->old_photo;
        }
        $review = Review::findorfail($id);
        $review->title = $request->title;
        $review->subtitle = $request->subtitle;
        $review->image = $image_url;
        $review->body = $request->body;
        $review->save();

        if($review->category == "place"){
            $review->places()->detach();
            $review->places()->sync($request->places);
        }
        if($review->category == "hotel"){
            $review->hotels()->detach();
            $review->hotels()->sync($request->hotels);
        }
        if($review->category == "restaurant"){
            $review->restaurants()->detach();
            $review->restaurants()->sync($request->restaurants);
        }
        if($review->category == "guide"){
            $review->guides()->detach();
            $review->guides()->sync($request->restaurants);
        }
        $notification = array(
            'message' => 'Review Updated Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }
    public function read($id){
        $review = Review::findorfail($id);
        $review->counter=$review->counter+1;
        $review->save();
        return view('user.review.read',compact('review'));
    }
    public function reviewByPlaces($id){
        $revStatus = 'place';
        $reviews = Place::findorfail($id)->revews()->paginate(4);
        // $reviews = Place::findorfail($id)->revews()->get();
        // return response()->json($reviews);
        return view('user.review.review',compact('reviews','revStatus'));
    }
    public function reviewByHotels($id){
        $revStatus = 'hotel';
        $reviews = Hotel::findorfail($id)->revews()->paginate(4);
        // $reviews = Place::findorfail($id)->revews()->get();
        // return response()->json($reviews);
        return view('user.review.review',compact('reviews','revStatus'));
    }
    public function reviewByGuides($id){
        $revStatus = 'guide';
        $reviews = Guide::findorfail($id)->revews()->paginate(4);
        // $reviews = Place::findorfail($id)->revews()->get();
        // return response()->json($reviews);
        return view('user.review.review',compact('reviews','revStatus'));
    }

    public function reviewByRestaurants($id){
        $revStatus = 'restaurant';
        $reviews = Restaurant::findorfail($id)->revews()->paginate(4);
        // $reviews = Place::findorfail($id)->revews()->get();
        // return response()->json($reviews);
        return view('user.review.review',compact('reviews','revStatus'));
    }

    // Admin
    public function showAdmin(){
        $reviews = Review::all();
        return view('admin.review.review',compact('reviews'));
    }

}
