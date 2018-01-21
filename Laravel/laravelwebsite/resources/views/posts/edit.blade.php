@extends('layouts.app')

@section('content')
    <a href="/" >← back to overview</a>
    <h1>Edit Post</h1>      
    {!! Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST']) !!}        
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'URL')}}
                {{Form::url('body', $post->body, ['class' => 'form-control', 'placeholder' => 'URL'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Edit',['class' => 'btn btn-primary pull-left'])}}
    {!! Form::close() !!}
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'btn pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    
@endsection