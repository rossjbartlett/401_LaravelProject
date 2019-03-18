@extends('layouts.app')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        <!-- TOOD: how to make it so it only shows this if we are ADMIN -->


        @if(Auth::check())

          @if(Auth::user()->isAdmin())
            {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm', 'style' => 'float:right']) !!}
            {!! Form::close() !!}
          @elseif(Auth::user()->isSubscriber())
            @if( Auth::user()->isSubscribed($book->id))
              <!-- TODO do we and to unsubscribe -->
            @else
              {!! Form::open(['method' => 'POST', 'url' => 'subscriptions']) !!}
              <input id='book_id' name = 'book_id' type = 'hidden' value = {{$book->id}}>
              {!! Form::submit('Subscribe', ['class' => 'btn btn-primary', 'style' => 'float:right']) !!}
              {!! Form::close() !!}
            @endif
          @endif

        @endif
        
        <h2> Author(s):
            {{implode(', ', $book->authors()->pluck('name')->toArray())}}
        </h2>

        <h4> ISBN: {{$book->ISBN}}</h4>

        <img src="{{$book->image}}" alt="book img"  width="20%">
    </article>


@stop
