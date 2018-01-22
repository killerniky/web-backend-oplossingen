@extends('layouts.app')

@section('content')
    <h1>Are you sure you want to delete this comment?<h1>    
    {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}       
        {{Form::submit('Confirm delete', ['class' => 'btn btn-block, btn-danger'])}}        
    {{Form::close()}}
@endsection