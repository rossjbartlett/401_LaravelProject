@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in.<br>
                    Welcome, {{Auth::user()->name}}!<br>
                    Your ID on this system is {{Auth()->user()->id}}.<br>
                    Your role is <span style="color:blue"> {{Auth()->user()->role}}</span>

                </div>
            </div>
        </div>
    </div>


    <div class="content">
                <div class="title m-b-md">
                    Group 11 Library
                </div>

                <div class="links">
                    <a href="/books">Books</a>
                    <a href="/authors">Authors</a>
                    <a href="/mybooks">My Books</a>
                </div>
            </div>

</div>
@endsection
