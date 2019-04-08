@extends('main')

@section('content')
    <div class="col-md-6">
        <a href="post/{{$post->id}}" class="blog-entry element-animate" data-animate-effect="fadeIn">
            <img src="images/img_5.jpg" alt="Image placeholder">
            <div class="blog-content-body">
                <div class="post-meta">
                    <span class="category">{{$post->title}}</span>
                    <span class="mr-2">asdasd</span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h2>{{$post->description}}</h2>
            </div>
        </a>
    </div>
@endsection