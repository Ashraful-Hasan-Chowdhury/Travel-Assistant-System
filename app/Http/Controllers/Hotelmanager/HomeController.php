<?php

namespace App\Http\Controllers\Hotelmanager;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/hotelmanager/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('hotelmanager.auth:hotelmanager');
    }

    /**
     * Show the Hotelmanager dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('hotelmanager.home');
    }

}