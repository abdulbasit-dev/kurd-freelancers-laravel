<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
        'tag_id' => $tag,
        'city_id' => $location
      ])->with([
        'user' => function ($query) {
          $query->select('id', 'email', 'name');
        },
        'tag' => function ($query) {
          $query->select('id', 'name');
        },
        'city' => function ($query) {
          $query->select('id', 'name');
        }
      ])->orderBy("created_at", "desc")->get();
      // filter by location
    } else if ($location != null && $tag == null) {
      $posts = Post::where([
        'city_id' => $location
      ])->with([
        'user' => function ($query) {
          $query->select('id', 'email', 'name');
        },
        'tag' => function ($query) {
          $query->select('id', 'name');
        },
        'city' => function ($query) {
          $query->select('id', 'name');
        }
      ])->orderBy("created_at", "desc")->get();
      // filter by tag
    } else if ($location == null && $tag != null) {
      $posts = Post::where([
        'tag_id' => $tag
      ])->with([
        'user' => function ($query) {
          $query->select('id', 'email', 'name');
        },
        'tag' => function ($query) {
          $query->select('id', 'name');
        },
        'city' => function ($query) {
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
        'city' => function ($query) {
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
      'city' => function ($query) {
        $query->select('id', 'name');
      }
    ])->first();
  }

  public function store(Request $request)
  {

    $fileName = null;
    if ($request->hasFile('file') &&  $request->file != null) {
      $fileName = time() . '.' . $request->file->extension();
      $request->file->move(public_path('uploads/jobFile'), $fileName);
    }


    $post = Post::create([
      "user_id" => $request->user_id,
      "title" => $request->title,
      "description" => $request->description,
      "tag_id" => $request->tag_id,
      "city_id" => $request->city_id,
      "currency_type" => $request->currency_type,
      "file" => $fileName ? 'uploads/cv/' . $fileName : null,
      "fix_price" => $request->fix_price,
      "start_range_price" => $request->start_range_price,
      "end_range_price" => $request->end_range_price,
      "time_delivary_type" => $request->time_delivary_type,
      "time_amount" => $request->time_amount,
    ]);






    if (!$post) {
      return [
        'error' => true,
        'message' => 'server side error'
      ];
    }

    return [
      'error' => false,
      'message' => 'post created succesfully'
    ];;
  }
}
