@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Welcome @auth
        ' {{ Auth::user()->name }} '
    @endauth </h1>
    <p class="lead">You can add your tasks easily, with this app..</p>
    <hr class="my-4">
    @if (auth()->check())

     <a class="btn btn-primary btn-lg" href={{route('tasks.index')}} role="button">Check & Manage your Tasks</a>
 
    @else
    <p>If you have an account please click <b>Login</b> . Otherwise you can create an account your own via click <b>Register</b> . </p>
    <a class="btn btn-primary btn-lg" href={{route('login')}} role="button">Login</a>
    <a class="btn btn-primary btn-lg" href={{route('register')}} role="button">Register</a>
 
    @endif
    
    </div>
</div>
@endsection
