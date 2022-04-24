@extends('layouts.app')
@section('title')All posts @endsection

<?php

use Carbon\Carbon;
?>
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Posts <b>Details</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title <i class="fa fa-sort"></i></th>
                        <th>Slug</th>
                        <th>Post Creator</th>
                        <th>Created At <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $posts as $post)
                    <tr>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{$post->slug ? $post->slug : 'Not Found Slug'}}</td>
                        <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
                        <td>{{$post->created_at ? Carbon::parse($post->created_at)->format('M d Y') : 'Date is not available'}}</td>
                        <td>
                            <a href="{{ route('posts.show', ['post' => $post['id']]) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <form method="POST" action="{{ route('posts.delete' ,['post' => $post['id']])}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="delete del-btn show_confirm" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");

        var name = $(this).data("name");

        event.preventDefault();

        swal({

            title: "Are you sure you want to delete this record?",

            text: "If you delete this, it will be gone forever.",

            icon: "warning",

            type: "warning",

            buttons: ["Cancel", "Yes!"],

            confirmButtonText: 'Yes, delete it!'

        }).then((willDelete) => {

            if (willDelete) {

                form.submit();


            }

        });

    });
</script>
@endsection
