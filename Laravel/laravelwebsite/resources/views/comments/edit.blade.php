@extends('layouts.app')

@section('content')
    @if(!Auth::guest()) 
        @if(Auth::user()->id == $comment->user_id)
            <h2>Edit Comment<h2>
            {{Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}       

                {{Form::label('comment')}}
                {{Form::text('comment', null, ['class' => 'form-control'])}}

                {{Form::submit('edit comment', ['class' => 'btn btn-block, btn-success'])}}
            {{Form::close()}}
        @else
            <p>YOU DO NOT HAVE THE AUTHORITY TO DO THIS</p>
        @endif    
    @endif
@endsection