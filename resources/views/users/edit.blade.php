@extends('layouts.app')

@section('content')


    <h1>Edit User: {!! $user->email !!}</h1>
    <hr>

     
    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserController@update',$user->id]]) !!}

	<div class="form-group">
    	{!! Form::label('role', 'Role:') !!}
    	{!! Form::select('role', array('Admin' => 'Admin', 'Subscriber' => 'Subscriber'), 'Subscriber', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
    	{!! Form::label('birthday', 'Birthday:') !!}
    	{!! Form::input('date', 'birthday', date('Y-m-d'), ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
    	{!! Form::label('education_field', 'Education Field:') !!}
    	{!! Form::text('education_field', null, ['class'=>'form-control']) !!}
	</div>

    <!-- probably want a way to unsubscirbe or subsribe users to some book in here -->

	<div class="form-group">
    	{!! Form::submit('Update User', ['class'=>'btn btn-primary form-control']) !!}
	</div> 

    {!! Form::close() !!}

    @include ('errors.list')


    
@stop