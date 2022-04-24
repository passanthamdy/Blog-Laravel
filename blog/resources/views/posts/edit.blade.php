@extends('layouts.app')

@section('title')Create Post @endsection

@section('content')
<form method="POST" action="{{ route('posts.update' ,['post' => $post['id']])}}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                    <?php echo $post->description; ?>
                </textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <?php ?>
    @if($post->path)
    <img   src="http://127.0.0.1:8000/storage/{{$post->path}}" style="height: 100px; width: 150px;">
    @else
    <p>No image to display</p>
    @endif
    <input type="file" name="image" placeholder="Choose image" id="image">

    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
