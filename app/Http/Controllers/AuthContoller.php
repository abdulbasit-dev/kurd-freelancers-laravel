<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthContoller extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required|email',
            "password" => 'required|min:8|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => true,
                "message" => $validator->errors()
            ], 200);
        }

        $credentials =  request(['email', "password"]);

        $token = auth()->attempt($credentials);

        if (!$token) {
            return response()->json([
                "error" => true,
                "message" => "you don't have any acount"
            ], 200);
        }

        return response()->json([
            "expire_in" => auth('api')->factory()->getTTL() * 3600,
            "token_type" => "bearer",
            "access_token" => $token,
            "user" => auth()->user()

        ]);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $credentials =  request(['email', "password"]);

        $token = auth('api')->attempt($credentials);

        $data = [];
        $data['name'] = $user->name;

        $data['id'] = $user->id;
        $data['email'] = $user->email;
        $data['expire_in'] = auth('api')->factory()->getTTL() * 3600;
        $data['access_token'] = $token;
        return $data;
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            "error" => false,
            "message" => "logout succecssfully"
        ]);
    }
}
