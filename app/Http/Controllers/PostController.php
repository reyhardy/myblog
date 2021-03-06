<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);

        return view('posts.index')->withPosts($posts);
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
        // validation of data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            // 'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));

        // store in DB
        $post = new Post;

        $post->title = $request->title;
        // $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        $request->session()->flash('success', 'The post was succesfully saved');

        //redirect
        return redirect()-> route('posts.show', $post->id);
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
        return view('posts.show')->withPost($post);
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

        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);
        if ($request->slug == $post->slug) {
            $this -> validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        }   else {
            $this -> validate($request, array(
                'title' => 'required|max:255',
                // 'slug' => 'required|alpha_dash|min:5|max:255||unique:posts,slug',
                'body' => 'required'
            ));
        }
        $post = Post::find($id);

        $post->title = $request->title;
        // $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        $request->session()->flash('success', 'The post was succesfully updated');

        return redirect()-> route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        $post->delete();

        // Session::flash('success', 'This post has been deleted successfully');

        $request->session()->flash('success', 'The post has been deleted successfully');

        return redirect()-> route('posts.index');
    }
}
