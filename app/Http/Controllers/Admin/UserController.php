<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('is_admin', null)->get();
        return view('admin.users.index', compact('users'));
    }


    public function show($id)
    {
        $user = User::where('id', $id)->with([
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

        // return $user;
        return view('admin.users.show', compact('user'));
    }
}
