<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(["before" => "guest"], function()
{
/*
	Route::get('register', function(){
		return View::make('register');
	});
	*/
	/*
	Route::post('register_action', function()
	{
		$obj = new RegisterController() ;
		return $obj->store();
	});	
	*/



	
/*
    Route::get("register", [
        "as"   => "register",
        "uses" => "UserController@home"
    ]);
*/

	Route::get('home', function(){
		return View::make('home');
	});
	
	
    Route::post("home/login", [
        "uses" => "UserController@doLogin"
    ]);
	
    Route::post("home/create", [
        "uses" => "RedirectionController@store"
    ]);
	
	
    Route::any("request", [
        "as"   => "request",
        "uses" => "UserController@requestAction"
    ]);
    Route::any("reset", [
        "as"   => "reset",
        "uses" => "UserController@resetAction"
    ]);
});


Route::group(["before" => "auth"], function()
{
    Route::any("users/dashboard", [
        "as"   => "users/dashboard",
        "uses" => "UserController@profileAction"
    ]);
    Route::any("logout", [
        "as"   => "logout",
        "uses" => "UserController@doLogout"
    ]);
});

// ===============================================
// 404 ===========================================
// ===============================================

App::missing(function($exception)
{

	// shows an error page (app/views/error.blade.php)
	// returns a page not found error
	return Response::view('error', array(), 404);
});


