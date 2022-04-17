@extends('layouts.app')

@section('title')Show Post @endsection

@section('content')

<div class="card">
  <div class="card-header">
    {{$post['title']}}
  </div>
  <div class="card-body">
    <h5 class="card-title">Post Creator : {{$post['post_creator']}}</h5>
    <p class="card-text">Post Date : {{$post['created_at']}}</p>
  </div>
</div>
@endsection
