@extends('main')

@section('content')
    <div class="text-center">
        <div class="text-center">
            <a href="/post/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            <form id="delete-form" method="POST" action="{!!$post->id!!}/destroy">
                @method('DELETE')
                @csrf
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

        </div>
            <img src="/storage/app/{{$post->img}}" alt="Image placeholder">
            <div class="blog-content-body">
                <div class="post-meta">
                    <span class="category">id={{$post->id}}</span>
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h2>{{$post->title}}</h2>
                <h5>{{$post->description}}</h5>
            </div>
    </div>
@endsection