<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()){

            $allPosts = Post::with('user')->orderBy('id', 'DESC')->get();

            $posts = Post::where('created_by', Auth::user()->id)->orderBy('id', 'DESC')->get();

            return view('posts.index', ['posts' => $posts], ['allPosts' => $allPosts]);
            
        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        if (Auth::check()){
            $post = Post::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'created_by' => Auth::user()->id
            ]);

            if ($post){
                return redirect()->route('posts.show', ['post' => $post->id])
                        ->with('success', 'Post created successfully');
            }
        }

        return back()->withInput()->with('errors', 'Error creating post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // $post = Post::where('id', $post->id )->first();
        $post = Post::find($post->id);
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        // $post = Post::where('id', $post->id )->first();
        $post = Post::find($post->id);
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // save data
        $postUpdate = Post::where('id', $post->id)
                            ->update([
                                'title'=> $request->input('title'),
                                'body'=> $request->input('body'),
                                'updated_by' => Auth::user()->id
                            ]);

        if($postUpdate)
        {
            return redirect()->route('posts.show', ['post'=>$post->id])
                    ->with('success', 'Post successfully updated!');
        }

        // redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Post $post)
    public function destroy(Request $request)
    {
        //
        //dd($post);
        /*$findPost = Post::find($post->id);
        if($findPost->delete()){
            return redirect()->route('posts.index')
                    ->with('success', 'Post deleted successfully!');
        }*/
        $post = Post::findOrFail($request->post_id);
        if($post->delete()) {
            return redirect()->route('posts.index')
                        ->with('success', 'Post deleted successfully!');
        }

        return back()->withInput()->with('errors', 'Post could not be deleted!');

    }
}
