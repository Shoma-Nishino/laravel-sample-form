<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        $posts = Post::latest()->get();
        return view('posts/index')->with('posts', $posts);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts/show')->with('post', $post);
    }

    public function create(){
        return view('posts/create');
    }

    public function store(PostRequest $request){
        $post = new Post();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts/edit')->with('post', $post);
    }

    public function update(PostRequest $request){
        $post = Post::find($request->id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->body = $request->body;
        $post->save();
        return view('posts/show')->with('post', $post);
    }

    // public function destroy($id){
    //     $post = Post::find($id);
    //     $post->delete();
    //     return redirect('/');
    // }

    public function destroy(Request $request){
        $post = Post::find($request->id);
        $post->delete();
        return redirect('/');
    }
}
