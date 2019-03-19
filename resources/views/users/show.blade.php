@extends('layouts.app')

@section('content')

    <h1> {{$user->email}}</h1>
    <hr>

    <div>
    	<h4> Role: {{$user->role}}</h4>

    	 <div style="padding-right: 80px;float: right;">

        {!! Form::open(['method' => 'Get', 'route' => ['users.edit', $user->id]]) !!}
         	<div class="form-group" style="padding-top: 5px">
			{!! Form::submit('Edit',  ['class' => 'btn btn-primary btn-sm']) !!}
			</div>
		{!! Form::close() !!}
	  	 </div>

    	<h4> Birthday: {{$user->birthday}} </h4>
    	<h4> Educaiton Field: {{$user->education_field}} </h4>

        <h4> Subscription(s): <h4>
            <div style="margin-left: 50px; font-size: 20px">
                            <!-- want to change here: only show list of books currently subscribed see controller-->
        @foreach($subscribed_books as $book)
            {{$book->name}},
            @if($user->isCurrentSubscriber($book->id))
              current subscription
            @else
              old subscription
            @endif
            <br/>
        @endforeach
            </div>
    </div>

@stop
