<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {


        //get id of two parametr that send (location + tag)
        $location =  request('location') ? City::where('name', request('location'))->first()->id : null;
        $tag =  request('tag') ? Tag::where('name', request('tag'))->first()->id : null;


        $posts = null;
        //both filter
        if ($location != null && $tag != null) {
            $posts = Post::where([
                'tag' => $tag,
                'location' => $location
            ])->with([
                'user' => function ($query) {
                    $query->select('id', 'email', 'name');
                },
                'tag' => function ($query) {
                    $query->select('id', 'name');
                },
                'location' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->orderBy("created_at", "desc")->get();
            // filter by location
        } else if ($location != null && $tag == null) {
            $posts = Post::where([
                'location' => $location
            ])->with([
                'user' => function ($query) {
                    $query->select('id', 'email', 'name');
                },
                'tag' => function ($query) {
                    $query->select('id', 'name');
                },
                'location' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->orderBy("created_at", "desc")->get();
            // filter by tag
        } else if ($location == null && $tag != null) {
            $posts = Post::where([
                'tag' => $tag
            ])->with([
                'user' => function ($query) {
                    $query->select('id', 'email', 'name');
                },
                'tag' => function ($query) {
                    $query->select('id', 'name');
                },
                'location' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->orderBy("created_at", "desc")->get();
            //no filter
        } else {
            $posts = Post::with([
                'user' => function ($query) {
                    $query->select('id', 'email', 'name');
                },
                'tag' => function ($query) {
                    $query->select('id', 'name');
                },
                'location' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->orderBy("created_at", "desc")->get();
        }


        return [
            "total" => count($posts),
            "data" => $posts
        ];
    }

    public function show(Post $post)
    {
        return Post::where('id', $post->id)->with([
            'user' => function ($query) {
                $query->select('id', 'email', 'name');
            },
            'tag' => function ($query) {
                $query->select('id', 'name');
            },
            'location' => function ($query) {
                $query->select('id', 'name');
            }
        ])->first();
    }

    function update(Request $request, $id)
    {
        return $id;
    }
}
