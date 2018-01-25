@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>  
    {!! Form::open(['action' => 'PostsController@store','method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'URL')}}
            {{Form::url('body', '', ['class' => 'form-control', 'placeholder' => 'URL'])}}
        </div>
        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection