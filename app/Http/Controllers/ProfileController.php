<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

  public function index(User $user)
  {
    // return Profile::where('user_id', $user->id)->first();
    return User::select('id', 'name as username', 'email')->where('id', $user->id)->with([
      "profile" => function ($query) {
        $query->select('id', 'user_id', 'name', 'age', 'about_me', 'skills', 'cv', 'certificate', 'phone_number', 'profile_picture', 'gender_id', 'city_id', 'language_id');
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
    return Profile::where('user_id', $user->id)->first();
  }

  public function store(Request $request, User $user)
  {
    $cvFileName = null;
    if ($request->hasFile('cv') &&  $request->cv != null) {
      $cvFileName = time() . '.' . $request->cv->extension();
      $request->cv->move(public_path('uploads/cv'), $cvFileName);
    }

    $certificateFileName = null;
    if ($request->hasFile('certificate') && $request->certificate != null) {
      $certificateFileName = time() . '.' . $request->certificate->extension();
      $request->certificate->move(public_path('uploads/certificate'), $certificateFileName);
    }

    $profilePictureFileName = null;
    if ($request->hasFile('profile_picture') && $request->profile_picture != null) {
      $profilePictureFileName  = time() . '.' . $request->profile_picture->extension();
      $request->profile_picture->move(public_path('uploads/profile_picture'), $profilePictureFileName);
    }

    $profile = $user->profile()->create([
      'name' => $request->name,
      'phone_number' => $request->phone_number,
      'gender_id' => $request->gender_id,
      'language_id' => $request->language_id,
      'city_id' => $request->city_id,
      'skills' => $request->skills,
      'about_me' => $request->about_me,
      'age' => $request->age,
      'cv' => $cvFileName ? 'uploads/cv/' . $cvFileName : null,
      'certificate' => $certificateFileName ? 'uploads/certificate/' . $certificateFileName : null,
      'profile_picture' => $profilePictureFileName ? 'uploads/profile_picture/' . $profilePictureFileName : null
    ]);

    $user->update([
      'has_profile' => 1
    ]);


    $user = User::select('id', 'name as username', 'email', 'has_profile')->where('id', $user->id)->with([
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


    if ($profile) {
      return [
        "access_token" => true,
        'user' => $user,
        "error" => false,
        "message" => 'Profile created sucssefull',
      ];
    }
  }


  public function show(User $user, Profile $profile)
  {
    return $profile->with('user')->get();
    return $user::with('profile')->get();
  }


  public function edit(User $user)
  {
    //
  }

  public function update(Request $request, User $user)
  {
    //
  }


  public function destroy(User $user)
  {
    //
  }
}
