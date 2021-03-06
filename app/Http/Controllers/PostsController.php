<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Utuliser les méthodes pour manipuler la BDD
use App\Post;
use App\Result;
use Michelf\Markdown;


class PostsController extends Controller
{
    // Permet de gérer les pages autorisées sans connexion
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::orderBy('created_at', 'desc')->get();
        $news = Post::where('program', 0)->orderBy('created_at', 'desc')->get();
        $programs = Post::where('program', 1)->orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('news', $news)
                                  ->with('programs', $programs)
                                  ->with('results', $results);
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
          'body' => 'required'
        ]);


        // Create Post (use App\Post)
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->pdf = $request->input('pdf');
        $post->program = $request->input('isProgram');
        $post->save();

        return redirect( route('news.index') )->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
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
        return view('posts.edit')->with('post', $post);
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
        'body' => 'required'
      ]);


      // Create Post (use App\Post)
      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->pdf = $request->input('pdf');
      $post->save();

      return redirect( route('news.index') )->with('success', 'Post Updated');
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
        $post->delete();
        return redirect( route('news.index') )->with('success', 'Post deleted');
    }
}
