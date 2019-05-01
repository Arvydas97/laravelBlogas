@extends('main')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if(count($posts)>0)
    @foreach($posts as $post)
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">{{$post->title}}</h1>
                <p class="lead"><i class="fas fa-pencil-alt"></i> {{$post->created_at}}</p>
                <p class="lead">{!! $post->description !!}</p>
                <a class="" role="button" href="/post/{{$post->id}}">More..</a>
            </div>

        </div>

    @endforeach
@else
    <div>
        <p  class="text-center"> There is no posts yet!</p>
    </div>
@endif



@endsection