<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('user.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Hotel Managers
// HotelManagers Hotel
Route::get('hotelmanager/add-hotel', 'HotelController@index')->name('add.hotel');
Route::post('hotelmanager/store-hotel', 'HotelController@store')->name('store.hotel');
Route::get('hotelmanager/view-hotels', 'HotelController@view')->name('view.hotels');
Route::get('hotelmanager/delete-hotel/{id}', 'HotelController@destroy')->name('delete.hotel');
Route::get('hotelmanager/edit-hotel/{id}', 'HotelController@edit')->name('edit.hotel');
Route::post('hotelmanager/update-hotel/{id}', 'HotelController@update')->name('update.hotel');
// HotelManagers Room
Route::get('hotelmanager/add-room', 'RoomController@index')->name('add.room');
Route::post('hotelmanager/store-room', 'RoomController@store')->name('store.room');
Route::get('hotelmanager/view-rooms', 'RoomController@view')->name('view.rooms');
Route::get('hotelmanager/delete-room/{id}', 'RoomController@destroy')->name('delete.room');
Route::get('hotelmanager/edit-room/{id}', 'RoomController@edit')->name('edit.room');
Route::post('hotelmanager/update-room/{id}', 'RoomController@update')->name('update.room');

// Hotel Manager Bookings
Route::get('hotelmanager/show-booking', 'BookController@show')->name('show.booking.admin');
Route::get('hotelmanager/confirm-booking/{id}', 'BookController@confirm')->name('confirm.booking.admin');
Route::get('hotelmanager/reject-booking/{id}', 'BookController@reject')->name('reject.booking.admin');
Route::get('hotelmanager/view-canceled', 'BookController@showcancelled')->name('view.canceled');
Route::post('hotelmanager/confirm-canceled', 'BookController@confirmcancel')->name('confirm.cancel');
// Hotel Profile
Route::get('hotelmanager/profile', 'HotelHotelmanagerController@index')->name('profile.admin');
Route::post('hotelmanager/update-profile', 'HotelHotelmanagerController@update')->name('update.admin');


//CkEditor Routes
Route::post('ckeditor/image_upload', 'HomeController@upload')->name('upload');

// ----- Admin Cruds -----
// Place
Route::get('admin/add-place', 'PlaceController@index')->name('add.place');
Route::post('admin/store-place', 'PlaceController@store')->name('store.place');
Route::get('admin/view-places', 'PlaceController@view')->name('view.places');
Route::get('admin/delete-place/{id}', 'PlaceController@destroy')->name('delete.place');
Route::get('admin/edit-place/{id}', 'PlaceController@edit')->name('edit.place');
Route::post('admin/update-place/{id}', 'PlaceController@update')->name('update.place');
// Reviews
Route::get('admin/show-rivew', 'ReviewController@showAdmin')->name('admin.show.rivew');

// Restaurants
Route::get('admin/add-restaurant', 'RestaurantController@index')->name('add.restaurant');
Route::post('admin/store-restaurant', 'RestaurantController@store')->name('store.restaurant');
Route::get('admin/view-restaurants', 'RestaurantController@view')->name('view.restaurants');
Route::get('admin/delete-restaurant/{id}', 'RestaurantController@destroy')->name('delete.restaurant');
Route::get('admin/edit-restaurant/{id}', 'RestaurantController@edit')->name('edit.restaurant');
Route::post('admin/update-restaurant/{id}', 'RestaurantController@update')->name('update.restaurant');
// Ticket Counters
Route::get('admin/add-ticketcounter', 'TicketcounterController@index')->name('add.ticketcounter');
Route::post('admin/store-ticketcounter', 'TicketcounterController@store')->name('store.ticketcounter');
Route::get('admin/view-ticketcounters', 'TicketcounterController@view')->name('view.ticketcounters');
Route::get('admin/delete-ticketcounter/{id}', 'TicketcounterController@destroy')->name('delete.ticketcounter');
Route::get('admin/edit-ticketcounter/{id}', 'TicketcounterController@edit')->name('edit.ticketcounter');
Route::post('admin/update-ticketcounter/{id}', 'TicketcounterController@update')->name('update.ticketcounter');
// Guides
Route::get('admin/add-guide', 'GuideController@index')->name('add.guide');
Route::post('admin/store-guide', 'GuideController@store')->name('store.guide');
Route::get('admin/view-guides', 'GuideController@view')->name('view.guides');
Route::get('admin/delete-guide/{id}', 'GuideController@destroy')->name('delete.guide');
Route::get('admin/edit-guide/{id}', 'GuideController@edit')->name('edit.guide');
Route::post('admin/update-guide/{id}', 'GuideController@update')->name('update.guide');

// View Hotel Managers
Route::get('admin/view-manager', 'HotelHotelmanagerController@show')->name('view.manager');
Route::get('admin/single-manager/{id}', 'HotelHotelmanagerController@single')->name('single.manager');
Route::get('admin/approve-manager/{id}', 'HotelHotelmanagerController@approve')->name('approve.manager');
Route::get('admin/approve-manager/{id}', 'HotelHotelmanagerController@approve')->name('approve.manager');


// ----- User Cruds -----
// Place
Route::get('/places', 'PlaceController@userIndex')->name('places');
Route::post('show', 'PlaceController@show');
Route::get('details/{id}', 'PlaceController@placeDetailsAjax');
Route::get('/place-details/{id}', 'PlaceController@placeDetailsLaravel')->name('place.details');

// Hotel
Route::get('/hotels', 'HotelController@userIndex')->name('hotels');
Route::post('show-hotel', 'HotelController@show');
Route::get('hotel-details/{id}', 'HotelController@placeDetailsAjax');
Route::get('/hotel-detail/{id}', 'HotelController@placeDetailsLaravel')->name('hotel.details');

// Restaurant
Route::get('/restaurants', 'RestaurantController@userIndex')->name('restaurants');
Route::post('show-restaurant', 'RestaurantController@show');
Route::get('restaurant-details/{id}', 'RestaurantController@placeDetailsAjax');
Route::get('/restaurant-detail/{id}', 'RestaurantController@placeDetailsLaravel')->name('restaurant.details');

// Ticket Counter
Route::get('/ticketcounters', 'TicketcounterController@userIndex')->name('ticketcounters');
Route::post('show-ticketcounter', 'TicketcounterController@show');
Route::get('ticketcounter-details/{id}', 'TicketcounterController@placeDetailsAjax');
Route::get('/ticketcounter-detail/{id}', 'TicketcounterController@placeDetailsLaravel')->name('ticketcounter.details');

// Guides
Route::get('/guides', 'GuideController@userIndex')->name('guides');
Route::post('show-guide', 'GuideController@show');
Route::get('guide-details/{id}', 'GuideController@placeDetailsAjax');
Route::get('/guide-detail/{id}', 'GuideController@placeDetailsLaravel')->name('guide.details');

// profile
Route::post('/upload-photo/{id}', 'UserController@photo')->name('upload.photo');
Route::post('/update-info/{id}', 'UserController@update')->name('update.info');

// Reviews
Route::get('/reviews', 'ReviewController@index')->name('reviews');
Route::get('/new-rivew', 'ReviewController@new')->name('new.rivew');
Route::get('/show-rivew/{id}', 'ReviewController@show')->name('show.rivew');
Route::post('/store-review/{id}', 'ReviewController@store')->name('store.review');
Route::get('/destroy-review/{id}', 'ReviewController@destroy')->name('destroy.review');
Route::get('/edit-review/{id}', 'ReviewController@edit')->name('edit.review');
Route::post('/update-review/{id}', 'ReviewController@update')->name('update.review');
Route::get('/read-review/{id}', 'ReviewController@read')->name('read.review');
Route::get('/review-by-places/{id}', 'ReviewController@reviewByPlaces')->name('review.by.places');
Route::get('/review-by-hotels/{id}', 'ReviewController@reviewByHotels')->name('review.by.hotels');
Route::get('/review-by-restaurants/{id}', 'ReviewController@reviewByRestaurants')->name('review.by.restaurants');
Route::get('/review-by-guides/{id}', 'ReviewController@reviewByGuides')->name('review.by.guides');

// User Bookings
Route::post('/store-booking', 'BookController@store')->name('store.booking');
Route::get('/show-booking', 'BookController@index')->name('show.booking');
Route::get('/cancel-booking/{id}', 'BookController@cancel')->name('cancel.booking');

// User Mail Guide's Phone Number
// Route::get('/view-mail-template', 'MailController@index')->name('view.mail.template');
Route::get('phone/{id}', 'MailController@index');