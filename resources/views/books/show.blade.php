@extends('layouts.app')

@section('content')

    <h1> {{$book->name}}</h1>
    <hr>
    <article>
        <h2> Publisher: {{$book->publisher}}, {{$book->publication_year}}</h2>

        @if(Auth::check())

          @if(Auth::user()->isAdmin())
              <div class="btn-group-vertical" style="float:right">
                  {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]]) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                  {!! Form::close() !!}
                  <br>
                  <a href="{{action('BookController@create')}}">
                      <button type="button" class="btn btn-primary btn-sm" style="float:right"> Edit </button>
                  </a>
              </div>
          @elseif(Auth::user()->isSubscriber())
              @if( Auth::user()->isSubscribed($book->id))
                  <!-- TODO do we want to unsubscribe -->
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
        <hr>

<!-- TODO: make it so it only subscribed users can comment??? -->

      @if(Auth::check())

          @if(Auth::user()->isSubscriber() && Auth::user()->isSubscribed($book->id))
              <h4>Add comment:</h4>
              {!! Form::open(['action'=>'CommentController@store']) !!}
              <p>{!! Form::textarea('text', null, ['class'=>'form-control']) !!}</p>
              {{ Form::hidden('book_id', $book->id) }}
              <p>{!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}</p>
              {!! Form::close() !!}
          @endif

      @endif    


      <h4 style="display:inline"> Posted Comment(s): </br> </h4> 
      <hr>
          @foreach($book->comments->reverse() as $comment)
            <div class="col-sm-5" style="border-bottom: 1px solid lightgrey;">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>{{$comment->user->email}}</strong> 
                <span class="text-muted"> &nbsp;&nbsp;{{$comment->created_at}}</span>
              </div>
              <div class="panel-body" style="padding-bottom:10px">{{$comment->text}} </div>
            </div>
            </div>
            <br>
          @endforeach


    </article>


@stop
