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
                                     @if(Auth::user()->id !== $post->user_id)
                                        {!!Form::open(['action' => ['PostsController@upvote', $post->id, Auth::user()->id ], 'method' => 'POST'])!!}
                                            {{Form::submit(' + ', ["class" => "no-btn glyphicon glyphicon-chevron-up"])}}
                                        {!!Form::close()!!}      
                                        {!!Form::open(['action' => ['PostsController@downvote', $post->id, Auth::user()->id], 'method' => 'POST'])!!}
                                            {{Form::submit(' - ', ["class" => "no-btn glyphicon glyphicon-chevron-down"])}} 
                                        {!!Form::close()!!}                                             
                                    @endif      
                                    @if(Auth::user()->id == $post->user_id)                                                                                                        
                                        <small><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-xs edit-btn">Edit</a></small>                                                                                 
                                    @endif
                                @endif
                                <small>{{$post->votes}} points | posted by {{$post->user->name}} | <a href="/posts/{{$post->id}}">{{$post->comments->count()}} comments</a></small>                                
                            </li>
                            <br>                           
                        @endforeach 
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>
        </div>             
    @else
        <p>No posts found.</p>
    @endif
@endsection