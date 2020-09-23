<?php

Route::group(['namespace' => 'Hotelmanager'], function() {
    Route::get('/', 'HomeController@index')->name('hotelmanager.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('hotelmanager.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('hotelmanager.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('hotelmanager.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('hotelmanager.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('hotelmanager.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('hotelmanager.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('hotelmanager.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('hotelmanager.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('hotelmanager.verification.verify');
});