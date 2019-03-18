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
        <hr>
        <h4>Add comments:</h4>
<!-- TODO: make it so it only subscribed users can comment??? -->
      {!! Form::open(['action'=>'CommentController@store']) !!}
      <p>{!! Form::textarea('text', null, ['class'=>'form-control']) !!}</p>
      {{ Form::hidden('book_id', $book->id) }}
      <p>{{ Form::submit('Post Comment') }}</p>
      {!! Form::close() !!}



      <h4 style="display:inline"> Posted Comment(s): </br> </h4>
          @foreach($book->comments->reverse() as $comment)
          <div style="border: 1px solid lightgrey">
              <h5 style="display:inline">
              {{$comment->text}}</h5>
              <h6 style = "text-align: right"> Posted by: {{$comment->user->email}} - {{$comment->created_at}} </h6>
          </div>
          <br>
          @endforeach


    </article>


@stop
