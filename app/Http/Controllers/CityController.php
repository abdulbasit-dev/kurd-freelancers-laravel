<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::select('id', 'name')->orderBy("created_at", "desc")->get();
        return [
            "total" => count($cities),
            "data" => $cities
        ];
    }


    public function create()
    {
        //
    }


    public function store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:4|unique:App\Models\City,name",
            "value" => "required|string|min:4|unique:App\Models\City,value",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->errors(),
                "error" => true
            ], 500);
        }

        $newCity = City::create($request->all(), [
            "name" => $request->name,
            "value" => $request->value
        ]);
        if (!$newCity) {
            return response()->json([
                "message" => "something went wrong, new city not created",
                "error" => true
            ], 500);
        }

        return response()->json([
            "message" => "new city added",
            "error" => false
        ]);
    }


    public function show($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json([
                "message" => "city not found",

            ], 404);
        }
        return $city;
    }





    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:4|unique:App\Models\City,name",
            "value" => "required|string|min:4|unique:App\Models\City,value",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->errors(),
                "error" => true
            ], 500);
        }

        $editCity = City::where("id", $id)->update($request->all(), [
            "name" => $request->name,
            "value" => $request->value
        ]);
        if (!$editCity) {
            return response()->json([
                "message" => "something went wrong, new city not created",
                "error" => true
            ], 500);
        }

        return response()->json([
            "message" => "city edited",
            "error" => false
        ]);
    }

    public function destroy(City $city)
    {

        if (!$city) {
            return response()->json([
                "message" => "city not found",

            ], 404);
        }

        $deletedCity = $city->delete();
        if (!$deletedCity) {
            return response()->json([
                "message" => "city not deleted",

            ], 404);
        }

        return response()->json([
            "message" => "city deleted"
        ]);
    }
}
