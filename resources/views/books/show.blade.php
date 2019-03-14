@extends('master')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>
        <h4> ISBN: {{$book->ISBN}}</h4>
        <img src="{{$book->image}}" alt="book img" width="50%" height="30%">
    </article>


@stop
