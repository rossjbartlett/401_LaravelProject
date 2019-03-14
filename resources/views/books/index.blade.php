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
        <img src="{{$book->image}}"  onerror="imgError(this);" alt="book img"  style="float:left;margin-right:5px;width:10%;height:75px;"">

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