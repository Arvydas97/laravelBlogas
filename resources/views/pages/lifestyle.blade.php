<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Lifestyle Category</h2>

        </div>
    </div>
    <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
            <div class="row">
                @if (count ($posts)>0)
                    @foreach($posts as $post)
                        <div class="col-md-6">
                            <a href="post/{{$post->id}}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                <img src="/storage/app/{{$post->img}}" alt="Image placeholder">
                                <div class="blog-content-body">
                                    <div class="post-meta">
                                        @foreach($categories as $category)
                                            @if($category->id==$post->cat_id)
                                                <span class="category">{{$category->name}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <h1>{{$post->title}}</h1>
                                    <h5>{!! $post->description!!}</h5>
                                    <span class="m-gap"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <nav aria-label="Page navigation" class="text-center">
                                  {{$posts->links()}}
                                </nav>
                            </div>
                        </div>
                @endif
            </div>

            @include ('posts/more-posts')


        </div>

        <!-- END main-content -->

        @include ('partials/sidebar')

    </div>
</div>