@extends('master')

@section('content')

    <h1>Books</h1>
    <hr>
    @foreach($books as $book)

        <article>
            <h2>
                <!-- multiple ways to link to the the article page -->
                <!-- <a href="/articles/{{$article->id}}"> -->
                <!-- <a href="{{url('/articles', $article->id)}}"> -->
                <a href="{{action('BookController@show',[$book->id])}}">
                    {{$book->name}}
                </a>
            </h2>

            <div class='pub'>{{$book->publisher}}, {$book->publication_year}}</div>
        </article>
        <hr>
    @endforeach

@stop
