<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index()
    {

        $cities = City::orderBy("created_at", "desc")->get();
        return view("admin.cities.index", compact("cities"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        City::create($request->all(), [
            "name" => $request->name,
        ]);
        return redirect()->route("cities.index")->with(["message" => "Loaction Created Succefuly", "title" => "Created"]);
    }




    public function update(Request $request, $id)
    {

        City::where('id', $id)->update([
            "name" => $request->name
        ]);
        return redirect()->route("cities.index")->with(["message" => "Loaction updated Succefuly", "title" => 'Updated']);
    }


    public function destroy(City $city)
    {

        $city->delete();
        return redirect()->route("cities.index")->with(["message" => "Loaction deleted Succefuly", "title" => 'Deleted']);
    }
}
