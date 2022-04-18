<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class CommentsController extends Controller
{

    // public function index($postId)
    // {
    //     $comments = Comment::paginate(3);

    //     return view('posts.show',['post' => $postId], [
    //         'comments' => $comments,
    //     ]);
    // }


    public function create()
    {
        $users = User::all();
        $comments = Comment::paginate(3);

        return view('posts.show', [
            'users' => $users,
            'comments' => $comments,
        ]);
    }


    public function store($postId)
    {
        $data = request()->all();
        Comment::create([
            'content' => $data['body'],
            'user_id' => $data['post_creator'],
            'post_id' => $postId,
        ]);
        return redirect()->route('posts.show',['post' => $postId]);

    }


    public function show(Comment $comment)
    {

    }


    public function edit(Comment $comment)
    {

    }

    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
