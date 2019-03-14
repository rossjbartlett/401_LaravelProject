@extends('master')

@section('content')


    <h1>Edit Book: {!! $book->title !!}</h1>
    <hr>

     
    {!! Form::model($book, ['method'=>'PATCH', 'action'=>['ArticleController@update',$book->id]]) !!}
    @include ('books.form', ['submitButtonText'=>'Update Book'])
    {!! Form::close() !!}

    @include ('errors.list');


    
@stop
