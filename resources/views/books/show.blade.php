@extends('master')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        <!-- only if we are an admin this shows -->
        {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
        <button class="btn btn-outline-danger btn-sm" type="submit" style="float:right;">Delete</button>
        {!! Form::close() !!}

        <h2> Author(s): 
        @foreach($book->authors as $author)
            {{$author->name}}, </h2>
        @endforeach
         
        <h4> ISBN: {{$book->ISBN}}</h4>
        
        <img src="{{$book->image}}" onerror="imgError(this);" alt="book img" width="50%" height="30%">
    </article>


@stop
