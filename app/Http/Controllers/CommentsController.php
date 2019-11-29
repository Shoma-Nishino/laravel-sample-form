<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    //
    public function store(CommentRequest $request, $id){
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();
        return redirect()->action('PostsController@show', $id);
    }

    public function edit($post_id, $comment_id){
        $comment = Comment::find($comment_id);
        return view('comments/edit')->with([
            'comment' => $comment, 
            'post_id' => $post_id
        ]);
    }

    public function update(CommentRequest $request){
        $comment = Comment::find($request->comment_id);
        $comment->body = $request->body;
        $comment->save();
        return redirect()->action('PostsController@show', $request->post_id);
    }

    public function destroy(Request $request){
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect()->back();
    }
}
