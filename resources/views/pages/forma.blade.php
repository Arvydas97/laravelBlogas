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


    <form method="post" action="/store" class="text-center">
        @csrf
        <fieldset>
            <legend>Blogo registravimas</legend>
            Title<br>
            <input type="text" name="title" value=""><br>
            Description<br>
            <input type="text" name="description" value=""><br><br>
            <input type="submit" value="Submit">
        </fieldset>
</form>
     @endsection