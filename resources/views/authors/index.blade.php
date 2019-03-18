@extends('master')

@section('content')

<h1>Authors</h1>
<hr>

<!-- show messages like: Author sucessfully deleted -->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif




@foreach($authors as $author)

<div>

        <h4>{{$author->name}}</h4>

        <!-- TOOD: how to make it so it only shows this if we are ADMIN -->
        {{ Form::model($author, ['method' => 'DELETE', 'action' => ['AuthorController@destroy', $author->id]]) }}
        
        <div class="form-group" style="padding-top: 5px"> 
             {{ Form::submit('Delete',  ['class' => 'btn btn-outline-danger btn-sm']) }}
        </div>

        {{ Form::close() }} 

</div>
<hr>
@endforeach

@stop 