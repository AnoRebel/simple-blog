<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $comment = Comment::create([
                'body' => $request->input('body'),
                'post_id' => $request->input('post_id'),
                'created_by' => Auth::user()->id
            ]);

            if ($comment){
                return back()->with('success', 'Comment successfully posted!');
            }
        }

        return back()->withInput()->with('errors', 'Error posting comment!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $commentUpdate = Comment::where('id', $comment->id)
                            ->update([
                                'body'=> $request->input('body')
                            ]);

        // if($commentUpdate)
        // {
        //     return redirect()->route('posts.show', ['post'=>$post->id])
        //             ->with('success', 'Comment successfully updated!');

        // }
        if ($commentUpdate){
                return back()->with('success', 'Comment successfully updated!');
            }

        // redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        $findComment = Comment::find($comment->id);
        if($findComment->delete()){
            return back()->with('success', 'Comment deleted successfully!');
        }
    }
}
