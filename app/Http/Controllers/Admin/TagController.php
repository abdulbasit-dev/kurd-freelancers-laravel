<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy("created_at", "desc")->get();
        return view("admin.tags.index", compact("tags"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        Tag::create([
            "name" => $request->name,
        ]);
        return redirect()->route("tags.index")->with(["message" => "Tag Created Succefuly", "title" => "Created"]);
    }




    public function update(Request $request, $id)
    {

        Tag::where('id', $id)->update([
            "name" => $request->name
        ]);
        return redirect()->route("tags.index")->with(["message" => "Tag updated Succefuly", "title" => 'Updated']);
    }


    public function destroy(Tag $Tag)
    {

        $Tag->delete();
        return redirect()->route("tags.index")->with(["message" => "Tag deleted Succefuly", "title" => 'Deleted']);
    }
}
