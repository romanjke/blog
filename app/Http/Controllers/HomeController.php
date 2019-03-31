<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('index', compact('posts'));
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

        return view('posts.show', compact('post'));
    }
}
