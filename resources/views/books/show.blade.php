@extends('master')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>
        <h4> ISBN: {{$book->ISBN}}</h4>
        
        <!-- TODO: Show Author(s) -->

        <img src="{{$book->image}}" onerror="imgError(this);" alt="book img" width="50%" height="30%">
    </article>


    {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
        <button type="submit" style="float:right;">Delete Book</button>
    {!! Form::close() !!}


@stop
