@extends('master')

@section('content')

<h1>Books</h1>
<hr>

<!-- show messages like: Book sucessfully deleted -->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif




@foreach($books as $book)

<book>
    <!-- this default img is not resizing --> <!-- onerror="this.onerror=null;this.src='MissingBook.png';" -->
        <img src="{{$book->image}}"  alt="book img"  width="10%" height="1%" style="float:left;margin-right:5px;">
        <!-- <img src="{{$book->image}}" onerror="this.onerror=null;this.src='MissingBook.png';" alt="book img"  width="200px" height="120px" style="float:left;margin-right:5%;"> -->

        <h2>
            <a href="{{action('BookController@show',[$book->id])}}">
                {{$book->name}}
            </a>
        </h2>

        <div class='pub'>{{$book->publisher}}, {{$book->publication_year}}</div>

</book>
<hr>
@endforeach

@stop 