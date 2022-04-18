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

        return view('posts.show', [
            'users' => $users,
        ]);
    }

    public function store(Request $request, $postId)
    {
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->user_id =$request->get('post_creator');
        $post = Post::find($postId);
        $post->comments()->save($comment);

        return back();
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
