@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>this is the welcome page</p>
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Registreer</a></p>
@endsection


