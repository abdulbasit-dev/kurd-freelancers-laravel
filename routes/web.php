<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
  Route::get('/', function () {
    return view("admin.index");
  })->name('admin');

  //post routes
  Route::get('posts/accept', 'Admin\PostController@accepted')->name('posts.accepted');
  Route::get('posts/pending', 'Admin\PostController@pending')->name('posts.pending');
  Route::get('posts/reject', 'Admin\PostController@rejected')->name('posts.rejected');
  Route::resource('posts', "Admin\PostController");

  Route::resource('teams', 'Admin\TeamController')->only('index', 'update', 'create', 'destroy', 'store');
  Route::resource('cities', "Admin\CityController");
  Route::resource('tags', "Admin\TagController");
  Route::resource('users', "Admin\UserController")->only("index", 'show', 'destroy');
});


require __DIR__ . '/auth.php';
