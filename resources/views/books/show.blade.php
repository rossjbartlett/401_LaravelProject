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

    <h2> Author(s):
        @php ($i = 0)
        @foreach($book->authors as $author)
            @if($i>0) 
                , 
            @endif
            {{$author->name}}</h2>
        @endforeach
        </h2>
         
        <h4> ISBN: {{$book->ISBN}}</h4>
        
        <img src="{{$book->image}}" alt="book img"  width="20%">
    </article>


@stop
