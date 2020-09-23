<?php

namespace App\Http\Controllers;

use App\Book;
use App\Room;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function index(){
		$bookings = Book::all();
        // return response()->json($bookings[0]);
		return view('user.hotel.booking',compact('bookings'));
	}
	public function show(){
		$bookings = Book::all();
		return view('hotelmanager.booking.booking',compact('bookings'));
	}
	public function confirm($id){
		$booking = Book::findorfail($id);
		$booking->status = 'confirmed';
		$booking->save();
		$notification = array(
        	'message' => 'Room Booking is Confirmed!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
	}
	public function reject($id){
		$booking = Book::findorfail($id);
		$booking->status = 'rejected';
		$booking->save();
		$notification = array(
        	'message' => 'Room Booking is Rejected!',
        	'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
	}

    public function store(Request $request){
        $validatedData = $request->validate([
        'trxid' => 'required|unique:books|max:10|min:10',
    ]);
    	$book = new Book;
    	$book->checkin_date = $request->checkin_date;
    	$book->checkout_date = $request->checkout_date;
    	$book->days = $request->days;
    	$book->cost = $request->costing;
    	$book->trxid = $request->trxid;
    	$book->status = 'pending';
    	$book->save();
    	$book->users()->sync(auth()->id());
        $book->rooms()->sync($request->roomid);
        $notification = array(
        	'message' => 'Room Booking is Pending!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function dateblock(){
        $room = Room::findorfail(request()->roomid);
        $date=request()->dateOne;
        $year=request()->yearOne;
        $month=request()->monthOne;
        $fulldate = $year.'-'.$month.'-'.$date;
        $userChekinDate = date('y-m-d',strtotime($fulldate));

        foreach ($room->books as $key => $booking) {
            $bCheckin = $booking->checkin_date;
            $bCheckout = $booking->checkout_date;
            $DateBegin = date('y-m-d', strtotime($bCheckin));
            $DateEnd = date('y-m-d', strtotime($bCheckout));
            if (($userChekinDate >= $DateBegin) && ($userChekinDate <= $DateEnd)){
                return response()->json("busy");
            }
        }
        return response()->json("free");
    }

    public function cancel($id){
        $booking = Book::findorfail($id);
        $booking->status = 'canceled';
        $booking->save();
        $notification = array(
            'message' => 'Booking Cancellation is Pending!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function showcancelled(){
        $bookings = Book::all();
        return view('hotelmanager.booking.cancelled',compact('bookings'));
    }
    public function confirmcancel(Request $request){
        $booking = Book::findorfail($request->id);
        $id = $request->id;
        $field="trx_manager".$id;
        $booking->trx_manager = $request->$field;
        $booking->save();
        $notification = array(
            'message' => 'Booking Cancellation is Successful!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
