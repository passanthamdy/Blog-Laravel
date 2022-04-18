<?php

use Carbon\Carbon;
?>
@extends('layouts.app')

@section('title')Show Post @endsection

@section('content')
<br> <br>
<div class="card">
  <div class="card-header">
    {{$post['title']}}
  </div>
  <div class="card-body">
  <h5 class="card-title">Post Date : {{$post->created_at ? Carbon::parse($post->created_at)->format('M d Y'): 'Date is not available'}}</h5>
    <h5 class="card-title">Post Creator : {{$post->user->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
</div>
<br>
@foreach ( $post->comments as $comment)

<div class="card">
    <div class="card-header">
        {{$comment->user->name}}
    </div>
    <div class="card-body">
        <h5 class="card-title"> {{$comment->body}} </h5>
        <p> {{Carbon::parse($comment->created_at)->format('M d Y')}} </p>
    </div>
</div>
<br>
@endforeach

<div class="card">
    <div class="card-hearder">

    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('comments.store',['post' => $post['id']])}}">
            @csrf
            <div class="mb-3">
                <label  for="exampleFormControlInput1" class="form-label">Comment body</label>
                <input name="body" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment Creator</label>
                <select name="post_creator" class="form-control">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>

          <button class="btn btn-success">Add Comment</button>
        </form>
    </div>

</div>
<br>

@endsection
