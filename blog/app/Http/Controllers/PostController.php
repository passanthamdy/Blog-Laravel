<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request, StorePostRequest $req)
    {
        $data = request()->all();
        $request->validate([

            'image' => 'required|mimes:jpeg,png,jpg|max:2048',

        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $final_path=str_replace('public/', '',$path);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'path' => $final_path,
            'img_name'=>$name,

        ]);


        return redirect(route("posts.index"));
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        $users = User::all();
        //post->comments
        $comments = $post->comments;


        return view('posts.show', [
            'post' => $post,
            'users' => $users,
            'comments'=> $comments
        ]);
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'users' => $users,
        ]);
    }
    public function update(Request $request, $postId, StorePostRequest $req)
    {
        $post = Post::find($postId);
        if($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $final_path=str_replace('public/', '',$path);
            $name = $request->file('image')->getClientOriginalName();

        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $final_path,
            'img_name'=>$name,

        ]);


        return redirect(route('posts.index'))->with('success', 'Post updated successfully');
    }
    public function delete($postId)
    {
        Post::find($postId)->delete();
        return back();
    }
}
