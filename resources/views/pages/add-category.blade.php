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