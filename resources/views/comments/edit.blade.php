@extends('layouts.default')
@section('title', 'コメントの編集画面')
@section('content')
    <h2>コメントの編集画面です</h2>
    <form method="post" action="{{ url('/edit/comment') }}">
        {{ csrf_field() }}
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <input type="hidden" name="post_id" value="{{ $post_id }}">
        {{var_dump($comment->id)}}
        <p><label for="name">名前</label></p>
        <p><input type="text" name="body" value="{{$comment->body}}"></p>
        <input type="submit" value="送信">
    </form>
@endsection