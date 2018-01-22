@extends('layouts.app')

@section('content')   
    @if(count($posts)>0)        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>
                <div class="panel-content">
                    <ul class="article-overview">
                        @foreach($posts as $post)
                            <li>                                
                                <h3><a href="{{$post->body}}">{{$post->title}}</a></h3>                                
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $post->user_id)      
                                        <small><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-xs edit-btn">Edit</a></small>                                         
                                    @endif
                                @endif
                                <small>0 points | posted by {{$post->user->name}} | <a href="/posts/{{$post->id}}">{{$post->comments->count()}} comments</a></small>
                                
                            </li>
                        @endforeach 
                    </ul>
                </div>
            </div>
        </div>             
    @else
        <p>No posts found.</p>
    @endif
@endsection