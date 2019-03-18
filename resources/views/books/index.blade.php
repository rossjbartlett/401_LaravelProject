@extends('layouts.app')

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


<div class="row">
    <!-- bootstrap class="row" divides the page in 12 columns. we decide how wide each of the following elements should be with class="col-md-X"-->
    <div class="col-md-1">
        <img src="{{$book->image}}" alt="book img" class="img-fluid">
    </div>
    <div class="col-md-10">
        <h2>
            <a href="{{action('BookController@show',[$book->id])}}">
                {{$book->name}}
            </a>
        </h2>
        {{$book->publisher}}, {{$book->publication_year}}
    </div>
</div>


<hr>
@endforeach

@stop 