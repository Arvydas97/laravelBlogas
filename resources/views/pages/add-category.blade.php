@extends('main')

@section('content')




    <form method="post" action="/storeCategory" enctype="multipart/form-data" class="text-center">
        @csrf
        <fieldset>
            <legend>New category</legend>
            Title<br>
            <input type="text" name="name" value=""><br>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
@endsection