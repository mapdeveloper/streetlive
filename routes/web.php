<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/termsandconditions', function () {
    return view('termsandconditions');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/dashboard', 'HomeController@index'); 
    Route::post('/logout', 'Auth\LoginController@logout');

    /**User details **/
    Route::post('/postregister', 'Auth\UserController@store'); 
    Route::get('/dashboard', 'HomeController@index'); 
    Route::post('/logout', 'Auth\LoginController@logout');

    /** For donate the amount payment integration **/
    Route::get('donate', 'PaymentController@donate'); 
    Route::post('paynow', 'PaymentController@paynow'); 

    /**Donors details **/
    Route::get('donorlist', 'DonorController@list');
    Route::get('donors', 'DonorController@index');	
    Route::get('donor/create', 'DonorController@create');
    Route::post('donor/create', 'DonorController@save');
    Route::get('donor/edit/{id}', 'DonorController@edit');
    Route::put('donor/edit', 'DonorController@update');
    Route::delete('donor/delete/{id}', 'DonorController@destroy');
    Route::get('donor/exportcsv', 'DonorController@exportcsv');
    Route::get('export', 'DonorController@export');
    /**NGO details **/
    Route::get('ngolist', 'NgoController@list');	
    Route::get('ngos', 'NgoController@index');
    Route::get('ngo/create', 'NgoController@create');
    Route::post('ngo/create', 'NgoController@save');
    Route::get('ngo/edit/{id}', 'NgoController@edit');
    Route::put('ngo/edit', 'NgoController@update');
    Route::delete('ngo/delete/{id}', 'NgoController@destroy');
    Route::get('ngo/exportcsv', 'NgoController@exportcsv');
    /**Voluntee details **/
    Route::get('volunteerlist', 'VolunteerController@list');	
    Route::get('volunteers', 'VolunteerController@index');	
    Route::get('volunteer/create', 'VolunteerController@create');
    Route::post('volunteer/create', 'VolunteerController@save');
    Route::get('volunteer/edit/{id}', 'VolunteerController@edit');
    Route::put('volunteer/edit', 'VolunteerController@update');
    Route::delete('volunteer/delete/{id}', 'VolunteerController@destroy');	
    Route::get('volunteers.destroy', 'VolunteerController@volunteerslist');	
    Route::get('volunteer/exportcsv', 'VolunteerController@exportcsv');
    /**Slider details **/
    Route::get('sliders', 'SliderController@index');
    Route::get('sliders/create', 'SliderController@create');
    Route::post('sliders/store', 'SliderController@store');
    Route::get('sliders/{id}/edit', 'SliderController@edit');
    Route::post('sliders/{id}', 'SliderController@update');
    Route::delete('slider/delete/{id}', 'SliderController@destroy');
    /**transaction details **/
    Route::get('transactions', 'TransactionController@index');
    Route::get('transactionsdetails/{id}', 'TransactionController@transactionsdetails');	
    Route::get('transaction/exportcsv', 'TransactionController@exportcsv');

	/** change password details **/
	Route::get('changepassword/{id}', 'Auth\UserController@showpassword');
	Route::put('changepassword/{id}', 'Auth\UserController@changepassword');

    
    /** social login details **/	
    Route::get('auth/facebook', 'SocialAuthController@facebookredirect');
    Route::get('auth/callback', 'SocialAuthController@facebookcallback');

    /** Twitter login details **/
    Route::get('auth/twitter', 'SocialAuthController@twitterredirect');
    Route::get('auth/twitter/callback', 'SocialAuthController@twittercallback');
    // Route::get('/redirect/{provider}','SocialAuthController@redirect');
    // Route::get('/callback/{provider}','SocialAuthController@callback');



});

