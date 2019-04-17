@extends('main')

@section('content')

            <div class="jumbotron">
                <div class = "row pull-right">
                    <a href="/post/{{$post->id}}/edit" class="btn pull-right btn-dark">Edit</a>
                    <form id="delete-form" method="POST" action="{!!$post->id!!}/destroy">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn  btn-dark">Delete</button>
                        </div>
                    </form>
                </div>

                <h1 class="display-4">{{$post->title}}</h1>
                @foreach($categories as $category)
                    @if($category->id==$post->cat_id)
                        <span class="category">{{$category->name}}</span>
                    @endif
                @endforeach
                <p class="lead"><i class="fas fa-pencil-alt"></i> {{$post->created_at}}</p>
                <hr class="my-4">
                <p>{!! $post->description!!}</p>
                <img src="/storage/app/{{$post->img}}" alt="Image placeholder">
            </div>

    <div class="row">
        <div id="coment-form" class="col-md-10">
            <form method="post" action="/add-comment" enctype="multipart/form-data" class="text-center">
                @csrf
                <fieldset>
                    <legend>Leave a comment..</legend>

                    Name<br>
                    <input type="text" name="name" value="">
                    <input name="post_id" value="{{$post->id}}" type="hidden" ><br><br>
                    Comment<br>
                    <div class="custom">
                        <textarea type="text" name="comment" value=""></textarea>
                    </div>

                    <input type="submit" value="Comment">
                </fieldset>
            </form>
        </div>
    </div>
    <div>
        <div class="comments-section">
            <h2>Comments section</h2>
            @if(count($post->comments)>0)
                @foreach($post->comments as $comment)
                    <div class="commentAll">
                        <h4 class="comments-owner">{{$comment->name}} {{$comment->created_at}}</h4>
                        <p  class="comments-body">{{$comment->comment}}</p>
                    </div>
                @endforeach
                @else
                    <div>
                        <p  class="comments-body"> There is no comments yet</p>
                    </div>
            @endif
        </div>
    </div>
@endsection