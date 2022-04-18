<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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

    public function store()
    {
        $data = request()->all();

        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

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
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);
        $post->fill($request->input())->save();
        return redirect(route('posts.index'))->with('success', 'Post updated successfully');
    }
    public function delete($postId)
    {
        Post::find($postId)->delete();
        return back();
    }
}
