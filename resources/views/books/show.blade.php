@extends('master')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        {{$book->publisher}}
        {{$book->publication_year}}
        {{$book->ISBN}}
        {{$book->image}} 
        <!-- TODO make the image show an acutal img if its a link-->
    </article>


@stop
