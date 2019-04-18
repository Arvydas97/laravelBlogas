@extends('main')

@section('content')
    @if(count($user->posts)>0)
        @foreach($user->posts as $post)
                <div class="jumbotron jumbotron-fluid">
                    <form id="delete-form" method="POST" class="pull-right" action="{!!$post->id!!}/destroy">

                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <a href="/post/{{$post->id}}/edit" class="btn pull-right btn-dark">Edit</a>
                            <button type="submit" name="submit" class="btn  btn-dark">Delete</button>
                        </div>
                    </form>
                    <div class="container">
                        <h1 class="display-4">{{$post->title}}</h1>
                        <p class="lead">{!! $post->description!!}</p>
                    </div>
                </div>
        @endforeach

    @else
        <div>
            <p  class="comments-body"> There is no posts yet</p>
        </div>
    @endif






@endsection