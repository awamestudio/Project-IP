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

Route::group(array("before" => "guest"), function()
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
	
	
    Route::post("home/login", array(
        "uses" => "UserController@doLogin"
    ));
	
    Route::post("home/create", array(
        "uses" => "RedirectionController@store"
    ));
	
    Route::any("request", array(
        "as"   => "request",
        "uses" => "UserController@requestAction"
    ));
    Route::any("reset", array(
        "as"   => "reset",
        "uses" => "UserController@resetAction"
    ));
});


Route::group(array("before" => "auth"), function()
{
    Route::any("users/dashboard", array(
        "as"   => "users/dashboard",
        "uses" => "UserController@profileAction"
    ));
	
    Route::post("home/addnew", array(
        "uses" => "RedirectionController@addnew"
    ));		
	
    Route::any("logout", array(
        "as"   => "logout",
        "uses" => "UserController@doLogout"
    ));
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


