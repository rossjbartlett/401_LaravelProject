@extends('layouts.app')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        <!-- TOOD: how to make it so it only shows this if we are ADMIN -->

        <div style="padding-right: 80px;float: right;">

        @if(Auth::user() !== null)

          @if(Auth::user()->isAdmin())
            {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
            {!! Form::close() !!}
          @endif  
            
          @if(Auth::user()->isSubscriber())
             <!-- if subscribed -->
            {!! Form::open(['method' => 'POST', 'url' => 'subscriptions']) !!}
            <button class="btn btn-primary btn-sm" type="submit"> Subscribe </button> 
            {!! Form::close() !!}

          @endif

        @else 
            <!-- no button   -->  

        @endif  

         </div> 
          


        <h2> Author(s):
            {{implode(', ', $book->authors()->pluck('name')->toArray())}}
        </h2>

        <h4> ISBN: {{$book->ISBN}}</h4>

        <img src="{{$book->image}}" alt="book img"  width="20%">
    </article>


@stop
