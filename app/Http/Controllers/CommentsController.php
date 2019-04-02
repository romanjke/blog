<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->authorize('create', Comment::class);

        $this->validateInput($request);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->post_id = $post->id;
        Auth::user()->comments()->save($comment);

        return redirect(route('home.show', compact('post')))->with('success', trans('comments.added'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $this->authorize('change', $comment);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('change', $comment);

        $this->validateInput($request);

        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect(route('home.show', ['post' => $comment->post]))->with('success', trans('comments.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('change', $comment);

        $comment->delete();

        return redirect(route('home.show', ['post' => $comment->post]))->with('success', trans('comments.deleted'));
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'comment' => 'required|max:200',
        ]);
    }
}
