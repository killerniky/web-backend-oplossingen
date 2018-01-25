<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Comment;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $posts = Post::orderBy('votes','desc')->paginate(5);       
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
        ]);

        # Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->votes = 0;
        $post->save();

        return redirect('/')->with('success',  'Article created succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post = Post::find($id);

        # Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/')->with('success', 'Post Created');
        }
        return view('posts.edit')->with('post', $post);
    }

    public function upvote($post_id, $user_id)
    {
        $readyvoted = DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->count();

        # Check if voted
        if($readyvoted == 0){
            DB::table('posts')->whereId($post_id)->increment('votes');

            try{
            DB::transaction(function() use ($post_id, $user_id){
                DB::insert('insert into votes (user_id, post_id, votetype) values(?,?,?)', array($user_id,$post_id,true));
            });
            }
            catch(Exception $e){
                echo 'Caught exception', $e->getMessage(), "\n";
            }  
        }
        # If already voted
        if($readyvoted > 0){
            $vote = false;
            $vote = DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->where('votetype', true)->first();

            if($vote == null){
                DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->update(['votetype' => true]);
                DB::table('posts')->whereId($post_id)->increment('votes',2);
            }           
        }        
        return back();           
    }

    public function downvote($post_id, $user_id)
    {
        $readyvoted = DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->count();

        # If voted
        if($readyvoted == 0){
            DB::table('posts')->whereId($post_id)->decrement('votes');

            try{
            DB::transaction(function() use ($post_id, $user_id){
                DB::insert('insert into votes (user_id, post_id, votetype) values(?,?,?)', array($user_id,$post_id,false));
            });
            }
            catch(Exception $e){
                echo 'Caught exception', $e->getMessage(), "\n";
            }   

        }
        # If already voted
        if($readyvoted > 0){
            $vote = false;
            $vote = DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->where('votetype', false)->first();
            

            if($vote == null){
                DB::table('votes')->where('post_id', $post_id)->where('user_id', $user_id)->update(['votetype' => false]);
                DB::table('posts')->whereId($post_id)->decrement('votes',2);
            }           
        }        
        return back();           
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
        ]);

        # Find Post
        $post = Post::find($id);     
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        # Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Post Created');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
