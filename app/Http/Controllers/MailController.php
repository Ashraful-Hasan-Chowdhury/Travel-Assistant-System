<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Mail\GuideMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($id){
    	$user = User::findorfail(auth()->id());
    	$guide = Guide::findorfail($id);
    	Mail::to($user->email)->send(new GuideMail($guide));
    	// return new GuideMail($guide);
    	 $notification = array(
        	'message' => 'Phone number is sent to your mail successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
