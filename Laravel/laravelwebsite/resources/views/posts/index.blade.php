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
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</h3>
                        <small>Written on {{$post->created_at}} by  {{$post->user->name}}</small>
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