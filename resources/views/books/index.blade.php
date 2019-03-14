@extends('master')

@section('content')

<h1>Books</h1>
<hr>
@foreach($books as $book)

<book>
        <img src="{{$book->image}}" alt="book img" width="10%" height="2%" style="float:left;margin-right:5%;">

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