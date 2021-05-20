<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

  public function index()
  {
    $posts = Post::with("user")->orderBy("created_at", "desc")->get();
    return view("admin.posts.index", compact("posts"));
  }

  public function accepted()
  {
    $posts = Post::where([
      'status' => 1,
      'reject' => 0
    ])->with("user")->orderBy("created_at", "desc")->get();
    return view("admin.posts.accept", compact("posts"));
  }

  public function rejected()
  {
    $posts = Post::where('reject', '1')->with("user")->orderBy("created_at", "desc")->get();
    return view("admin.posts.reject", compact("posts"));
  }

  public function pending()
  {
    $posts = Post::where([
      'status' => 0,
      'reject' => 0
    ])->with("user")->orderBy("created_at", "desc")->get();

    // return $posts;
    return view("admin.posts.pending", compact("posts"));
  }

  public function show($id)
  {
    $post = Post::where('id', $id)->with('user')->first();
    // return $post;
    return view('admin.posts.show', compact('post'));
  }


  public function update(Request $request, Post $post)
  {

    if ($request->post_action == 'accept') {
      $post->update([
        'status' => 1,
        'reject' => 0,
        'reject_resone' => null,
      ]);
    } else if ($request->post_action == 'reject') {
      $post->update([
        'status' => 0,
        'reject' => 1,
        'reject_resone' => $request->reject_resone,
      ]);
    }
    // return $post;
    return redirect()->route("posts.index")->with(["message" => "Post updated Succefuly", "title" => 'Updated']);
  }


  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route("posts.index")->with(["message" => "Post deleted Succefuly", "title" => 'Deleted']);
  }
}
