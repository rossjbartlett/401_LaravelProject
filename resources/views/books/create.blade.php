@extends('master')

@section('content')


    <h1>Add New Book to Library</h1>
    <hr>

    

    {!! Form::open(['url'=>'books']) !!}
        @include ('books.form', ['submitButtonText'=>'Add Book'])
    {!! Form::close() !!}

    
    @include ('errors.list')

    
@stop
