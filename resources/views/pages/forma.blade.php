@extends('main')

@section('content')
    <@php($cat = $categories)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="/store" enctype="multipart/form-data" class="text-center">
        @csrf
        <fieldset>
            <legend>Posto registravimas</legend>
            Title<br>
            <input type="text" name="title" value=""><br>
            Description<br>
            <input type="text" name="description" value="">
            <br><br>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategorija <span class="caret"></span>
                    <ul class="dropdown-menu">
                        @foreach($cat as $category)
                            <input><a href="#">{{$category->name}}</a></input>
                        @endforeach
                    </ul>
                </button>
            </div>
            <input name="img" type="file" >
            <input type="submit" value="Submit">
        </fieldset>
</form>
     @endsection