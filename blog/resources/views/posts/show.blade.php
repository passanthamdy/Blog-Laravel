@extends('layouts.app')

@section('title')Show Post @endsection

@section('content')
<br> <br>
<div class="card">
  <div class="card-header">
    {{$post['title']}}
  </div>
  <div class="card-body">
  <h5 class="card-title">Post Date : {{$post->created_at ? $post->created_at : 'Date is not available'}}</h5>
    <h5 class="card-title">Post Creator : {{$post->user->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
</div>
@endsection
