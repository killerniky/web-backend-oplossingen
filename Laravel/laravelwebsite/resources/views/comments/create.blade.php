@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1   
    <hr>
    <small>Written on {{$post->created_at}} by  {{$post->user->name}}</small>
    <hr>  
    <div class="col-md-8 col-md-offset-2">   
        <div id="comment-form">
            {{ Form::open(['action' => ['CommentsController@store', $post->id], 'method'=>'POST'])}}              
                <div class="form-group">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name', null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('comment', 'Comment:')}}
                    {{Form::textarea('comment', null, ['class' => 'form-control'])}}
                </div>  
                <div class="form-group">
                    {{Form::submit('Add comment', ['class' => 'btn btn-success'])}}
                </div>
            {{Form::close()}}
        </div>
    </div>       
@endsection