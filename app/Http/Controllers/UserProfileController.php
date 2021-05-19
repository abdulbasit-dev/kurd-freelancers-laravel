<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  //return all users
  public function index()
  {

    //get id of two parametr that send (location + tag)
    $location =  request('location') ? City::where('name', request('location'))->first()->id : null;

    $profiles = null;
    if ($location != null) {
      $profiles = Profile::where([
        'city_id' => $location
      ])->with([
        "user" => function ($query) {
          $query->select('id', 'name as username', 'email');
        },
        "city" => function ($query) {
          $query->select('id', 'name');
        },
        "language" => function ($query) {
          $query->select('id', 'name');
        },
        "gender" => function ($query) {
          $query->select('id', 'name');
        },

      ])->get();
    } else {
      $profiles = Profile::with([
        "user" => function ($query) {
          $query->select('id', 'name as username', 'email');
        },
        "city" => function ($query) {
          $query->select('id', 'name');
        },
        "language" => function ($query) {
          $query->select('id', 'name');
        },
        "gender" => function ($query) {
          $query->select('id', 'name');
        },

      ])->get();
    }
    return [
      'total' => count($profiles),
      'data' => $profiles,
    ];
  }

  //show by user_id
  public function show($id)
  {
    $user = User::select('id', 'name as username', 'email')->where('id', $id)->with([
      "profile" => function ($query) {
        $query->select('id as profile_id', 'user_id', 'name', 'age', 'about_me', 'skills', 'cv', 'certificate', 'phone_number', 'profile_picture', 'gender_id', 'city_id', 'language_id');
      },
      "profile.city" => function ($query) {
        $query->select('id', 'name');
      },
      "profile.language" => function ($query) {
        $query->select('id', 'name');
      },
      "profile.gender" => function ($query) {
        $query->select('id', 'name');
      },

    ])->first();
    if (!$user) {
      return [
        'error' => true,
        'message' => 'user not found'
      ];
    }


    return $user;
  }
}
