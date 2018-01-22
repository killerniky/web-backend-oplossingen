@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1><a href="{{$post->body}}">{{$post->title}}</a></h1>  
    <hr>
    <div>    
        <p><strong>Comments:</strong></p>    
        
            @foreach($post->comments as $comment)            
                <ul>    
                    <li>{{$comment->comment}} </li>
                    <hr>
                    <small>Posted by {{$post->user->name}} on {{$post->created_at}}  
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $post->comment)      
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">edit</a><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">delete</a>
                            @endif
                        @endif
                    </small>
                </ul>
            @endforeach
        
    </div>
    @guest
    <p>You need to be <a href="/login">logged</a> in to comment</p>
    @else
      
        <div id="comment-form">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method'=>'POST'])}}              
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
   
    @endguest     
@endsection