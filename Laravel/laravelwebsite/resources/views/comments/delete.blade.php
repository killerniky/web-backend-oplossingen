@extends('layouts.app')

@section('content')
    @if(!Auth::guest()) 
        @if(Auth::user()->id == $comment->user_id)
        <h1>Are you sure you want to delete this comment?<h1>    
        {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}       
            {{Form::submit('Confirm delete', ['class' => 'btn btn-block, btn-danger'])}}        
        {{Form::close()}}
        @else
            <p>YOU DO NOT HAVE THE AUTHORITY TO DO THIS</p>
        @endif 
    @endif
@endsection