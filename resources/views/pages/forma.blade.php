@extends('main')

@section('content')
        <form method="post" action="/store" enctype="multipart/form-data" class="text-center">
        @csrf
        <fieldset>
            <legend>Posto registravimas</legend>
            Title<br>
            <input type="text" name="title" value=""><br>
            Description<br>
            <div class="custom">
                <textarea type="text" class="custom" id="article-ckeditor" name="description" value=""></textarea>
            </div>
            <br><br>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label><br>
                <select class="mr-sm-2 col-2" name="cat_id">
                    <option selected disabled>Choose a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select><br><br>
            </div>
            <input name="user_id" value="{{$user->id}}" type="hidden" >
            <input name="img" type="file" ><br><br>
            <input type="submit" value="Submit">
        </fieldset>
</form>
     @endsection