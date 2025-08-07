<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select("id","title","body")->get();

        return response()->json([
            "posts"=> $posts,
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create([
         "title"=> $request["title"],
         "body"=> $request["body"],
        ]);

         return response()->json([
            "id"=> $post["id"],
            "title"=> $request["title"],
            "body"=> $request["body"],
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::select("id","title","body")
        ->where("id","=", $id)
        ->first();

         return response()->json([
            "post"=> $posts,
            
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::where("id","=",$id)->first();
        $post->update([
            "title"=> $request["title"],
            "body"=> $request["body"],
        ]);
          return response()->json([
            "message"=> $post,
            
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $post = Post::find($id);

    if (!$post) {
        return response()->json([
            'message' => 'Post not found.',
        ], 404);
    }

    $post->delete();

    return response()->json([
        'message' => 'Post deleted successfully.',
        'deleted_post_id' => $id,
    ], 200);
}
}
