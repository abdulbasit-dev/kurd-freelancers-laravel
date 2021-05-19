<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $teams = User::where('is_admin', true)->with([
            'role' => function ($query) {
                $query->select('id', 'role_name');
            }
        ])->get();
        $roles = Role::all();
        return view('admin.teams.index', compact('teams', 'roles'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }






    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            "role_id" => $request->role
        ]);


        return redirect()->route("teams.index")->with(["message" => "Role Changed Succefuly", "title" => "Changed"]);
    }

    public function destroy($id)
    {
        //
    }
}
