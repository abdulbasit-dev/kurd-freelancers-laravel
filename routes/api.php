<?php

use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//Non Auth endpoints
//login
Route::post("/login", "AuthContoller@login");
Route::post("/register", "AuthContoller@register");

//nested routed
Route::resource('users.profiles', 'ProfileController');

Route::resource("posts", "PostController")->only('index', 'show');
Route::resource('user_profiles', 'UserProfileController')->only('index', 'show');
Route::resource('genders', 'GenderController')->only('index');
Route::resource('languages', 'LanguageController')->only('index');
Route::resource('tags', 'TagController')->only('index');
Route::resource('cities', 'CityController')->only('index');



//Auth Routes
Route::group(["middleware" => "jwt.auth"], function () {
    Route::get("/logout", "AuthContoller@logout");
    Route::post("/post", "PostController@store");
});
