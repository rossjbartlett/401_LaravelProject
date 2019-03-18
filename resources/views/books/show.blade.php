@extends('layouts.app')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        <!-- TOOD: how to make it so it only shows this if we are ADMIN -->
        @if(Auth::user()->isAdmin())
          {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
          <button class="btn btn-outline-danger btn-sm" type="submit" style="float:right;">Delete</button>
          {!! Form::close() !!}
        @elseif(Auth::user()->isSubscriber())
          {!! Form::open(['method' => 'POST', 'url' => 'subscriptions']) !!}
          <input id='book_id' name = 'book_id' type = 'hidden' value = {{$book->id}}>
          {!! Form::submit('Subscribe', ['class' => 'btn btn-primary form-control']) !!}
          {!! Form::close() !!}
        @endif

        <h2> Author(s):
            {{implode(', ', $book->authors()->pluck('name')->toArray())}}
        </h2>

        <h4> ISBN: {{$book->ISBN}}</h4>

        <img src="{{$book->image}}" alt="book img"  width="20%">
    </article>


@stop
