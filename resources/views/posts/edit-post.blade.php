@extends('main')

@section('post-action')


<div class="m-4">
    <form method="POST" action="update" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="post-title">Post title</label>
            <input type="text" class="form-control" id="post-title" name="title" aria-describedby="title"
                   placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="description-field">Description</label>
            <textarea class="form-control" name="description" id="post-body"
                      placeholder="Body">{{$post->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="description-field">Image</label>
            <input type="file" class="form-control" name="img" id="post-image-field">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection