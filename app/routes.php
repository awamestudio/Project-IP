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
    Route::get("home", [
        "as"   => "home",
        "uses" => "HomeController@home"
    ]);
    Route::post("home", [
        "as"   => "home",
        "uses" => "HomeController@doLogin"
    ]);
	
    Route::any("request", [
        "as"   => "request",
        "uses" => "HomeController@requestAction"
    ]);
    Route::any("reset", [
        "as"   => "reset",
        "uses" => "HomeController@resetAction"
    ]);
});


Route::group(["before" => "auth"], function()
{
    Route::any("users/dashboard", [
        "as"   => "users/dashboard",
        "uses" => "HomeController@profileAction"
    ]);
    Route::any("logout", [
        "as"   => "logout",
        "uses" => "HomeController@doLogout"
    ]);
});


