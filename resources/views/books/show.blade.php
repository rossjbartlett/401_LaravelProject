@extends('master')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        <!-- TOOD: how to make it so it only shows this if we are ADMIN -->
        {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
        <button class="btn btn-outline-danger btn-sm" type="submit" style="float:right;">Delete</button>
        {!! Form::close() !!}

    <h2 style="display:inline"> Author(s): </h2>
        @foreach($book->authors as $author)
            <h2 style="display:inline">
            @if (!$loop->first)
                , 
            @endif
            {{$author->name}}</h2>
        @endforeach
         
        <h4> ISBN: {{$book->ISBN}}</h4>
        
        <img src="{{$book->image}}" alt="book img"  width="20%">
    </article>


@stop
