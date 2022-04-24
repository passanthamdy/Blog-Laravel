<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {

        return PostResource::collection(Post::paginate(3));
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return new PostResource($post);

    }

    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        $final_path='';
        $name='';
          $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'path' => $final_path,
            'img_name'=>$name,
        ]);

        return new PostResource($post);
    }
}
